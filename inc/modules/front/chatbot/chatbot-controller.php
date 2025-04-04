<?php
class Hooshyar_Chatbot_Controller {
    public function __construct() {
        add_action('wp_footer', [$this, 'render_chatbot']);
        add_action('wp_ajax_hooshyar_chatbot', [$this, 'handle_chatbot_request']);
        add_action('wp_ajax_nopriv_hooshyar_chatbot', [$this, 'handle_chatbot_request']);
        
    }

 
    public function render_chatbot() {
        include HYA_VIEWS_PATH . 'front/chatbot/chatbot-button.php';
        include HYA_VIEWS_PATH . 'front/chatbot/chatbot-window.php';
    }

    public function handle_chatbot_request() {
        check_ajax_referer('hooshyar-chatbot-nonce', 'nonce');

        $user_message = sanitize_text_field($_POST['message']);
        $context = isset($_POST['context']) ? $_POST['context'] : [];

        $response = $this->call_aimlapi($user_message, $context);

        wp_send_json_success([
            'response' => $response['answer'],
            'context' => $response['context']
        ]);
    }

    private function call_aimlapi($message, $context = []) {
        $api_url = 'https://api.aimlapi.com/v1/chat/completions';
        $api_key = '12f77be1b4bd41b18ac87dc411082323'; 
        $messages = [
            [
                'role' => 'system',
                'content' => 'You are a helpful Persian-speaking assistant.'
            ]
        ];

        // اضافه کردن context به پیام‌ها
        if (!empty($context)) {
            $messages = array_merge($messages, $context);
        }

        // اضافه کردن پیام جدید کاربر
        $messages[] = [
            'role' => 'user',
            'content' => $message
        ];

        $args = [
            'headers' => [
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                'model' => 'gpt-4o-mini',
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 500,
                'language' => 'fa'
            ]),
            'timeout' => 30
        ];

        $response = wp_remote_post($api_url, $args);

        if (is_wp_error($response)) {
            error_log('AIMLAPI Error: ' . $response->get_error_message());
            return [
                'answer' => 'خطا در ارتباط با سرویس هوش مصنوعی',
                'context' => $context
            ];
        }

        $response_body = json_decode(wp_remote_retrieve_body($response), true);
        $response_code = wp_remote_retrieve_response_code($response);

        if ($response_code != 200) {
            error_log('AIMLAPI Error: ' . print_r($response_body, true));
            return [
                'answer' => 'خطا در پردازش درخواست. کد خطا: ' . $response_code,
                'context' => $context
            ];
        }

        if (!isset($response_body['choices'][0]['message']['content'])) {
            return [
                'answer' => 'پاسخی دریافت نشد',
                'context' => $context
            ];
        }

        // به روزرسانی context با پاسخ جدید
        $new_context = $messages;
        $new_context[] = [
            'role' => 'assistant',
            'content' => $response_body['choices'][0]['message']['content']
        ];

        return [
            'answer' => $response_body['choices'][0]['message']['content'],
            'context' => $new_context
        ];
    }
}
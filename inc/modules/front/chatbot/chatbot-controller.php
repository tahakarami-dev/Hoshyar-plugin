<?php

defined('ABSPATH') || exit('NO Access');

class Hooshyar_Chatbot_Controller
{
    public function __construct()
    {
        add_action('wp_footer', [$this, 'render_chatbot']);
        add_action('wp_ajax_hooshyar_chatbot', [$this, 'handle_chatbot_request']);
        add_action('wp_ajax_nopriv_hooshyar_chatbot', [$this, 'handle_chatbot_request']);
    }

    public function render_chatbot()
    {
        include HYA_VIEWS_PATH . 'front/chatbot/chatbot-button.php';
        include HYA_VIEWS_PATH . 'front/chatbot/chatbot-window.php';
    }



    public function handle_chatbot_request()
    {
        check_ajax_referer('hooshyar-chatbot-nonce', 'nonce');

        $user_message = sanitize_text_field($_POST['message']);
        $context = isset($_POST['context']) ? json_decode(stripslashes($_POST['context']), true) : [];

        $response = $this->call_aimlapi($user_message, $context);

        wp_send_json_success([
            'response' => $response['answer'],
            'context' => $response['context']
        ]);
    }

    private function call_aimlapi($message, $context = [])
    {
        $api_model = hya_settings('Service-model');

        switch ($api_model) {
            case 'Chatgpt':
                $api_url = 'https://api.openai.com/v1/chat/completions';
                break;
            case 'Deepseek':
                $api_url = 'https://api.deepseek.com/chat/completions';

                break;
        }



        $api_key = hya_settings('Service-api-key');

        $messages = [
            [
                'role' => 'system',
                'content' => 'شما یک دستیار فارسی‌زبان و مفید هستید.'
            ]
        ];

        // اضافه کردن context با بررسی صحت
        if (!empty($context) && is_array($context)) {
            foreach ($context as $entry) {
                if (isset($entry['role']) && isset($entry['content'])) {
                    $messages[] = $entry;
                }
            }
        }

        $messages[] = [
            'role' => 'user',
            'content' => $message
        ];

        $service_model = hya_settings('Service-Version-chatgpt');

        $args = [
            'headers' => [
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                'model' =>  $service_model,
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 300
            ]),
            'timeout' => 30
        ];

        $response = wp_remote_post($api_url, $args);

        if (is_wp_error($response)) {
            error_log('AIMLAPI Error: ' . $response->get_error_message());
            return [
                'answer' => 'متاسفیم! مشکلی در ارتباط با سرویس هوش مصنوعی پیش آمده لطفاً چند لحظه دیگر دوباره امتحان کنید',
                'context' => $context
            ];
        }

        $response_body = json_decode(wp_remote_retrieve_body($response), true);
        $response_code = wp_remote_retrieve_response_code($response);

        if ($response_code != 200) {
            error_log('AIMLAPI Error: ' . print_r($response_body, true));
            return [
                'answer' => 'اوپس! هنگام پردازش درخواست مشکلی پیش آمد. لطفاً کمی بعد دوباره تلاش کنید (کد خطا: ' . $response_code . ')',
                'context' => $context
            ];
        }

        if (!isset($response_body['choices'][0]['message']['content'])) {
            return [
                'answer' => 'متاسفم، پاسخی از دستیار دریافت نشد. لطفاً سوال خود را دوباره مطرح کنید',
                'context' => $context
            ];
        }

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

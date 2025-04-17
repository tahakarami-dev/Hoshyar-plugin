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

        // Main Prompt

        $current_user_id = get_current_user_id();
        $username_logined = get_userdata($current_user_id)->username;

        $welcome_message = hya_settings('chatbot-welcome-message');
        $custom_prompt = hya_settings('chatbot-prompt');
        $chat_mode = hya_settings('Chatbot-personality-mode');
        $response_type = hya_settings('Chatbot-limit-anwering');
        $Contentـfilter = hya_settings('Content-filter');
        $user_Learning = hya_settings('user-Learning');

        if (hya_settings('use-username')) {
            $username = $username_logined;
        } else {
            $username = 'دوست عزیز';
        }
        $userSettings = [
            'welcome_message' => $welcome_message,
            'custom_prompt' => $custom_prompt,
            'chat_mode' => $chat_mode,
            'response_type' => $response_type,
            'faq_answers' => true,
            'content_filter' => $Contentـfilter['save_message_title'],
            'use_username' => true,
            'learn_from_interactions' => $user_Learning,
            'username' => $username

        ];

        // تابع برای ایجاد پرامپت سفارشی
        function generateCustomPrompt($settings)
        {
            $prompt = 'شما یک چت بات و دستیار هوش مصنوعی با نام ' . hya_settings('chatbot-name') . 'هستید';

            // اضافه کردن پیغام خوش آمدگویی
            $prompt .= "پیام خوش آمدگویی شما: '" . $settings['welcome_message'] . "' ";

            // اضافه کردن پرامپت سفارشی
            $prompt .= $settings['custom_prompt'] . " ";

            // حالت شخصیت
            $prompt .= "سبک گفتگوی شما باید " . $settings['chat_mode'] . " باشد. ";

            // نوع پاسخ
            $prompt .= "پاسخ‌های شما باید " . $settings['response_type'] . " باشد. ";

            // فیلتر محتوا
            $prompt .= " هنگامی که درباره کلمات یا این موضوع ها سوال پرسیده شد  " . $settings['content_filter'] . "بگو نمی‌توانم به موضوعات غیرمرتبط پاسخ بدم";

            // استفاده از نام کاربر
            if ($settings['use_username']) {
                $prompt .= "در پاسخ‌های خود از نام کاربر (" . $settings['username'] . ") استفاده کنید. ";
            }

            // یادگیری از تعاملات
            if ($settings['learn_from_interactions']) {
                $prompt .= "شما باید از تعاملات با کاربر یاد بگیرید و پاسخ‌های خود را بهبود بخشید. ";
            }

            // دستورات نهایی
            $prompt .= "همیشه به زبان فارسی پاسخ دهید. ";
            $prompt .= "اگر سوالی خارج از حیطه دانش شما پرسیده شد، مؤدبانه توضیح دهید که نمی‌توانید کمک کنید. ";
            $prompt .= "پاسخ‌های شما باید دقیق، مفید و متناسب با فرهنگ ایرانی باشد.";

            return $prompt;
        }

        $customPrompt = generateCustomPrompt($userSettings);


        $aiSystemPrompt = $customPrompt;


        $messages = [
            [
                'role' => 'system',
                'content' => $aiSystemPrompt
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
        $max_tokens = hya_settings('Response-length-limit');
        $timeout = hya_settings('Response-timeout');
        $temperature = hya_settings('Chatbot-temperature');
        $temperature_number = (int) str_replace(' ', '', $temperature);
        $timeout_number = (int) str_replace(' ', '', $timeout);
        $max_tokens_number = (int) str_replace(' ', '', $max_tokens);




        $args = [
            'headers' => [
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                'model' =>  $service_model,
                'messages' => $messages,
                'temperature' => $temperature_number,
                'max_tokens' => $max_tokens_number
            ]),
            'timeout' => $timeout_number
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

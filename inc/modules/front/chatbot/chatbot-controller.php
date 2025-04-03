<?php
class Hooshyar_Chatbot_Controller {
    public function __construct() {
        
        // اضافه کردن چت بات به فوتر سایت
        add_action('wp_footer', [$this, 'render_chatbot']);
        
        // ایجکس برای پردازش پیام‌ها
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
        
        // اینجا باید منطق پردازش پیام با هوش مصنوعی قرار گیرد
        // در مرحله اول می‌توانید از یک پاسخ ثابت استفاده کنید
        $response = $this->generate_ai_response($user_message);
        
        wp_send_json_success([
            'response' => $response
        ]);
    }
    
    private function generate_ai_response($message) {
        // این تابع باید با موتور هوش مصنوعی شما جایگزین شود
        $message = mb_strtolower($message);
        
        if(strpos($message, 'سلام') !== false || strpos($message, 'درود') !== false) {
            return "درود! من چت بات هوشیار هستم. چگونه می‌توانم کمک کنم؟";
        }
        
        if(strpos($message, 'ساعت') !== false) {
            return "ساعت فعلی: " . date('H:i');
        }
        
        return "متوجه سوال شما نشدم. لطفاً سوال خود را به شکل دیگری مطرح کنید.";
    }
}


// chatbot 
jQuery(document).ready(function($) {
    // نمایش/مخفی کردن پنجره چت
    $('#hooshyar-chatbot-trigger').click(function() {
        $('#hooshyar-chatbot-window').toggle();
    });
    
    $('.close-chatbot').click(function() {
        $('#hooshyar-chatbot-window').hide();
    });

    // ارسال پیام
    $('.chatbot-input button').click(sendMessage);
    $('.chatbot-input input').keypress(function(e) {
        if(e.which == 13) sendMessage();
    });

    function sendMessage() {
        const input = $('.chatbot-input input');
        const message = input.val().trim();
        
        if(message) {
            // نمایش پیام کاربر
            displayMessage(message, 'user');
            input.val('');
            
            // شبیه‌سازی پاسخ بات (در مرحله بعد با AJAX به سرور متصل می‌شود)
            setTimeout(() => {
                const botResponse = generateResponse(message);
                displayMessage(botResponse, 'bot');
            }, 800);
        }
    }

    function displayMessage(message, sender) {
        const messagesContainer = $('.chatbot-messages');
        const messageElement = $('<div class="message ' + sender + '-message"></div>').text(message);
        messagesContainer.append(messageElement);
        messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
    }

    // تابع موقت برای پاسخ‌های بات (در فاز بعدی با سرور جایگزین می‌شود)
    function generateResponse(userMessage) {
        const greetings = ['سلام', 'درود', 'hello', 'hi'];
        const questions = ['چیست', 'چیه', 'چی', 'چطور', 'چگونه', '؟'];
        
        if(greetings.some(word => userMessage.toLowerCase().includes(word))) {
            return "درود! من چت بات هوشیار هستم. چگونه می‌توانم به شما کمک کنم؟";
        }
        
        if(questions.some(word => userMessage.includes(word))) {
            return "من می‌توانم به سوالات شما درباره این سایت پاسخ دهم. لطفا سوال خود را دقیق‌تر بپرسید.";
        }
        
        return "متوجه سوال شما نشدم. می‌توانید سوال خود را به شکل دیگری مطرح کنید؟";
    }
});
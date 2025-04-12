jQuery(document).ready(function($) {
    let chatContext = [];

    $('#hooshyar-chatbot-trigger').click(function() {
        $('#hooshyar-chatbot-window').fadeIn(300);
        $(this).fadeOut(100);
    });

    $('.close-chatbot').click(function() {
        $('#hooshyar-chatbot-window').fadeOut(300, function() {
            $('#hooshyar-chatbot-trigger').fadeIn(100);
        });
    });

    $('.send-message').click(sendMessage);
    $('.chatbot-input input').keypress(function(e) {
        if(e.which === 13) sendMessage();
    });

    function sendMessage() {
        const input = $('.chatbot-input input');
        const message = input.val().trim();

        if(!message) return;

        displayMessage(message, 'user');
        input.val('');
        showTypingIndicator();

        const requestData = {
            action: 'hooshyar_chatbot',
            message: message,
            context: JSON.stringify(chatContext),
            nonce: hooshyarChatbot.nonce
        };

        $.ajax({
            url: hooshyarChatbot.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: requestData,
            success: function(response) {
                hideTypingIndicator();

                if(response && response.success) {
                    displayMessage(response.data.response, 'bot');
                    try {
                        chatContext = response.data.context || [];
                    } catch(e) {
                        console.error('Context parsing error:', e);
                        chatContext = [];
                    }
                } else {
                    displayMessage('متاسفانه نتوانستیم پاسخ مناسبی از سرور دریافت کنیم. لطفاً دوباره تلاش کنید', 'bot');
                }
            },
            error: function(xhr, status, error) {
                hideTypingIndicator();

                let errorMsg = 'در حال حاضر ارتباط با سرور برقرار نیست. لطفاً اتصال اینترنت خود را بررسی کرده و مجدد تلاش کنید';
                try {
                    const response = JSON.parse(xhr.responseText);
                    errorMsg = response.data?.message || errorMsg;
                } catch(e) {}

                displayMessage(errorMsg, 'bot');
            }
        });
    }

    let typingInterval; 

    function showTypingIndicator() {
  
        $('.typing-indicator').remove();
    
   
        $('.chatbot-messages').append('<div class="message bot-message typing-indicator">در حال اندیشیدن‌<span class="dots">.</span></div>');
        scrollToBottom();
    
       
        let dotCount = 1;
        typingInterval = setInterval(() => {
            dotCount = (dotCount % 3) + 1;
            $('.typing-indicator .dots').text('.'.repeat(dotCount));
        }, 500);
    }

    function hideTypingIndicator() {
        clearInterval(typingInterval)
        $('.typing-indicator').remove();
    }
    
    

    function hideTypingIndicator() {
        $('.typing-indicator').remove();
    }

    function displayMessage(message, sender) {
        const messageElement = $('<div class="message ' + sender + '-message"></div>').text(message);
        $('.chatbot-messages').append(messageElement);
        scrollToBottom();
    }

    function scrollToBottom() {
        const container = $('.chatbot-messages');
        container.scrollTop(container[0].scrollHeight);
    }
});

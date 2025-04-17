jQuery(document).ready(function($) {
    let chatContext = [];

  // متغیر برای ذخیره آخرین تاریخ نمایش داده شده
let lastDisplayedDate = null;

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
                displayBotMessageWithAnimation(response.data.response);
                try {
                    chatContext = response.data.context || [];
                } catch(e) {
                    console.error('Context parsing error:', e);
                    chatContext = [];
                }
            } else {
                displayBotMessageWithAnimation('متاسفانه نتوانستیم پاسخ مناسبی از سرور دریافت کنیم. لطفاً دوباره تلاش کنید');
            }
        },
        error: function(xhr, status, error) {
            hideTypingIndicator();

            let errorMsg = 'در حال حاضر ارتباط با سرور برقرار نیست. لطفاً اتصال اینترنت خود را بررسی کرده و مجدد تلاش کنید';
            try {
                const response = JSON.parse(xhr.responseText);
                errorMsg = response.data?.message || errorMsg;
            } catch(e) {}

            displayBotMessageWithAnimation(errorMsg);
        }
    });
}

let typingInterval;

function showTypingIndicator() {
    $('.typing-indicator').remove();
    
    $('.chatbot-messages').append(`
        <div class="message bot-message typing-indicator">
            <img class="bot-avatar" src="<?php echo $bot_avatar; ?>" alt="Bot Avatar">
            <div class="message-content">
                <div class="message-text">در حال اندیشیدن<span class="dots">.</span></div>
            </div>
        </div>
    `);
    
    scrollToBottom();
    
    let dotCount = 1;
    typingInterval = setInterval(() => {
        dotCount = (dotCount % 3) + 1;
        $('.typing-indicator .dots').text('.'.repeat(dotCount));
    }, 500);
}

function hideTypingIndicator() {
    clearInterval(typingInterval);
    $('.typing-indicator').remove();
}

function displayMessage(message, sender) {
    const now = new Date();
    const timeString = now.toLocaleTimeString('fa-IR', { hour: '2-digit', minute: '2-digit' });
    const dateString = now.toLocaleDateString('fa-IR');
    
    // نمایش تاریخ اگر با پیام قبلی متفاوت است
    if (lastDisplayedDate !== dateString) {
        lastDisplayedDate = dateString;
        $('.chatbot-messages').append(`<hr class="chat-date-separator"><div class="chat-date">${dateString}</div>`);
    }
    
    const messageElement = $(`
        <div class="message ${sender}-message">
            ${sender === 'bot' ? `<img class="bot-avatar" src="<?php echo $bot_avatar; ?>" alt="Bot Avatar">` : ''}
            <div class="message-content">
                <div class="message-text">${message}</div>
                <div class="message-time">${timeString}</div>
            </div>
        </div>
    `);
    
    $('.chatbot-messages').append(messageElement);
    scrollToBottom();
}

function displayBotMessageWithAnimation(message) {
    const now = new Date();
    const timeString = now.toLocaleTimeString('fa-IR', { hour: '2-digit', minute: '2-digit' });
    const dateString = now.toLocaleDateString('fa-IR');
    
    // نمایش تاریخ اگر با پیام قبلی متفاوت است
    if (lastDisplayedDate !== dateString) {
        lastDisplayedDate = dateString;
        $('.chatbot-messages').append(`<hr class="chat-date-separator"><div class="chat-date">${dateString}</div>`);
    }
    

    const messageElement = $(`
      <div class="message bot-message">
          <img class="bot-avatar" src="" alt="آواتار چت بات">
          <div class="message-content">
              <div class="message-text typing-animation"></div>
              <div class="message-time">${timeString}</div>
          </div>
      </div>
    `);
    
    
    $('.chatbot-messages').append(messageElement);
    scrollToBottom();
    
    // انیمیشن تایپ برای پیام ربات
    let i = 0;
    const speed = 30;
    const typingEffect = setInterval(() => {
        if (i < message.length) {
            messageElement.find('.message-text').html(message.substring(0, i+1));
            i++;
            scrollToBottom();
        } else {
            clearInterval(typingEffect);
        }
    }, speed);
}

function scrollToBottom() {
    const container = $('.chatbot-messages');
    container.scrollTop(container[0].scrollHeight);
}
    // chatbot form 
    

});

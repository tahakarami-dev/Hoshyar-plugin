// assets/js/chat-bot.js
jQuery(document).ready(function($) {
    const ChatBot = {
        init: function() {
            this.chatContainer = $('#chat-bot-container');
            this.messageInput = $('#chat-message-input');
            this.sendButton = $('#chat-send-button');
            this.bindEvents();
        },

        bindEvents: function() {
            this.sendButton.on('click', this.sendMessage.bind(this));
            this.messageInput.on('keypress', this.handleKeyPress.bind(this));
        },

        sendMessage: function() {
            const message = this.messageInput.val().trim();
            
            if (!message) return;

            this.displayMessage(message, 'user');
            this.messageInput.val('');

            $.ajax({
                url: '/wp-json/chat-bot/v1/message',
                method: 'POST',
                data: JSON.stringify({ message: message }),
                contentType: 'application/json',
                success: this.handleResponse.bind(this),
                error: this.handleError.bind(this)
            });
        },

        handleResponse: function(response) {
            if (response.success) {
                this.displayMessage(response.message, 'bot');
            }
        },

        handleError: function(xhr) {
            const errorMessage = xhr.status === 429 
                ? 'محدودیت درخواست‌ها، لطفاً بعداً تلاش کنید'
                : 'خطا در ارسال پیام';
            
            this.displayMessage(errorMessage, 'error');
        },

        displayMessage: function(message, type) {
            const messageElement = $('<div>')
                .addClass(`chat-message ${type}`)
                .text(message);
            
            this.chatContainer.append(messageElement);
            this.scrollToBottom();
        },

        scrollToBottom: function() {
            this.chatContainer.scrollTop(this.chatContainer[0].scrollHeight);
        },

        handleKeyPress: function(event) {
            if (event.which === 13) {
                this.sendMessage();
                event.preventDefault();
            }
        }
    };

    ChatBot.init();
});
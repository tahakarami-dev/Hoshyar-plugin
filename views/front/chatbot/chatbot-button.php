<?php
$status_plugin = hya_settings('status-plugin');
$status_chatbot = hya_settings('status-chatbot');
$chatbot_icon = hya_settings('chatbot-icon');
$chatbot_animation = hya_settings('chatbot-animation');
$chatbot_animation_time = hya_settings('chatbot-animation-time');



?>
<?php if ($status_plugin): ?>
    <?php if ($status_chatbot): ?>
        
        <div id="hooshyar-chatbot-trigger" class="hooshyar-chatbot-trigger" data-animations="<?php echo esc_html($chatbot_animation ) ?>" data-interval="<?php echo esc_html($chatbot_animation_time ) ?>">
            <?php if ($chatbot_icon['url']): ?>
                <img class="chatbot-icon" src="<?php echo $chatbot_icon['url'] ?>" alt="Chatbot ">
            <?php else : ?>
                <img class="chatbot-icon" src="<?php echo HYA_ASSETS . 'images/front/icons8-chat-bubble-48.png' ?>" alt=" Chatbot Icon">
            <?php endif; ?>
            <div class="number-message">۳</div>
        </div>
    <?php endif; ?>
<?php endif; ?>
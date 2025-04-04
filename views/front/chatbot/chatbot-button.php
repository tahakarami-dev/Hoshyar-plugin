<?php
$status_chatbot = hya_settings('status-chatbot');
$chatbot_icon = hya_settings('chatbot-icon');
?>

<?php if ($status_chatbot): ?>
    <div id="hooshyar-chatbot-trigger" class="hooshyar-chatbot-trigger">
        <?php if ($chatbot_icon): ?>
            <img class="chatbot-icon" src="<?php echo $chatbot_icon?>" alt="Chatbot ">
        <?php else : ?>
            <img class="chatbot-icon" src="<?php echo HYA_ASSETS . 'images/front/icons8-chat-bubble-48.png' ?>" alt=" Chatbot Icon">
        <?php endif; ?>
    </div>
<?php endif; ?>
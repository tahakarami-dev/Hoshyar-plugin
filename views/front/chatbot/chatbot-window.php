<?php
$chatbot_title = hya_settings('chatbot-title');
$chatbot_desc = hya_settings('chatbot-desc');
$chatbot_logo = hya_settings('chatbot-logo');

?>

<div id="hooshyar-chatbot-window" class="hooshyar-chatbot-window">
    <div class="chatbot-header">
        <div class="content-header">
            <div class="logo">
                <?php if ($chatbot_logo['url']): ?>
                    <img class="chatbot-logo" src="<?php echo $chatbot_logo['url'] ?>" alt="">
                <?php else: ?>
                    <img class="chatbot-logo" src="<?php echo HYA_ASSETS . 'images/front/icons8-robot-48.png' ?>" alt="">
                <?php endif; ?>

            </div>
            <div class="content">
                <h3><?php echo $chatbot_title ?></h3>
                <p><?php echo $chatbot_desc ?></p>
            </div>

        </div>
        <button class="close-chatbot"><i class="fas fa-times"></i></button>
    </div>
    <div class="chatbot-messages">
       </div>
    <div class="chatbot-input">
        <input type="text" placeholder="پیام خود را بنویسید...">
        <button class="send-message"><i class="fas fa-paper-plane"></i></button>
        <button type="file" class="send-file"><i class="fas fa-paperclip"></i></button>

    </div>
</div>


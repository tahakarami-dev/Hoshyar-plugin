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
        <div class="cloes-holder">
            <button class="close-chatbot"><img width="20px" src="<?php echo HYA_ASSETS . 'images/front/icons8-close-24.png' ?>" alt=""></button>
        </div>
    </div>
  

    <div class="chatbot-messages">
        <div id="initial-form" class="initial-form" style="display: none;">
            <h4>قبل از شروع گفت‌وگو، لطفاً این فرم رو پر کن تا بهتر بتونیم کمکت کنیم 😊</h4>
            <form id="user-info-form">
                <div class="form-group">
                    <label for="user-name">نام</label>
                    <input type="text" id="user-name" name="user-name" required placeholder="مثال: طاها‌ کرمی">
                </div>
                <div class="form-group">
                    <label for="user-phone">شماره تماس</label>
                    <input type="tel" id="user-phone" name="user-phone" required placeholder="مثال: ۰۹۲۱۳۴۵۶۷۸۹">
                </div>
                <button type="submit" class="submit-form">شروع گفتگو</button>
            </form>
        </div>

        <div id="success-message" class="success-message" style="display: none;">
            <p>اطلاعات شما با موفقیت ثبت شد. حالا می‌توانید با چت بات گفتگو کنید.</p>
        </div>

        <div id="chat-content" class="chat-content">
        </div>
    </div>

    <div class="chatbot-input">
        <input type="text" placeholder="پیام خود را بنویسید...">
        <button class="send-message"><img width="20px" src="<?php echo HYA_ASSETS . 'images/front/icons8-paper-plane-24 (1).png' ?>" alt=""></button>
    </div>
</div>


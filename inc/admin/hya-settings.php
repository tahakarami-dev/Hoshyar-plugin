<?php

defined('ABSPATH') || exit('NO Access');




$prefix = 'hya_settings';

CSF::createOptions($prefix, array(
    'parent_slug'   => 'hoshyar',
    'menu_title'    => 'تنظیمات',
    'menu_hidden' => true,
    'menu_slug'     => 'hya_menu_settings',
    'framework_title' => ' تنظیمات هوشیار',
));

CSF::createSection($prefix, array(
    'title'  => 'عمومی',
    'fields' => array(
        array(
            'id'    => 'status-plugin',
            'type'  => 'switcher',
            'title' => 'وضعیت افزونه',
        ),

    )
));

CSF::createSection($prefix, array(
    'title'  => 'تولید محتوا',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => ' چت و تعامل با هوش مصنوعی',
    'fields' => array(

        array(
            'type'    => 'heading',
            'content' => ' اتصال به سرویس  ',
        ),

        array(
            'id'    => 'status-chatbot',
            'type'  => 'switcher',
            'title' => ' فعال کردن هوشیار  ',
            'default' => true,

        ),
        array(
            'id'          => 'Service-model',
            'type'        => 'select',
            'title'       => 'مدل هوش مصنوعی',
            'placeholder' => ' یک مدل را انتخاب نمایید',
            'options'     => array(
                'Chatgpt'  => 'Chatgpt',
                'Deepseek'  => 'Deepseek',
            ),
            'dependency' => array('status-chatbot', '==', 'true'),

        ),
        array(
            'id'          => 'Service-Version-chatgpt',
            'type'        => 'select',
            'title'       => 'نسخه هوش مصنوعی',
            'placeholder' => ' یک نسخه را انتخاب نمایید',
            'options'     => array(
                'gpt-4'  => 'gpt-4',
                'gpt-4-turbo'  => 'gpt-4-turbo',
                'gpt-4o-mini'  => 'gpt-4o-mini',
                'gpt-3.5-turbo'  => 'gpt-3.5-turbo',


            ),
            'dependency' => array('Service-model', '==', 'Chatgpt'),
            'dependency' => array('status-chatbot', '==', 'true'),


        ),
        array(
            'id'          => 'Service-Version-deepseek',
            'type'        => 'select',
            'title'       => 'نسخه هوش مصنوعی',
            'placeholder' => ' یک نسخه را انتخاب نمایید',
            'options'     => array(
                'deepseek-chat'  => 'deepseek-chat',

            ),
            'dependency' => array('Service-model', '==', 'Deepseek'),
            'dependency' => array('status-chatbot', '==', 'true'),


        ),

        array(
            'id'      => 'Service-api-key',
            'type'    => 'text',
            'title'   => 'کلید API',
            'dependency' => array('status-chatbot', '==', 'true'),
            'placeholder' => 'لطفا API را وارد نمایید',


        ),

        array(
            'type'    => 'heading',
            'content' => 'تنظیمات گفتگو',
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'      => 'chatbot-welcome-message',
            'type'    => 'textarea',
            'title'   => 'پیغام خوش آمدگویی',
            'default' => 'سلام و خوش آمدید! من هوشیار هستم، دستیار شما. خوشحالم که به اینجا اومدید! هر سوال یا مشکلی که دارید، می‌توانید از من بپرسید. هدف من این است که به شما کمک کنم و تجربه‌ای راحت و مفید داشته باشید. 😊',
            'dependency' => array('status-chatbot', '==', 'true'),
        ),

        array(
            'id'          => 'Chatbot-personality-mode',
            'type'        => 'select',
            'title'       => ' حالت شخصیت چت‌بات',
            'placeholder' => ' یک حالت را انتخاب نمایید',
            'options'     => array(
                'Formal'  => 'رسمی',
                'Friendly'  => 'دوستانه',
                'Professional'  => 'تخصصی',
                'Humorous'  => 'شوخ و سرگرم‌کننده',
                'Casual'  => 'خودمانی',
                'Empathetic'  => 'احساسی',
                'Intelligent '  => 'هوشمند و جدی',
                'Inquisitive '  => 'محققانه',

            ),
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'      => 'Response-length-limit',
            'type'    => 'number',
            'title'   => 'محدودیت طول پاسخ',
            'default' => 300,
            'dependency' => array('status-chatbot', '==', 'true'),
        ),
        array(
            'id'      => 'Maximum-save-message',
            'type'    => 'number',
            'title'   => 'حداکثر تعداد پیام‌های ذخیره‌شده',
            'default' => 30,
            'dependency' => array('status-chatbot', '==', 'true'),
        ),

        array(
            'id'    => 'Chat-restart-settings',
            'type'  => 'switcher',
            'title' => 'تنظیمات شروع مجدد چت',
            'default' => false,
            'dependency' => array('status-chatbot', '==', 'true'),

        ),
        array(
            'id'      => 'Response-timeout',
            'type'    => 'number',
            'title'   => 'تایم‌اوت پاسخ	(ثانیه)',
            'default' => 30,
            'dependency' => array('status-chatbot', '==', 'true'),
        ),

        
        array(
            'id'    => 'use-username',
            'type'  => 'switcher',
            'title' => 'استفاده از نام کاربر در چت',
            'default' => false,
            'dependency' => array('status-chatbot', '==', 'true'),

        ),





        array(
            'type'    => 'heading',
            'content' => 'تنظیمات ظاهری',
            'dependency' => array('status-chatbot', '==', 'true'),

        ),





        array(
            'id'      => 'chatbot-title',
            'type'    => 'text',
            'title'   => ' عنوان چت بات  ',
            'default' => 'چت بات هوشیار ',
            'dependency' => array('status-chatbot', '==', 'true'),
        ),
        array(
            'id'      => 'chatbot-desc',
            'type'    => 'text',
            'title'   => ' توضیحات چت بات  ',
            'default' => '  با عشق پاسخگوی سوالات شما هستیم ',
            'dependency' => array('status-chatbot', '==', 'true'),

        ),
        array(
            'id'    => 'chatbot-icon',
            'type'  => 'media',
            'title' => 'آیکون چت بات ',
            'dependency' => array('status-chatbot', '==', 'true'),
            'default' =>  HYA_ASSETS . 'images/front/icons8-chat-bubble-48.png'

        ),
        array(
            'id'    => 'chatbot-logo',
            'type'  => 'media',
            'title' => 'لوگو چت بات ',
            'dependency' => array('status-chatbot', '==', 'true'),
            'default' =>   HYA_ASSETS . 'images/front/icons8-robot-48.png'

        ),


        array(
            'id'    => 'main-color',
            'type'  => 'color',
            'title' => 'رنگ اصلی چت بات ',
            'dependency' => array('status-chatbot', '==', 'true'),
            'output' => array(
                'color' => '',
                'background-color' => '.hooshyar-chatbot-trigger ,.chatbot-header,.chatbot-input button,.bot-message',
                'border-bottom-color' => ',',
                'border-color' => ''
            ),
            'output_important' => true,
            'default' => '#16c77a'

        ),

        array(
            'id'    => 'text-color',
            'type'  => 'color',
            'title' => 'رنگ متن های چت بات ',
            'dependency' => array('status-chatbot', '==', 'true'),
            'output' => array(
                'color' => '.chatbot-header h3 , .chatbot-header p, .bot-message ',
                'background-color' => '',
                'border-bottom-color' => ',',
                'border-color' => ''
            ),
            'output_important' => true,
            'default' => '#000000'

        ),

    )
));

CSF::createSection($prefix, array(
    'title'  => 'تولید تصویر',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => ' بهینه‌سازی و سئو',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => ' اتوماسیون و کران‌جاب',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => '  API و وب‌هوک',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => ' شخصی‌سازی',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => ' ذخیره‌سازی و کش ',
    'fields' => array()
));

CSF::createSection($prefix, array(
    'title'  => 'امنیت و حریم خصوصی',
    'fields' => array()
));

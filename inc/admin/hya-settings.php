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
            'title' => ' فعال کردن چت بات  ',
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
            'dependency' => array(
                array('status-chatbot', '==', 'true'),
                array('Service-model', '==', 'Chatgpt')
            ),

        ),
        array(
            'id'          => 'Service-Version-deepseek',
            'type'        => 'select',
            'title'       => 'نسخه هوش مصنوعی',
            'placeholder' => ' یک نسخه را انتخاب نمایید',
            'options'     => array(
                'deepseek-chat'  => 'deepseek-chat',

            ),
            'dependency' => array(
                array('status-chatbot', '==', 'true'),
                array('Service-model', '==', 'Deepseek')
            ),


        ),

        array(
            'id'      => 'Service-api-key',
            'type'    => 'text',
            'title'   => 'کلید API (این کلید رمزنگاری خواهد شد)',
            'dependency' => array('status-chatbot', '==', 'true'),
            'placeholder' => 'لطفا API را وارد نمایید',
            'sanitize' => function ($value) {
                return hya_encrypt_decrypt('encrypt', $value);
            },
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
            'title'   => 'توضیحات چت بات',
            'default' => 'با عشق پاسخگوی سوالات شما هستیم',
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
            'id'          => 'chatbot-animation',
            'type'        => 'select',
            'title'       => 'جلب توجه آیکون',
            'placeholder' => ' یک انیمیشن را انتخاب نمایید',
            'options'     => array(
                'shake'  => 'shake',
                'pulse'  => 'pulse',
                'rotate'  => 'rotate',
                'bounce'  => 'bounce',
                'flash'  => 'flash',
            ),
            'dependency' => array('status-chatbot', '==', 'true'),

        ),
        array(
            'id'      => 'chatbot-animation-time',
            'type'    => 'number',
            'title'   => ' نمایش بعد از (ثانیه)',
            'default' => '3',
            'dependency' => array('status-chatbot', '==', 'true'),
        ),
        array(
            'id'    => 'main-color',
            'type'  => 'color',
            'title' => 'رنگ اصلی چت بات ',
            'dependency' => array('status-chatbot', '==', 'true'),
            'output' => array(
                'color' => '',
                'background-color' => '.hooshyar-chatbot-trigger ,.chatbot-header,.chatbot-input button,.bot-message, .chatbot-messages .submit-form',
                'border-bottom-color' => ',',
                'border-color' => '.form-group input:hover, .form-group input:focus'
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

        array(
            'type'    => 'heading',
            'content' => 'تنظیمات گفتگو',
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'      => 'chatbot-name',
            'type'    => 'text',
            'title'   => 'نام دستیار هوش مصنوعی',
            'default' => 'هوشیار ',
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
            'id'      => 'chatbot-prompt',
            'type'    => 'textarea',
            'title'   => 'پرامپت سفارشی ',
            'default' => '',
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
            'id'          => 'Chatbot-limit-anwering',
            'type'        => 'select',
            'title'       => ' نوع پاسخ',
            'placeholder' => ' یک حالت را انتخاب نمایید',
            'options'     => array(
                'short'  => 'کوتاه',
                'complete'  => 'کامل',
                'simple'  => 'ساده',
                'technical'  => 'فنی ',



            ),
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'          => 'Chatbot-temperature',
            'type'        => 'select',
            'title'       => 'میزان خلاقیت',
            'placeholder' => ' یک حالت را انتخاب نمایید',
            'options'     => array(
                '0.0'  => ' بسیار کم',
                '0.2'  => 'کم',
                '0.5'  => 'متعادل',
                '0.7'  => 'خلاق ',
                '0.9'  => ' بسیار خلاق ',
                '1.0'  => ' کاملاً تصادفی ',




            ),
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'     => 'faq',
            'type'   => 'repeater',
            'title'  => 'سوالات پرتکرار',
            'fields' => array(

                array(
                    'id'    => 'save_message_title',
                    'type'  => 'text',
                    'title' => 'عنوان سوال'
                ),
                array(
                    'id'    => 'message_save',
                    'type'  => 'textarea',
                    'title' => '  پاسخ سوال '
                ),

            ),

            'dependency' => array('status-chatbot', '==', 'true'),

        ),


        array(
            'id'     => 'Content-filter',
            'type'   => 'repeater',
            'title'  => ' فیلتر محتوا ',
            'fields' => array(

                array(
                    'id'    => 'save_message_title',
                    'type'  => 'text',
                    'title' => ' کلمات خاص یا موضوع حساس'
                ),

            ),

            'dependency' => array('status-chatbot', '==', 'true'),

        ),





        array(
            'id'      => 'Response-length-limit',
            'type'    => 'number',
            'title'   => '  محدویدت طول پاسخ (حداکثر)',
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
            'id'      => 'Response-timeout',
            'type'    => 'number',
            'title'   => 'تایم‌اوت پاسخ	(ثانیه)',
            'default' => 30,
            'dependency' => array('status-chatbot', '==', 'true'),
        ),

        array(
            'id'      => 'Response-timeout',
            'type'    => 'number',
            'title'   => ' سرعت پاسخگویی (ثانیه)',
            'default' => 4,
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
            'id'    => 'use-username',
            'type'  => 'switcher',
            'title' => 'استفاده از نام کاربر در چت',
            'default' => false,
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'    => 'user-Learning',
            'type'  => 'switcher',
            'title' => 'یادگیری از تعاملات کاربر',
            'default' => true,
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'    => 'user-reaction',
            'type'  => 'switcher',
            'title' => 'بازخورد کاربر',
            'default' => false,
            'dependency' => array('status-chatbot', '==', 'true'),

        ),

        array(
            'id'    => 'use-emoji',
            'type'  => 'switcher',
            'title' => 'ارسال ایموجی',
            'default' => true,
            'dependency' => array('status-chatbot', '==', 'true'),

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

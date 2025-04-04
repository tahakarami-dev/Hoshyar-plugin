<?php
if (!class_exists('CSF')) {
    return;
}

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
            'content' => 'تنظیمات ظاهری',
        ),


        array(
            'id'    => 'status-chatbot',
            'type'  => 'switcher',
            'title' => 'وضعیت نمایش چت بات هوش مصنوعی ',
            'default' => true,

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

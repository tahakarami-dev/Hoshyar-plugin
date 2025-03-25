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
    'framework_title' => ' تنظیمات هوشیار' ,
));

CSF::createSection($prefix, array(
    'title'  => 'عمومی',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => 'تولید محتوا',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => ' چت و تعامل با هوش مصنوعی',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => 'تولید تصویر',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => ' بهینه‌سازی و سئو',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => ' اتوماسیون و کران‌جاب',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => '  API و وب‌هوک',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => ' شخصی‌سازی',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => ' ذخیره‌سازی و کش ',
    'fields' => array(

    )
));

CSF::createSection($prefix, array(
    'title'  => 'امنیت و حریم خصوصی',
    'fields' => array(

    )
));


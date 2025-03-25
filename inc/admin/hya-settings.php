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
    'title'  => 'تنظیمات عمومی',
    'fields' => array(

     array(
  'id'      => 'opt-text',
  'type'    => 'text',
  'title'   => 'عنوان',
),

    )
));

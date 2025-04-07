<?php

defined('ABSPATH') || exit('NO Access');

function hya_settings($key = '')
{
    $options = get_option('hya_settings');
    return isset($options[$key]) ? $options[$key] : null;
}

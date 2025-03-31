<?php

function hya_settings($key = '')
{
    $options = get_option('hya_settings');
    return isset($options[$key]) ? $options[$key] : null;
}


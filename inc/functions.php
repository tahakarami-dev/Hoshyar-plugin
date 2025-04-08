<?php

defined('ABSPATH') || exit('NO Access');

function hya_settings($key = '')
{
    $options = get_option('hya_settings');

    if (!isset($options[$key])) {
        return null;
    }

    if ($key === 'Service-api-key') {
        return hya_encrypt_decrypt('decrypt', $options[$key]);
    }

    return $options[$key];
}
function hya_encrypt_decrypt($action, $string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = md5('mLrPx1joS6QqUd7enQ0zBk2WxN36Wg2VQTDSQiQJbW7gvpyqbp');
    $secret_iv = md5('mLrPx1joS6QqUd7enQ0zBk2WxN36Wg2VQTDSQiQJbW7gvpyqbp');

    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

<?php 

function encrypt($str, $iv)
{
    $key = '1239Mohammed%#^&@*#@';
    $cipher = "AES-128-IVR";
    $ivLen = openssl_cipher_iv_length($cipher);
    $options = 0;
    $str = openssl_encrypt($str, $cipher, $key, $options, $iv);
    return $str;
}

function decrypt($str, $iv)
{
    $key = '1239Mohammed%#^&@*#@';
    $cipher = "AES-128-IVR";
    $ivLen = openssl_cipher_iv_length($cipher);
    $options = 0;
    $str = openssl_decrypt($str, $cipher, $key, $options, $iv);
    return $str;
}

?>
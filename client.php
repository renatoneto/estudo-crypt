<?php

require 'vendor/autoload.php';

try {

    $crypter = new Crypter();

    if (empty($_POST['data'])) {
        throw new Exception();
    }

    $encrypted = $crypter->encrypt(
        json_encode($_POST['data']),
        file_get_contents('keys/server.pub'),
        \phpseclib\Crypt\Random::string(150)
    );

    $c = curl_init($_SERVER['HTTP_ORIGIN'] . str_replace('client.php', null, $_SERVER['DOCUMENT_URI']) . 'server.php');
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $encrypted);
    curl_setopt($c, CURLOPT_HTTPHEADER, ['Content-Type: text/plain']);

    $result = curl_exec($c);

    echo $crypter->decrypt($result, file_get_contents('keys/client.pri'));

} catch (Exception $e) {
    echo 'invalid request';
}
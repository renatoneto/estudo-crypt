<?php

require 'vendor/autoload.php';

try {

    $crypter = new Crypter();
    $request = file_get_contents('php://input');

    if (empty($request)) {
        throw new Exception();
    }

    $data = json_decode($crypter->decrypt($request, file_get_contents('keys/server.pri')));

    foreach ($data as $key => $value) {
        $data->{$key} = $value . ' :)';
    }

    $data->date = date('Y-m-d H:i:s');

    echo $crypter->encrypt(json_encode($data), file_get_contents('keys/client.pub'), \phpseclib\Crypt\Random::string(150));

} catch (Exception $e) {
    echo 'invalid request';
}
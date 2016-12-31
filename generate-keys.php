<?php

require 'vendor/autoload.php';

$rsa  = new \phpseclib\Crypt\RSA();
$keys = $rsa->createKey(2048);

file_put_contents('keys/server.pri', $keys['privatekey']);
file_put_contents('keys/server.pub', $keys['publickey']);

$keys = $rsa->createKey(2048);

file_put_contents('keys/client.pri', $keys['privatekey']);
file_put_contents('keys/client.pub', $keys['publickey']);
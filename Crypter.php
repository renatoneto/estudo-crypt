<?php

class Crypter
{

    protected $symmetricCrypt;

    protected $asymmetricCrypt;

    public function __construct()
    {
        $this->asymmetricCrypt = new \phpseclib\Crypt\RSA();
        $this->symmetricCrypt  = new \phpseclib\Crypt\Rijndael();
    }

    public function encrypt($text, $asymmetricKey, $symmetricKey)
    {
        $this->symmetricCrypt->setKey($symmetricKey);
        $cipherText = base64_encode($this->symmetricCrypt->encrypt($text));

        $this->asymmetricCrypt->loadKey($asymmetricKey);
        $symmetricKey = base64_encode($this->asymmetricCrypt->encrypt($symmetricKey));

        $symmetricKeyLength = strlen($symmetricKey);
        $symmetricKeyLength = dechex($symmetricKeyLength);
        $symmetricKeyLength = str_pad($symmetricKeyLength, 3, '0', STR_PAD_LEFT);

        return $symmetricKeyLength . $symmetricKey . $cipherText;
    }

    public function decrypt($cipherText, $asymmetricKey)
    {
        $symmetricKeyLength = substr($cipherText, 0, 3);
        $symmetricKeyLength = hexdec($symmetricKeyLength);

        $symmetricKey       = substr($cipherText, 3, $symmetricKeyLength);
        $symmetricKey       = base64_decode($symmetricKey);

        $cipherText = substr($cipherText, 3);
        $cipherText = substr($cipherText, $symmetricKeyLength);
        $cipherText = base64_decode($cipherText);

        $this->asymmetricCrypt->loadKey($asymmetricKey);
        $symmetricKey = $this->asymmetricCrypt->decrypt($symmetricKey);

        $this->symmetricCrypt->setKey($symmetricKey);
        return $this->symmetricCrypt->decrypt($cipherText);
    }

}
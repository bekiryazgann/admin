<?php

namespace Core;

class Crypto{

    private static Crypto $instance;
    /**
     * @var string
     */
    public string $key;

    /**
     * @var string
     */
    public string $cipher;


    public static function getInstance(): Crypto
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->key = 'socore_xx__1+Mehmet+Bekir';
        $this->cipher = 'AES-128-ECB';
    }

    public function encode(string $data): string
    {
        return @openssl_encrypt($data, $this->cipher, $this->key);
    }

    public function decode(string $data): string
    {
        return @openssl_decrypt($data, $this->cipher, $this->key);
    }
}
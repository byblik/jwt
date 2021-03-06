<?php

namespace Psecio\Jwt\HashMethod;

class ES512 extends \Psecio\Jwt\HashMethod
{
    protected $keyType = OPENSSL_KEYTYPE_RSA;

    public function getAlgorithm()
    {
        if (version_compare(phpversion(), '5.4.8', '<')) {
            return 'SHA512';
        } else {
            if (!extension_loaded('openssl')) {
                throw new \InvalidArgumentException('You cannot use this hashing method without OpenSSL support');
            }
            return OPENSSL_ALGO_SHA512;
        }
    }
}
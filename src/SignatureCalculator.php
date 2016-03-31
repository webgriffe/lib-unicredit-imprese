<?php

namespace Webgriffe\LibUnicreditImprese;

class SignatureCalculator implements SignatureCalculatorInterface
{
    /**
     * @param $data
     * @param $key
     * @return string
     */
    public function calculate($data, $key, $method = 'sha256')
    {
        return base64_encode(hash_hmac($method, $data, $key, true));
    }
}

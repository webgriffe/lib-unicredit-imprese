<?php

namespace Webgriffe\LibUnicreditImprese;

class SignatureCalculator
{
    /**
     * @param $signable
     * @param $key
     * @return string
     */
    public function sign(SignableInterface $signable, $key, $method = 'sha256')
    {
        $signable->setSignature(base64_encode(hash_hmac($method, $signable->getSignatureData(), $key, true)));
    }
}

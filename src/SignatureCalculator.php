<?php

namespace Webgriffe\LibUnicreditImprese;

class SignatureCalculator
{
    /**
     * @param SignableInterface $signable
     * @param $key
     * @param string $method
     */
    public function sign(SignableInterface $signable, $key, $method = 'sha256')
    {
        $signable->setSignature(base64_encode(hash_hmac($method, $signable->getSignatureData(), $key, true)));
    }
}

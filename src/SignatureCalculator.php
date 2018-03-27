<?php

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;

class SignatureCalculator
{
    use Logging;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param SignableInterface $signable
     * @param $key
     * @param string $method
     */
    public function sign(SignableInterface $signable, $key, $method = 'sha256')
    {
        $stringToSign = $signable->getSignatureData();

        $this->log('Signature calculated on string: '.$stringToSign);

        $signature = base64_encode(hash_hmac($method, $stringToSign, $key, true));

        $this->log('Calculated signature: '.$signature);

        $signable->setSignature($signature);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 15/04/16
 * Time: 15.44
 */

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

abstract class PaymentResponse
{
    /**
     * PaymentResponse constructor.
     * @param \stdClass $rawSoapResponse
     */
    public function __construct(\stdClass $rawSoapResponse)
    {
        $this->initFromRawSoapResponse($rawSoapResponse);
    }

    /**
     * @param \stdClass $rawSoapResponse
     * @return void
     */
    abstract protected function initFromRawSoapResponse(\stdClass $rawSoapResponse);
}

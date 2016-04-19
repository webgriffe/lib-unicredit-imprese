<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 15/04/16
 * Time: 15.44
 */

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;

class PaymentResponse
{
    protected $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }
}

<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese;
use Webgriffe\LibUnicreditImprese\SignatureCalculatorInterface;
use Webgriffe\LibUnicreditImprese\RequestValidatorInterface;
use Psr\Log\LoggerInterface;

class PaymentVerifyRequestSpec extends ObjectBehavior
{
    function it_is_initializable(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentVerifyRequest');
    }
}

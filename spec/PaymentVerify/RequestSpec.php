<?php

namespace spec\Webgriffe\LibUnicreditImprese\PaymentVerify;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese;
use Webgriffe\LibUnicreditImprese\SignatureCalculatorInterface;
use Webgriffe\LibUnicreditImprese\RequestValidatorInterface;
use Psr\Log\LoggerInterface;

class RequestSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith();
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentVerify\Request');
    }
}

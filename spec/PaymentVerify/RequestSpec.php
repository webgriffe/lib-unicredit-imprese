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
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentVerify\Request');
    }

    function it_can_generate_signature_data()
    {
        $this->setTid(1);
        $this->setShopId(2);
        $this->setPaymentId(3);
        $this->getSignatureData()->shouldBeEqualTo("123");
    }

    function it_can_to_array()
    {
        $this->setTid('tid');
        $this->setShopId('shopid');
        $this->setPaymentId('paymentid');
        $this->toArray()->shouldHaveKeyWithValue('tid', 'tid');
        $this->toArray()->shouldHaveKeyWithValue('shopID', 'shopid');
        $this->toArray()->shouldHaveKeyWithValue('paymentID', 'paymentid');
        
    }
}

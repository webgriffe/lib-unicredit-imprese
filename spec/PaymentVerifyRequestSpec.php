<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentVerifyRequestSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentVerifyRequest');
    }
}

<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentRequestSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentRequest');
    }
}

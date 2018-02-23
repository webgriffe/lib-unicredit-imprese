<?php

namespace spec\Webgriffe\LibUnicreditImprese\SoapClient;

use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\WrapperInterface;

class WrapperSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\SoapClient\Wrapper');
        $this->shouldImplement('Webgriffe\LibUnicreditImprese\SoapClient\WrapperInterface');
    }

    public function it_should_not_be_initialized_until_initialize_is_called()
    {
        $this->isInitialized()->shouldBe(false);
    }
}

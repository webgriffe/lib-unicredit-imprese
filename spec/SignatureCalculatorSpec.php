<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use Webgriffe\LibUnicreditImprese\SignableInterface;

class SignatureCalculatorSpec extends ObjectBehavior
{
    public function it_is_initializable(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\SignatureCalculator');
    }

    public function it_should_sign_signable_object(LoggerInterface $logger, SignableInterface $signable)
    {
        $this->beConstructedWith($logger);

        $signable->getSignatureData()->willReturn('signedData');
        $signable->setSignature('0TgQ4fBuscfYP8BM68etc7k6usMFxdUOFI3spL0IoRI=')->shouldBeCalled();
        $this->sign($signable, 'key');
    }

    public function it_should_sign_signable_object_with_nonstandard_method(
        LoggerInterface $logger,
        SignableInterface $signable
    ) {
        $this->beConstructedWith($logger);

        $signable->getSignatureData()->willReturn('signedData');
        $signable->setSignature('uPWZriEDDPuCQe/NFpNoEg==')->shouldBeCalled();
        $this->sign($signable, 'key', 'md5');
    }
}

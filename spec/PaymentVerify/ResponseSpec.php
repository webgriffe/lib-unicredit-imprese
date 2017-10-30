<?php

namespace spec\Webgriffe\LibUnicreditImprese\PaymentVerify;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese\PaymentVerify\Response;

class ResponseSpec extends ObjectBehavior
{
    public function it_should_initialize_from_successful_raw_response()
    {
        $this->beConstructedWith($this->getSuccessfulSoapRawResponse());

        $this->shouldHaveType(Response::class);
        $this->getRc()->shouldBe('RC');
        $this->getError()->shouldBe(false);
        $this->getErrorDesc()->shouldBe('');
        $this->getSignature()->shouldBe('signature');
        $this->getShopId()->shouldBe('shopid');
        $this->getPaymentId()->shouldBe('paymentid');
        $this->getTranId()->shouldBe('tranid');
        $this->getAuthCode()->shouldBe('authcode');
        $this->getEnrStatus()->shouldBe('enrstatus');
        $this->getAuthStatus()->shouldBe('authstatus');
        $this->getBrand()->shouldBe('brand');
    }

    public function it_should_initialize_from_error_raw_response()
    {
        $this->beConstructedWith($this->getErrorSoapRawResponse());

        $this->shouldHaveType(Response::class);
        $this->getRc()->shouldBe('RC');
        $this->getError()->shouldBe(true);
        $this->getErrorDesc()->shouldBe('errordesc');
        $this->getSignature()->shouldBe('signature');
        $this->getShopId()->shouldBe('shopid');
        $this->getPaymentId()->shouldBe('paymentid');
        $this->getTranId()->shouldBeNull();
        $this->getAuthCode()->shouldBeNull();
        $this->getEnrStatus()->shouldBeNull();
        $this->getAuthStatus()->shouldBeNull();
        $this->getBrand()->shouldBeNull();
    }

    private function getSuccessfulSoapRawResponse()
    {
        $response = new \stdClass();
        $response->tid = 123456;
        $response->rc = 'RC';
        $response->error = false;
        $response->errorDesc = '';
        $response->signature = 'signature';
        $response->shopID = 'shopid';
        $response->paymentID = 'paymentid';
        $response->tranID = 'tranid';
        $response->authCode = 'authcode';
        $response->enrStatus = 'enrstatus';
        $response->authStatus = 'authstatus';
        $response->brand = 'brand';
        $soapResponse = new \stdClass();
        $soapResponse->response = $response;
        return $soapResponse;
    }

    private function getErrorSoapRawResponse()
    {
        $response = new \stdClass();
        $response->tid = 123456;
        $response->rc = 'RC';
        $response->error = true;
        $response->errorDesc = 'errordesc';
        $response->signature = 'signature';
        $response->shopID = 'shopid';
        $response->paymentID = 'paymentid';
        $soapResponse = new \stdClass();
        $soapResponse->response = $response;
        return $soapResponse;
    }
}

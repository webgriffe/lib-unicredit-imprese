<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese\PaymentInitRequest;
use spec\Webgriffe\LibUnicreditImprese;

class ClientSpec extends ObjectBehavior
{
    function it_is_initializable(\SoapClient $soapClient)
    {
        $this->beConstructedWith($soapClient);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\Client');
    }

    function should_throw_exceptions_if_tid_missing(\SoapClient $soapClient)
    {
        $soapClient->beADoubleOf('\SoapClient');
        $this->beConstructedWith($soapClient);
        $this->init(new PaymentInitRequest());
        $this->shouldThrow(new \Exception(""))->duringInit();
    }

    function payment_init_should_return_payment_init_response(\SoapClient $soapClient)
    {
        $soapClient->beADoubleOf('\SoapClient');
        $soapClient->init()->willReturn($this->getSoapInitResponse());
        $this->paymentInit()->shouldReturnAnInstanceOf('Webgriffe\LibUnicreditImprese\PaymentInitResponse');
    }

    function payment_verify_should_return_payment_verify_response(\SoapClient $soapClient)
    {
        $soapClient->beADoubleOf('\SoapClient');
        $soapClient->init()->willReturn($this->getSoapVerifyResponse());
        $this->paymentVerify()->shouldReturnAnInstanceOf('Webgriffe\LibUnicreditImprese\PaymentVerifyResponse');
    }

    function getSoapInitResponse()
    {
        $data = array();
        $data["Error"] = "false";
        $data["Rc"] = "tutto bene";
        $data["ErrorDesc"] = "error desc";
        $data["PaymentID"] = "9854";
        $data["RedirectURL"] = "http://www.banca.com/paga/";
        return $data;
    }

    function getSoapVerifyResponse()
    {
        $data = array();
        $data["Error"] = "";
        $data["Rc"] = "";
        $data["ErrorDesc"] = "";
        $data["TranId"] = "";
        $data["AuthCode"] = "";
        $data["EnrStatus"] = "";
        $data["AuthStatus"] = "";
        $data["Brand"] = "";
        return $data;

    }
}

<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use Webgriffe\LibUnicreditImprese\PaymentInit\Request;
use spec\Webgriffe\LibUnicreditImprese;

class ClientSpec extends ObjectBehavior
{
    function it_is_initializable(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\Client');
    }

    function should_throw_exceptions_if_tid_missing(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->paymentInit(new Request());
        $this->shouldThrow(new \Exception(""))->duringInit();
    }

    function payment_init_should_return_payment_init_response()
    {
        $soapClient = null;
        $soapClient->beADoubleOf('\SoapClient');
        $soapClient->paymentInit()->willReturn($this->getSoapInitResponse());
        $this->paymentInit()->shouldReturnAnInstanceOf('Webgriffe\LibUnicreditImprese\PaymentInit\Response');
    }

    function payment_verify_should_return_payment_verify_response()
    {
        $soapClient = null;
        $soapClient->beADoubleOf('\SoapClient');
        $soapClient->paymentInit()->willReturn($this->getSoapVerifyResponse());
        $this->paymentVerify()->shouldReturnAnInstanceOf('Webgriffe\LibUnicreditImprese\PaymentVerify\Response');
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

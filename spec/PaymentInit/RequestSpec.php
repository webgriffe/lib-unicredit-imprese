<?php

namespace spec\Webgriffe\LibUnicreditImprese\PaymentInit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese;
use Webgriffe\LibUnicreditImprese\SignatureCalculatorInterface;
use Webgriffe\LibUnicreditImprese\RequestValidatorInterface;
use Psr\Log\LoggerInterface;

class RequestSpec extends ObjectBehavior
{
    function it_is_initializable(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Request');
    }

    function it_should_init_from_array(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $requestValidator->beADoubleOf('Webgriffe\LibUnicreditImprese\PaymentInit\RequestValidator');

        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $data = $this->getValidInitArray();
        $requestValidator->validate($data)->willReturn(true);

        $this->initialize($data);
        $this->getShopId()->shouldReturn($data["shopID"]);
        $this->getShopUserRef()->shouldReturn($data["shopUserRef"]);
        $this->getShopUserName()->shouldReturn($data["shopUserName"]);
        $this->getShopUserAccount()->shouldReturn($data["shopUserAccount"]);
        $this->getTrType()->shouldReturn($data["trType"]);
        $this->getAmount()->shouldReturn($data["amount"]);
        $this->getCurrencyCode()->shouldReturn($data["currencyCode"]);
        $this->getLangId()->shouldReturn($data["langID"]);
        $this->getNotifyUrl()->shouldReturn($data["notifyURL"]);
        $this->getErrorUrl()->shouldReturn($data["errorURL"]);
        $this->getAddInfo1()->shouldReturn($data["addInfo1"]);
        $this->getAddInfo2()->shouldReturn($data["addInfo2"]);
        $this->getAddInfo3()->shouldReturn($data["addInfo3"]);
        $this->getAddInfo4()->shouldReturn($data["addInfo4"]);
        $this->getAddInfo5()->shouldReturn($data["addInfo5"]);
        $this->getDescription()->shouldReturn($data["Description"]);
        $this->isRecurrent()->shouldReturn($data["Recurrent"]);
        $this->getFreeText()->shouldReturn($data["FreeText"]);
    }

    function it_throws_an_exception_on_init_from_invalid_array(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $requestValidator->beADoubleOf('Webgriffe\LibUnicreditImprese\PaymentInit\RequestValidator');
        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $data = array();
        $requestValidator->validate($data)->willReturn(false);
        $this->shouldThrow(new \InvalidArgumentException("Could not initialize with this data!"))->duringInitialize($data);
    }

    protected function getValidInitArray()
    {
        $data = Array();
        $data["tid"] = 5;
        $data["shopID"] = "123456";
        $data["shopUserRef"] = "222";
        $data["shopUserName"] = "12345";
        $data["shopUserAccount"] = "1115";
        $data["trType"] = "";
        $data["amount"] = 50.15;
        $data["currencyCode"] = "EUR";
        $data["langID"] = "IT";
        $data["notifyURL"] = "http://www.mytest.com/success";
        $data["errorURL"] = "http://www.mytest.com/error";
        $data["addInfo1"] = "info addr line 1";
        $data["addInfo2"] = "info addr line 2";
        $data["addInfo3"] = "info addr line 3";
        $data["addInfo4"] = "info addr line 4";
        $data["addInfo5"] = "info addr line 5";
        $data["Description"] = "description description description";
        $data["Recurrent"] = false;
        $data["FreeText"] = "free text free text free text free text";
        return $data;
    }
}

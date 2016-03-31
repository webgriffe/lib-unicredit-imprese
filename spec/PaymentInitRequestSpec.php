<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese;
use Webgriffe\LibUnicreditImprese\SignatureCalculatorInterface;
use Webgriffe\LibUnicreditImprese\RequestValidatorInterface;
use Psr\Log\LoggerInterface;

class PaymentInitRequestSpec extends ObjectBehavior
{
    function it_is_initializable(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInitRequest');
    }

    function it_should_init_from_array(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $requestValidator->beADoubleOf('Webgriffe\LibUnicreditImprese\PaymentInitRequestValidator');

        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $data = $this->getValidInitArray();
        $requestValidator->validate($data)->willReturn(true);

        $this->initialize($data);
        $this->getTid()->shouldBe($data["tid"]);
        $this->getShopId()->shouldReturn($data["shopId"]);
        $this->getShopUserRef()->shouldReturn($data["shopUserRef"]);
        $this->getShopUserName()->shouldReturn($data["shopUserName"]);
        $this->getShopUserAccount()->shouldReturn($data["shopUserAccount"]);
        $this->getTrType()->shouldReturn($data["trType"]);
        $this->getAmount()->shouldReturn($data["amount"]);
        $this->getCurrencyCode()->shouldReturn($data["currencyCode"]);
        $this->getLangId()->shouldReturn($data["langId"]);
        $this->getNotifyUrl()->shouldReturn($data["notifyUrl"]);
        $this->getErrorUrl()->shouldReturn($data["errorUrl"]);
        $this->getDescription()->shouldReturn($data["description"]);
        $this->isRecurrent()->shouldReturn($data["recurrent"]);
        $this->getFreeText()->shouldReturn($data["freeText"]);
    }

    function it_throws_an_exception_on_init_from_invalid_array(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $requestValidator->beADoubleOf('Webgriffe\LibUnicreditImprese\PaymentInitRequestValidator');
        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $data = array();
        $requestValidator->validate($data)->willReturn(false);
        $this->shouldThrow(new \InvalidArgumentException("Could not initialize with this data!"))->duringInitialize($data);
    }

    protected function getValidInitArray(){
        $data = Array();
        $data["tid"] = 5;
        $data["shopId"] = "123456";
        $data["shopUserRef"] = "222";
        $data["shopUserName"] = "12345";
        $data["shopUserAccount"] = "1115";
        $data["trType"] = "";
        $data["amount"] = 50.15;
        $data["currencyCode"] = "EUR";
        $data["langId"] = "IT";
        $data["notifyUrl"] = "http://www.mytest.com/success";
        $data["errorUrl"] = "http://www.mytest.com/error";
        $data["addInfo1"] = "info addr line 1";
        $data["addInfo2"] = "info addr line 2";
        $data["addInfo3"] = "info addr line 3";
        $data["addInfo4"] = "info addr line 4";
        $data["addInfo5"] = "info addr line 5";
        $data["description"] = "description description description";
        $data["recurrent"] = false;
        $data["freeText"] = "free text free text free text free text";
        return $data;
    }
}

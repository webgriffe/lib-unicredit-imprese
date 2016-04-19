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
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Request');
    }

    function it_should_init_from_array(LoggerInterface $logger, SignatureCalculatorInterface $signatureCalculator, RequestValidatorInterface $requestValidator)
    {
        $requestValidator->beADoubleOf('Webgriffe\LibUnicreditImprese\PaymentInit\RequestValidator');

        $this->beConstructedWith($logger, $signatureCalculator, $requestValidator);
        $data = $this->getValidInitArray();
        $requestValidator->validate($data)->willReturn(true);

        $this->initialize($data);
        $this->getTid()->shouldBe($data["Tid"]);
        $this->getShopId()->shouldReturn($data["ShopId"]);
        $this->getShopUserRef()->shouldReturn($data["ShopUserRef"]);
        $this->getShopUserName()->shouldReturn($data["ShopUserName"]);
        $this->getShopUserAccount()->shouldReturn($data["ShopUserAccount"]);
        $this->getTrType()->shouldReturn($data["TrType"]);
        $this->getAmount()->shouldReturn($data["Amount"]);
        $this->getCurrencyCode()->shouldReturn($data["CurrencyCode"]);
        $this->getLangId()->shouldReturn($data["LangId"]);
        $this->getNotifyUrl()->shouldReturn($data["NotifyURL"]);
        $this->getErrorUrl()->shouldReturn($data["ErrorURL"]);
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

    protected function getValidInitArray(){
        $data = Array();
        $data["Tid"] = 5;
        $data["ShopId"] = "123456";
        $data["ShopUserRef"] = "222";
        $data["ShopUserName"] = "12345";
        $data["ShopUserAccount"] = "1115";
        $data["TrType"] = "";
        $data["Amount"] = 50.15;
        $data["CurrencyCode"] = "EUR";
        $data["LangId"] = "IT";
        $data["NotifyURL"] = "http://www.mytest.com/success";
        $data["ErrorURL"] = "http://www.mytest.com/error";
        $data["AddInfo1"] = "info addr line 1";
        $data["AddInfo2"] = "info addr line 2";
        $data["AddInfo3"] = "info addr line 3";
        $data["AddInfo4"] = "info addr line 4";
        $data["AddInfo5"] = "info addr line 5";
        $data["Description"] = "description description description";
        $data["Recurrent"] = false;
        $data["FreeText"] = "free text free text free text free text";
        return $data;
    }
}

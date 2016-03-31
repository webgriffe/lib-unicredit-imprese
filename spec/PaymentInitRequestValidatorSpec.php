<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentInitRequestValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInitRequestValidator');
    }

    function it_does_validate_valid_array()
    {
        /** @todo these tests are too generic */
        $data = $this->getValidInitArray();
        $this->validate($data)->shouldReturn(true);
    }

    function it_does_not_validate_invalid_array()
    {
        $data = $this->getInvalidInitArray();
        $this->validate($data)->shouldReturn(false);
    }

    protected function getValidInitArray()
    {
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

    protected function getInvalidInitArray()
    {
        $data = array();
        return $data;
    }
}

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

    protected function getInvalidInitArray()
    {
        $data = array();
        return $data;
    }
    protected function getValidInitArray()
    {
        $data = array();
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

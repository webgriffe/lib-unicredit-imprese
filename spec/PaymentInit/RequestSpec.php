<?php

namespace spec\Webgriffe\LibUnicreditImprese\PaymentInit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webgriffe\LibUnicreditImprese;
use Webgriffe\LibUnicreditImprese\SignatureCalculatorInterface;

class RequestSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Request');
    }

    public function it_can_generate_signature_data()
    {
        $this->setTid(1);
        $this->setShopId(2);
        $this->setShopUserRef(3);
        $this->setShopUserName(4);
        $this->setShopUserAccount(5);
        $this->setTrType(6);
        $this->setAmount(7);
        $this->setCurrencyCode(8);
        $this->setLangId(9);
        $this->setNotifyUrl(10);
        $this->setErrorUrl(11);
        $this->setAddInfo1(12);
        $this->setAddInfo2(13);
        $this->setAddInfo3(14);
        $this->setAddInfo4(15);
        $this->setAddInfo5(16);
        $this->getSignatureData()->shouldBeEqualTo("1234567008910111213141516");
    }

    public function it_can_to_array()
    {
        $this->setSignature("signature");
        $this->setTid("tid");
        $this->setShopId("shopid");
        $this->setShopUserRef("shopuserref");
        $this->setShopUserName("shopusername");
        $this->setShopUserAccount("shopuseraccount");
        $this->setTrType("trtype");
        $this->setAmount(15);
        $this->setCurrencyCode("currencycode");
        $this->setLangId("langid");
        $this->setNotifyUrl("notifyurl");
        $this->setErrorUrl("errorurl");
        $this->setAddInfo1("addrinfo1");
        $this->setAddInfo2("addrinfo2");
        $this->setAddInfo3("addrinfo3");
        $this->setAddInfo4("addrinfo4");
        $this->setAddInfo5("addrinfo5");
        $this->setDescription("description");
        $this->setRecurrent("recurrent");
        $this->setFreeText("freetext");

        $this->toArray()->shouldHaveKeyWithValue('signature', 'signature');
        $this->toArray()->shouldHaveKeyWithValue('tid', 'tid');
        $this->toArray()->shouldHaveKeyWithValue('shopID', 'shopid');
        $this->toArray()->shouldHaveKeyWithValue('shopUserRef', 'shopuserref');
        $this->toArray()->shouldHaveKeyWithValue('shopUserName', 'shopusername');
        $this->toArray()->shouldHaveKeyWithValue('shopUserAccount', 'shopuseraccount');
        $this->toArray()->shouldHaveKeyWithValue('trType', 'trtype');
        $this->toArray()->shouldHaveKeyWithValue('amount', '1500'); //Converted to number of cents
        $this->toArray()->shouldHaveKeyWithValue('currencyCode', 'currencycode');
        $this->toArray()->shouldHaveKeyWithValue('langID', 'langid');
        $this->toArray()->shouldHaveKeyWithValue('notifyURL', 'notifyurl');
        $this->toArray()->shouldHaveKeyWithValue('errorURL', 'errorurl');
        $this->toArray()->shouldHaveKeyWithValue('addInfo1', 'addrinfo1');
        $this->toArray()->shouldHaveKeyWithValue('addInfo2', 'addrinfo2');
        $this->toArray()->shouldHaveKeyWithValue('addInfo3', 'addrinfo3');
        $this->toArray()->shouldHaveKeyWithValue('addInfo4', 'addrinfo4');
        $this->toArray()->shouldHaveKeyWithValue('addInfo5', 'addrinfo5');
        $this->toArray()->shouldHaveKeyWithValue('Description', 'description');
        $this->toArray()->shouldHaveKeyWithValue('Recurrent', 'recurrent');
        $this->toArray()->shouldHaveKeyWithValue('FreeText', 'freetext');
    }

    public function it_throws_exception_on_amount_with_more_than_2_decimal_places()
    {
        $this->setAmount(2.99);
        $this->shouldThrow('RuntimeException')->duringSetAmount(2.991);
    }
}

<?php

namespace spec\Webgriffe\LibUnicreditImprese\PaymentInit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResponseSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $soapResponse = new \stdClass();
        $soapResponse->response = $this->getOkRawResponse();

        $this->beConstructedWith($soapResponse);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Response');
    }

    public function it_should_initialize_from_raw_response()
    {
        $soapResponse = new \stdClass();
        $soapResponse->response = $this->getOkRawResponse();
        $this->beConstructedWith($soapResponse);

        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Response');
        $this->getRc()->shouldBe("RC");
        $this->getError()->shouldBe(false);
        $this->getErrorDesc()->shouldBe("ERROR_DESC");
        $this->getPaymentId()->shouldBe("PAYMENT_ID");
        $this->getRedirectUrl()->shouldBe("REDIRECT_URL");
        $this->getShopId()->shouldBe("SHOPID");
    }

    public function it_should_initialize_from_raw_error_response()
    {
        $soapResponse = new \stdClass();
        $soapResponse->response = $this->getKORawResponse();
        $this->beConstructedWith($soapResponse);

        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Response');
        $this->getRc()->shouldBe("RC");
        $this->getError()->shouldBe(true);
        $this->getErrorDesc()->shouldBe("ERROR_DESC");
        $this->getShopId()->shouldBe("SHOPID");
    }

    private function getKORawResponse()
    {
        $response = new \stdClass();

        $response->rc = "RC";
        $response->error = true;
        $response->errorDesc = "ERROR_DESC";
        $response->signature = "SIGNATURE";
        $response->shopID = "SHOPID";

        return $response;
    }

    private function getOKRawResponse()
    {
        $response = new \stdClass();

        $response->rc = "RC";
        $response->error = false;
        $response->errorDesc = "ERROR_DESC";
        $response->signature = "SIGNATURE";
        $response->shopID = "SHOPID";
        $response->paymentID = "PAYMENT_ID";
        $response->redirectURL = "REDIRECT_URL";

        return $response;
    }
}

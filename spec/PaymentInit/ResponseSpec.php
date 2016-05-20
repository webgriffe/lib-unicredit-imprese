<?php

namespace spec\Webgriffe\LibUnicreditImprese\PaymentInit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $soapResponse = new \stdClass();
        $soapResponse->response = $this->getOkRawResponse();

        $this->beConstructedWith($soapResponse);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Response');
    }


    function it_should_initialize_from_raw_response()
    {
        $soapResponse = new \stdClass();
        $soapResponse->response = $this->getOkRawResponse();
        $this->beConstructedWith($soapResponse);

        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\PaymentInit\Response');
        $this->getRc()->shouldBe("RC");
        $this->getError()->shouldBe("");
        $this->getErrorDesc()->shouldBe("ERROR_DESC");
        $this->getPaymentId()->shouldBe("PAYMENT_ID");
        $this->getRedirectUrl()->shouldBe("REDIRECT_URL");
    }

    function it_should_throw_an_exception_on_ko_response()
    {
        $soapResponse = new \stdClass();
        $soapResponse->response = $this->getKORawResponse();
        $this->beConstructedWith($soapResponse);
        $this->shouldThrow(new \LogicException("Webservice error."))->duringInstantiation();
    }

    function getKORawResponse()
    {
        $response = new \stdClass();

        $response->rc = "RC";
        $response->error = "True";
        $response->errorDesc = "ERROR_DESC";
        $response->paymentId = "PAYMENT_ID";
        $response->redirectURL = "REDIRECT_URL";
        return $response;
    }

    function getOKRawResponse()
    {
        $response = new \stdClass();

        $response->rc = "RC";
        $response->error = "";
        $response->errorDesc = "ERROR_DESC";
        $response->paymentId = "PAYMENT_ID";
        $response->redirectURL = "REDIRECT_URL";
        return $response;
    }

}

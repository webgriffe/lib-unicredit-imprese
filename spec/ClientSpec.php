<?php

namespace spec\Webgriffe\LibUnicreditImprese;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Log\LoggerInterface;
use spec\Webgriffe\LibUnicreditImprese;
use Webgriffe\LibUnicreditImprese\PaymentInit\Response as PaymentInitResponse;
use Webgriffe\LibUnicreditImprese\SoapClient\WrapperInterface;
use Webgriffe\LibUnicreditImprese\PaymentVerify\Response as PaymentVerifyResponse;

class ClientSpec extends ObjectBehavior
{
    public function it_is_initializable(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->shouldHaveType('Webgriffe\LibUnicreditImprese\Client');
    }

    public function it_should_throw_exceptions_if_key_missing(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->shouldThrow(new \Exception("Missing signature key"))->duringInit(true, '', '', '');
    }

    public function it_should_throw_exceptions_if_tid_missing(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->shouldThrow(new \Exception("Missing terminal id"))->duringInit(true, 'key', '', '');
    }

    public function it_should_throw_exceptions_if_wsdl_missing(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
        $this->shouldThrow(new \Exception("Missing WSDL URL"))->duringInit(true, 'key', 'tid', '');
    }

    public function it_should_throw_error_if_not_initialized_before_payment_init(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);

        $this->shouldThrow(new \LogicException('Please initialize the client before trying to perform paymentInit operations'))
            ->duringPaymentInit(
                'PURCHASE',
                10.0,
                'IT',
                'http://notify.com',
                'http://error.com'
            );
    }

    public function it_should_throw_error_if_not_initialized_before_payment_verify(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);

        $this->shouldThrow(new \LogicException('Please initialize the client before trying to perform verify operations'))
            ->duringPaymentVerify('shopid', 'paymentid');
    }

    public function it_should_report_error_on_missing_mandatory_argument_during_payment_init(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->shouldThrow(new \InvalidArgumentException('Cannot invoke webservice, some mandatory field is missing'))
            ->duringPaymentInit('', '', '', '', '');
    }

    public function it_should_report_error_on_null_mandatory_argument_during_payment_init(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->shouldThrow(new \InvalidArgumentException('Cannot invoke webservice, some mandatory field is missing'))
            ->duringPaymentInit(null, null, null, null, null);
    }

    public function it_should_report_error_unsupported_operation_during_payment_init(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->shouldThrow(new \InvalidArgumentException('Unsupported operation specified OTHER.'))
            ->duringPaymentInit(
                'OTHER',
                10.0,
                'IT',
                'http://notify.com',
                'http://error.com',
                'EUR'
            );
    }

    public function it_should_report_error_unsupported_currency_during_payment_init(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->shouldThrow(new \InvalidArgumentException('Unsupported currency specified ZWL.'))
            ->duringPaymentInit(
                'PURCHASE',
                10.0,
                'IT',
                'http://notify.com',
                'http://error.com',
                'ZWL'
            );
    }

    public function it_should_report_error_unsupported_language_during_payment_init(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->shouldThrow(new \InvalidArgumentException('Unsupported language specified MY.'))
            ->duringPaymentInit(
                'PURCHASE',
                10.0,
                'MY',
                'http://notify.com',
                'http://error.com',
                'EUR'
            );
    }

    public function it_should_return_payment_init_response_on_payment_init(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);
        $soapClientWrapper->init(Argument::any())->willReturn($this->getSoapInitResponse());

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->paymentInit(
            'PURCHASE',
            10.0,
            'IT',
            'http://notify.com',
            'http://error.com'
        )->shouldReturnAnInstanceOf(PaymentInitResponse::class);
    }

    public function it_should_throw_exception_on_missing_arguments_during_payment_verify(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->shouldThrow(new \InvalidArgumentException('Cannot invoke webservice, some mandatory field is missing'))
            ->duringPaymentVerify('', '');
    }

    public function it_should_return_payment_verify_response_on_payment_verify(LoggerInterface $logger, $soapClientWrapper)
    {
        $this->beConstructedWith($logger);

        $soapClientWrapper->beADoubleOf(WrapperInterface::class);
        $soapClientWrapper->initialize('wsdl', Argument::any())->willReturn(null);
        $soapClientWrapper->isInitialized()->willReturn(true);
        $soapClientWrapper->verify(Argument::any())->willReturn($this->getSoapVerifyResponse());

        $this->setSoapClientWrapper($soapClientWrapper);

        $this->init(true, 'key', 'tid', 'wsdl');

        $this->paymentVerify('shopid', 'paymentid')->shouldReturnAnInstanceOf(PaymentVerifyResponse::class);
    }
    
    private function getSoapInitResponse()
    {
        $response = new \stdClass();
        $response->error = false;
        $response->rc = "tutto bene";
        $response->errorDesc = "error desc";
        $response->paymentID = "9854";
        $response->redirectURL = "http://www.sito.com/paga/";
        $response->signature = 'signature';
        $response->shopID = 'shopid';

        $result = new \stdClass();
        $result->response = $response;
        return $result;
    }

    private function getSoapVerifyResponse()
    {
        $response = new \stdClass();

        $response->tid = "";
        $response->rc = "";
        $response->error = "";
        $response->errorDesc = "";
        $response->signature = "";
        $response->shopID = "";
        $response->paymentID = "";

        $response->tranID = "";
        $response->authCode = "";
        $response->enrStatus = "";
        $response->authStatus = "";
        $response->brand = "";

        $result = new \stdClass();
        $result->response = $response;
        return $result;
    }
}

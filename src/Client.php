<?php

namespace Webgriffe\LibUnicreditImprese;

class Client
{
    protected $wsdlUrl;
    protected $soapOptions;

    protected $kSig;
    protected $tId;
    protected $soapClient;

    public function __construct(array $config, array $soapConfig = array())
    {
        $this->wsdlUrl = $config["wsdlUrl"];
        $this->tId = $config["tId"];
        $this->kSig = $config["kSig"];
    }

    public function paymentInit($paymentData)
    {
        $paymentInitRequest = new PaymentInitRequest();
        $paymentInitRequest->setkSig($this->kSig);
        $paymentInitRequest->setTid($this->tId);
        $paymentInitRequest->initialize($paymentData);
        $paymentInitRequest->getSignature($this->kSig);

        $client = new \SoapClient($this->wsdlUrl, $this->soapOptions);
        $response = new \PaymentInitResponse();

        $response->fromArray($client->init($paymentInitRequest->toArray()));

        $client->dispose();
        return $response;
    }

    public function verify($paymentData)
    {
        $paymentVerifyRequest = new PaymentVerifyRequest();
        $paymentVerifyRequest->setTid($this->tId);
        $paymentVerifyRequest->setShopId($paymentData["ShopId"]);
        $paymentVerifyRequest->setPaymentId($paymentData["PaymentId"]);
        $paymentVerifyRequest->getSignature($this->kSig);

        $client = new \SoapClient($this->wsdlUrl, $this->soapOptions);
        $response = $client->verify((array)$paymentVerifyRequest);
        $client->dispose();
        return $response;
    }
}

<?php

namespace Webgriffe\LibUnicreditImprese;

class Client
{
    protected $wsdlUrl;
    protected $soapOptions;

    protected $kSig;
    protected $tId;
    protected $soapClient;

    public function  __construct( $mode, array $config, array $soapConfig )
    {
        $this->wsdlUrl = $config["wsdlUrl"];
        $this->tId = $config["tId"];
        $this->kSig = $config["kSig"];
    }

    public function PaymentInit($paymentData)
    {
        $paymentInitRequest = new PaymentInitRequest();
        $paymentInitRequest->setkSig($this->kSig);
        $paymentInitRequest->setTid($this->tId);
        $paymentInitRequest->initialize($paymentData);
        $paymentInitRequest->getSignature($this->kSig);

        /** @todo frse è meglio inizializzare il soap client nel cosnstruct. $client */
        $client = new \SoapClient($this->wsdlUrl, $this->soapOptions);
        /** @todo usato un semplice cast ad array, forse servirà una funzione di mapping. */
        $response = $client->init((array)$paymentInitRequest);
        $client->dispose();
        return $response;
    }

    public function Verify($paymentData)
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

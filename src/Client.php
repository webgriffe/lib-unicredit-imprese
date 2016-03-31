<?php

namespace Webgriffe\LibUnicreditImprese;

class Client
{
    protected $wsdlUrl;
    protected $soapOptions;

    protected $kSig;
    protected $tId;

    /**
     * @return mixed
     */
    public function getKSig()
    {
        return $this->kSig;
    }

    /**
     * @param mixed $kSig
     */
    public function setKSig($kSig)
    {
        $this->kSig = $kSig;
    }

    /**
     * @return mixed
     */
    public function getTId()
    {
        return $this->tId;
    }

    /**
     * @param mixed $tId
     */
    public function setTId($tId)
    {
        $this->tId = $tId;
    }
    protected $soapClient;

    public function __construct(\SoapClient $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    protected function canExecute()
    {
        return isset($this->tId) && isset($this->kSig);
    }

    public function paymentInit(PaymentInitRequest $request)
    {
        if(!$this->canExecute())
            throw new \Exception("Please set tid and ksig before this call.");

        $request->setTid($this->tId);
        $request->getSignature($this->kSig);

        $response = new \PaymentInitResponse();
        $response->fromArray($this->soapClient->init($request->toArray()));
        return $response;
    }

    public function verify(PaymentVerifyRequest $request)
    {
        if(!$this->canExecute())
            throw new \Exception("Please set tid and ksig before this call.");

        $request->setTid($this->tId);
        $request->getSignature($this->kSig);

        $response = new \PaymentVerifyResponse();
        $response->fromArray($this->client->verify($request->toArray()));
        return $response;
    }
}

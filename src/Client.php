<?php

namespace Webgriffe\LibUnicreditImprese;

class Client
{
    protected $wsdlUrl;
    protected $soapOptions;
    protected $soapClient;
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

    /**
     * @param \SoapClient $soapClient
     */
    public function __construct(\SoapClient $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    /**
     * @return bool
     */
    protected function canExecute()
    {
        return isset($this->tId) && isset($this->kSig);
    }

    /**
     * @param PaymentInitRequest $request
     * @return \PaymentInitResponse
     * @throws \Exception
     */
    public function paymentInit(PaymentInitRequest $request)
    {
        if (!$this->canExecute()) {
            throw new \Exception("Please set tid and ksig before this call.");
        }

        $request->setTid($this->tId);
        $request->sign($this->kSig);

        $response = new \PaymentInitResponse();
        $response->fromArray($this->soapClient->init($request->toArray()));
        return $response;
    }

    /**
     * @param PaymentVerifyRequest $request
     * @return \PaymentVerifyResponse
     * @throws \Exception
     */
    public function paymentVerify(PaymentVerifyRequest $request)
    {
        if (!$this->canExecute()) {
            throw new \Exception("Please set tid and ksig before this call.");
        }

        $request->setTid($this->tId);
        $request->sign($this->kSig);

        $response = new \PaymentVerifyResponse();
        $response->fromArray($this->client->verify($request->toArray()));
        return $response;
    }
}

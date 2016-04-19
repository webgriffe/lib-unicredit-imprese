<?php

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;

use Webgriffe\LibUnicreditImprese\PaymentInit\Request as InitRequest;
use Webgriffe\LibUnicreditImprese\PaymentInit\Response as InitResponse;

use Webgriffe\LibUnicreditImprese\PaymentVerify\Request as VerifyRequest;
use Webgriffe\LibUnicreditImprese\PaymentVerify\Response as VerifyResponse;

class Client
{
    const TRANSACTION_TYPE_AUTH = 'AUTH';
    const TRANSACTION_TYPE_PURCHASE = 'AUTH';
    protected $logger;
    protected $kSig;
    protected $tid;
    protected $soapClient;

    /**
     * Client constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

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
    public function getTid()
    {
        return $this->tid;
    }
    
    /**
     * @param mixed $tid
     */
    public function setTid($tid)
    {
        $this->tId = $tid;
    }

    public function init(
        $kSig,
        $tid,
        $wsdl,
        $soapOptions = array(
            'compression' => SOAP_COMPRESSION_ACCEPT,
            'soap_version' => SOAP_1_1,
        )
    ) {
        $this->kSig = $kSig;
        $this->tid = $tid;
        $this->soapClient = $this->getClient($wsdl, $soapOptions);
    }

    protected function getClient($wsdl, $soapOptions)
    {
        return new \SoapClient($wsdl, $soapOptions);
    }

    /**
     * @param InitRequest $request
     * @return InitResponse
     * @throws \Exception
     */
    public function paymentInit(InitRequest $request)
    {
        if (!$this->canExecute()) {
            throw new \Exception("Please set tid and ksig before this call.");
        }
        $request->setTid($this->tid);
        $request->sign($this->kSig);

        $response = new InitResponse($this->logger);
        $response->fromArray($this->soapClient->init(array('request' => ($request->toArray()))));
        return $response;
    }

    /**
     * @return bool
     */
    protected function canExecute()
    {
        return isset($this->tid) && isset($this->kSig);
    }

    /**
     * @param VerifyRequest $request
     * @return VerifyResponse
     * @throws \Exception
     */
    public function paymentVerify(VerifyRequest $request)
    {
        if (!$this->canExecute()) {
            throw new \Exception("Please set tid and ksig before this call.");
        }

        $request->setTid($this->tid);
        $request->sign($this->kSig);

        $response = new VerifyResponse($this->logger);
        $response->fromArray($this->soapClient->verify($request->toArray()));
        return $response;
    }
}

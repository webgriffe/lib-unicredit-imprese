<?php

namespace Webgriffe\LibUnicreditImprese\PaymentInit;

use Webgriffe\LibUnicreditImprese\PaymentResponse;

class Response extends PaymentResponse
{
    protected $tid;
    protected $error;
    protected $rc;
    protected $errorDesc;
    protected $paymentId;
    protected $redirectUrl;
    protected $signature;

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
    
    /**
     * @return bool
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed bool
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getRc()
    {
        return $this->rc;
    }

    /**
     * @param mixed $rc
     */
    public function setRc($rc)
    {
        $this->rc = $rc;
    }

    /**
     * @return mixed
     */
    public function getErrorDesc()
    {
        return $this->errorDesc;
    }

    /**
     * @param mixed $errorDesc
     */
    public function setErrorDesc($errorDesc)
    {
        $this->errorDesc = $errorDesc;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param mixed $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param mixed $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @inheritdoc
     */
    protected function initFromRawSoapResponse(\stdClass $soapResponse)
    {
        $data = $soapResponse->response;

        $this->rc = $data->rc;
        $this->error = $data->error;
        $this->errorDesc = $data->errorDesc;
        $this->signature = $data->signature;
        $this->shopId = $data->shopID;
        $this->paymentId = $data->paymentID;
        $this->redirectUrl = $data->redirectURL;
    }
}

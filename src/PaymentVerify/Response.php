<?php

namespace Webgriffe\LibUnicreditImprese\PaymentVerify;

use Webgriffe\LibUnicreditImprese\PaymentResponse;

class Response extends PaymentResponse
{
    protected $tid;
    protected $rc;
    protected $error;
    protected $errorDesc;
    protected $signature;
    protected $shopId;
    protected $paymentId;
    protected $tranId;
    protected $authCode;
    protected $enrStatus;
    protected $authStatus;
    protected $brand;

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
     * @return mixed
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param mixed $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
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
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
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
    public function getTranId()
    {
        return $this->tranId;
    }

    /**
     * @param mixed $tranId
     */
    public function setTranId($tranId)
    {
        $this->tranId = $tranId;
    }

    /**
     * @return mixed
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param mixed $authCode
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    }

    /**
     * @return mixed
     */
    public function getEnrStatus()
    {
        return $this->enrStatus;
    }

    /**
     * @param mixed $enrStatus
     */
    public function setEnrStatus($enrStatus)
    {
        $this->enrStatus = $enrStatus;
    }

    /**
     * @return mixed
     */
    public function getAuthStatus()
    {
        return $this->authStatus;
    }

    /**
     * @param mixed $authStatus
     */
    public function setAuthStatus($authStatus)
    {
        $this->authStatus = $authStatus;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @inheritdoc
     */
    protected function initFromRawSoapResponse(\stdClass $soapResponse)
    {
        $data = $soapResponse->response;

        $this->tid = $data->tid;
        $this->rc = $data->rc;
        $this->error = $data->error;
        $this->errorDesc = $data->errorDesc;
        $this->signature = $data->signature;
        $this->shopId = $data->shopID;
        $this->paymentId = $data->paymentID;
        if (!$this->error) {
            $this->tranId = $data->tranID;
            $this->authCode = $data->authCode;
            $this->enrStatus = isset($data->enrStatus) ? $data->enrStatus : 'N';
            $this->authStatus = isset($data->authStatus) ? $data->authStatus : 'N';
            $this->brand = $data->brand;
        }
    }
}

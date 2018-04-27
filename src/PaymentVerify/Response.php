<?php

namespace Webgriffe\LibUnicreditImprese\PaymentVerify;

use Webgriffe\LibUnicreditImprese\PaymentResponse;

class Response extends PaymentResponse
{
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
    protected $status;      //For Mybank
    protected $payInstr;    //For Mybank

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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPayInstr()
    {
        return $this->payInstr;
    }

    /**
     * @param mixed $payInstr
     */
    public function setPayInstr($payInstr)
    {
        $this->payInstr = $payInstr;
    }

    /**
     * @inheritdoc
     */
    protected function initFromRawSoapResponse(\stdClass $soapResponse)
    {
        $data = $soapResponse->response;

        //Even though the documentation mentions an initial uppercase letter in the field names, these seem to come
        //with a lowercase first letter...
        $this->rc = $data->rc;
        $this->error = $data->error;
        $this->errorDesc = $data->errorDesc;
        $this->signature = $data->signature;
        $this->shopId = $data->shopID;
        $this->paymentId = $data->paymentID;

        if (!$this->error) {
            //These should always be there
            $this->tranId = $data->tranID;
            $this->authCode = $data->authCode;

            //These are for non-Mybank transactions
            $this->enrStatus = isset($data->enrStatus) ? $data->enrStatus : 'N';
            $this->authStatus = isset($data->authStatus) ? $data->authStatus : 'N';
            $this->brand = isset($data->brand) ? $data->brand : null;

            //These are for Mybank transactions
            $this->payInstr = isset($data->payInstr) ? $data->payInstr : null;
            $this->status = isset($data->status) ? $data->status : null;
        }
    }
}

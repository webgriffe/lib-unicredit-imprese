<?php

namespace Webgriffe\LibUnicreditImprese\PaymentVerify;

use Webgriffe\LibUnicreditImprese\PaymentResponse;

class Response extends PaymentResponse
{
    protected $rc;
    protected $error;
    protected $errorDesc;
    protected $tranId;
    protected $authCode;
    protected $enrStatus;
    protected $authStatus;
    protected $brand;

    protected $maskedPan;
    protected $payInstrToken;
    protected $expireMonth;
    protected $expireYear;
    protected $status;
    protected $payInstr;
    protected $shopId;
    protected $paymentId;

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
    public function getMaskedPan()
    {
        return $this->maskedPan;
    }

    /**
     * @param mixed $maskedPan
     */
    public function setMaskedPan($maskedPan)
    {
        $this->maskedPan = $maskedPan;
    }

    /**
     * @return mixed
     */
    public function getPayInstrToken()
    {
        return $this->payInstrToken;
    }

    /**
     * @param mixed $payInstrToken
     */
    public function setPayInstrToken($payInstrToken)
    {
        $this->payInstrToken = $payInstrToken;
    }

    /**
     * @return mixed
     */
    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    /**
     * @param mixed $expireMonth
     */
    public function setExpireMonth($expireMonth)
    {
        $this->expireMonth = $expireMonth;
    }

    /**
     * @return mixed
     */
    public function getExpireYear()
    {
        return $this->expireYear;
    }

    /**
     * @param mixed $expireYear
     */
    public function setExpireYear($expireYear)
    {
        $this->expireYear = $expireYear;
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
        $this->payInstr = $data->payInstr;
        $this->rc = $data->rc;
        $this->error = $data->error;
        $this->errorDesc = $data->errorDesc;
        $this->shopId = $data->shopID;
        $this->tranId = $data->tranID;
        $this->paymentId = $data->paymentID;
        $this->authCode = $data->authCode;
        $this->enrStatus = $data->enrStatus;
        $this->authStatus = $data->authStatus;
        $this->brand = $data->brand;
        $this->maskedPan = $data->maskedPan;
        $this->payInstrToken = $data->payInstrToken;
        $this->expireMonth = $data->expireMonth;
        $this->expireYear = $data->expireYear;
        $this->status = $data->status;
    }
}

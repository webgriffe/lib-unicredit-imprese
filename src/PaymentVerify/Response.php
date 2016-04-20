<?php

namespace Webgriffe\LibUnicreditImprese\PaymentVerify;

use Webgriffe\LibUnicreditImprese\PaymentResponse;

class Response extends PaymentResponse
{
    protected $error;
    protected $rc;
    protected $errorDesc;

    /**
     * @return boolean
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param boolean $error
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
    protected $tranId;
    protected $authCode;
    protected $enrStatus;
    protected $authStatus;
    protected $brand;

    /**
     * @inheritdoc
     */
    protected function initFromRawSoapResponse(\stdClass $data)
    {
        //@todo fix it
        $this->error = $data["Error"];
        $this->rc = $data["Rc"];
        $this->errorDesc = $data["ErrorDesc"];
        $this->tranId = $data["TranId"];
        $this->authCode = $data["AuthCode"];
        $this->enrStatus = $data["ErnStatus"];
        $this->authStatus = $data["AuthStatus"];
        $this->brand = $data["Brand"];
    }
}

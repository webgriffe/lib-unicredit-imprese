<?php

namespace Webgriffe\LibUnicreditImprese;

class PaymentInitResponse
{
    protected $error;
    protected $rc;
    protected $errorDesc;
    protected $paymentId;
    protected $redirectUrl;
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


    public function fromArray($data)
    {
        $this->error = $data["Error"];
        $this->rc = $data["Rc"];
        $this->errorDesc = $data["ErrorDesc"];
        $this->paymentId = $data["PaymentId"];
        $this->redirectUrl = $data["RedirectURL"];
    }
}

<?php

namespace Webgriffe\LibUnicreditImprese\PaymentVerify;

use Psr\Log\LoggerInterface;
use Webgriffe\LibUnicreditImprese\PaymentRequest;

class Request extends PaymentRequest
{
    /**
     * @var string
     */
    protected $tid;
    /**
     * @var string
     */
    protected $shopId;
    /**
     * @var string
     */
    protected $paymentId;
    /**
     * @var string
     */
    protected $signature;

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
        $this->tid = $tid;
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

    public function reset()
    {
        $this->tid =
        $this->shopId =
        $this->paymentId =
        $this->signature = null;
    }

    public function getSignatureData()
    {
        return $this->tid . $this->shopId . $this->paymentId;
    }
}

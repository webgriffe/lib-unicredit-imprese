<?php

namespace Webgriffe\LibUnicreditImprese\PaymentInit;

use Webgriffe\LibUnicreditImprese\PaymentRequest;
use Webgriffe\LibUnicreditImprese\SignableInterface;

class Request implements SignableInterface
{
    /**
     * @var string
     */
    protected $trType;

    /**
     * @var string
     */
    protected $signature;

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
    protected $shopUserRef;

    /**
     * @var string
     */
    protected $shopUserName;

    /**
     * @var string
     */
    protected $shopUserAccount;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     * EUR/USD
     */
    protected $currencyCode;

    /**
     * @var string
     * IT/EN
     */
    protected $langId;

    /**
     * @var string
     */
    protected $notifyUrl;

    /**
     * @var string
     */
    protected $errorUrl;

    /**
     * @var string
     */
    protected $addInfo1;

    /**
     * @var string
     */
    protected $addInfo2;

    /**
     * @var string
     */
    protected $addInfo3;

    /**
     * @var string
     */
    protected $addInfo4;

    /**
     * @var string
     */
    protected $addInfo5;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var boolean
     */
    protected $recurrent;

    /**
     * @var string
     */
    protected $freeText;

    /**
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @param string $tid
     */
    public function setTid($tid)
    {
        $this->tid = $tid;
    }

    /**
     * @return string
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param string $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * @return string
     */
    public function getShopUserRef()
    {
        return $this->shopUserRef;
    }

    /**
     * @param string $shopUserRef
     */
    public function setShopUserRef($shopUserRef)
    {
        $this->shopUserRef = $shopUserRef;
    }

    /**
     * @return string
     */
    public function getShopUserName()
    {
        return $this->shopUserName;
    }

    /**
     * @param string $shopUserName
     */
    public function setShopUserName($shopUserName)
    {
        $this->shopUserName = $shopUserName;
    }

    /**
     * @return string
     */
    public function getShopUserAccount()
    {
        return $this->shopUserAccount;
    }

    /**
     * @param string $shopUserAccount
     */
    public function setShopUserAccount($shopUserAccount)
    {
        $this->shopUserAccount = $shopUserAccount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return string
     */
    public function getLangId()
    {
        return $this->langId;
    }

    /**
     * @param string $langId
     */
    public function setLangId($langId)
    {
        $this->langId = $langId;
    }

    /**
     * @return string
     */
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    /**
     * @param string $notifyUrl
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    /**
     * @return string
     */
    public function getErrorUrl()
    {
        return $this->errorUrl;
    }

    /**
     * @param string $errorUrl
     */
    public function setErrorUrl($errorUrl)
    {
        $this->errorUrl = $errorUrl;
    }

    /**
     * @return string
     */
    public function getAddInfo1()
    {
        return $this->addInfo1;
    }

    /**
     * @param string $addInfo1
     */
    public function setAddInfo1($addInfo1)
    {
        $this->addInfo1 = $addInfo1;
    }

    /**
     * @return string
     */
    public function getAddInfo2()
    {
        return $this->addInfo2;
    }

    /**
     * @param string $addInfo2
     */
    public function setAddInfo2($addInfo2)
    {
        $this->addInfo2 = $addInfo2;
    }

    /**
     * @return string
     */
    public function getAddInfo3()
    {
        return $this->addInfo3;
    }

    /**
     * @param string $addInfo3
     */
    public function setAddInfo3($addInfo3)
    {
        $this->addInfo3 = $addInfo3;
    }

    /**
     * @return string
     */
    public function getAddInfo4()
    {
        return $this->addInfo4;
    }

    /**
     * @param string $addInfo4
     */
    public function setAddInfo4($addInfo4)
    {
        $this->addInfo4 = $addInfo4;
    }

    /**
     * @return string
     */
    public function getAddInfo5()
    {
        return $this->addInfo5;
    }

    /**
     * @param string $addInfo5
     */
    public function setAddInfo5($addInfo5)
    {
        $this->addInfo5 = $addInfo5;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return boolean
     */
    public function isRecurrent()
    {
        return $this->recurrent;
    }

    /**
     * @param boolean $recurrent
     */
    public function setRecurrent($recurrent)
    {
        $this->recurrent = $recurrent;
    }

    /**
     * @return string
     */
    public function getFreeText()
    {
        return $this->freeText;
    }

    /**
     * @param string $freeText
     */
    public function setFreeText($freeText)
    {
        $this->freeText = $freeText;
    }

    /**
     * @return string
     */
    public function getTrType()
    {
        return $this->trType;
    }

    /**
     * @param string $trType
     */
    public function setTrType($trType)
    {
        $this->trType = $trType;
    }

    /**
     * @param $signature
     * @return void
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
    /**
     * @return string
     */
    public function getSignatureData()
    {
        $data = $this->tid;
        $data .= $this->shopId;
        $data .= $this->shopUserRef;
        $data .= $this->shopUserName;
        $data .= $this->shopUserAccount;
        $data .= $this->trType;
        $data .= $this->amount;
        $data .= $this->currencyCode;
        $data .= $this->langId;
        $data .= $this->notifyUrl;
        $data .= $this->errorUrl;
        $data .= $this->addInfo1;
        $data .= $this->addInfo2;
        $data .= $this->addInfo3;
        $data .= $this->addInfo4;
        $data .= $this->addInfo5;
        return $data;
    }

    public function toArray()
    {
        $data = array(
            'signature'       => $this->signature,
            'tid'             => $this->tid,
            'shopID'          => $this->shopId,
            'shopUserRef'     => $this->shopUserRef,
            'shopUserName'    => $this->shopUserName,
            'shopUserAccount' => $this->shopUserAccount,
            'trType'          => $this->trType,
            'amount'          => (string)$this->amount,
            'currencyCode'    => $this->currencyCode,
            'langID'          => $this->langId,
            'notifyURL'       => $this->notifyUrl,
            'errorURL'        => $this->errorUrl,
            'addInfo1'        => $this->addInfo1,
            'addInfo2'        => $this->addInfo2,
            'addInfo3'        => $this->addInfo3,
            'addInfo4'        => $this->addInfo4,
            'addInfo5'        => $this->addInfo5,
            'Description'     => $this->description,
            'Recurrent'       => $this->recurrent,
            'FreeText'        => $this->freeText,
        );
        return $data;
    }
}

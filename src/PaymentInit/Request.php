<?php

namespace Webgriffe\LibUnicreditImprese\PaymentInit;

use Psr\Log\LoggerInterface;
use Webgriffe\LibUnicreditImprese\PaymentRequest;

class Request extends PaymentRequest
{
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
     * @var string
     */
    protected $trType;

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

    /**
     * @Array $data
     */
    public function fromArray($data)
    {
        $this->shopId = $data["shopID"];
        $this->shopUserRef = $data["shopUserRef"];
        $this->shopUserName = $data["shopUserName"];
        $this->shopUserAccount = $data["shopUserAccount"];
        $this->trType = $data["trType"];
        $this->amount = $data["amount"];
        $this->currencyCode = $data["currencyCode"];
        $this->langId = $data["langID"];
        $this->notifyUrl = $data["notifyURL"];
        $this->errorUrl = $data["errorURL"];
        $this->addInfo1 = $data["addInfo1"];
        $this->addInfo2 = $data["addInfo2"];
        $this->addInfo3 = $data["addInfo3"];
        $this->addInfo4 = $data["addInfo4"];
        $this->addInfo5 = $data["addInfo5"];
        $this->description = $data["Description"];
        $this->recurrent = $data["Recurrent"];
        $this->freeText = $data["FreeText"];
    }

    public function toArray()
    {
        return array(
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
    }

    public function reset()
    {
        $this->tid =
        $this->shopId =
        $this->shopUserRef =
        $this->shopUserName =
        $this->shopUserAccount =
        $this->trType =
        $this->amount =
        $this->currencyCode =
        $this->langId =
        $this->notifyUrl =
        $this->errorUrl =
        $this->addInfo1 =
        $this->addInfo2 =
        $this->addInfo3 =
        $this->addInfo4 =
        $this->addInfo5 =
        $this->description =
        $this->recurrent =
        $this->freeText =
        $this->signature =
            null;
    }
}

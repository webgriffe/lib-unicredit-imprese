<?php

namespace Webgriffe\LibUnicreditImprese;

class PaymentInitRequest extends PaymentRequest
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
    protected function fromArray($data)
    {
        $this->tid = $data["Tid"];
        $this->shopId = $data["ShopId"];
        $this->shopUserRef = $data["ShopUserRef"];
        $this->shopUserName = $data["ShopUserName"];
        $this->shopUserAccount = $data["ShopUserAccount"];
        $this->trType = $data["TrType"];
        $this->amount = $data["Amount"];
        $this->currencyCode = $data["CurrencyCode"];
        $this->langId = $data["LangId"];
        $this->notifyUrl = $data["NotifyURL"];
        $this->errorUrl = $data["ErrorURL"];
        $this->addInfo1 = $data["AddInfo1"];
        $this->addInfo2 = $data["AddInfo2"];
        $this->addInfo3 = $data["AddInfo3"];
        $this->addInfo4 = $data["AddInfo4"];
        $this->addInfo5 = $data["AddInfo5"];
        $this->description = $data["Description"];
        $this->recurrent = $data["Recurrent"];
        $this->freeText = $data["FreeText"];
    }

    public function toArray()
    {
        $data["Tid"] = $this->tid;
        $data["ShopId"] = $this->shopId;
        $data["ShopUserRef"] = $this->shopUserRef;
        $data["ShopUserName"] = $this->shopUserName;
        $data["ShopUserAccount"] = $this->shopUserAccount;
        $data["TrType"] = $this->trType;
        $data["Amount"] = $this->amount;
        $data["CurrencyCode"] = $this->currencyCode;
        $data["LangId"] = $this->langId;
        $data["NotifyURL"] = $this->notifyUrl;
        $data["ErrorURL"] = $this->errorUrl;
        $data["AddInfo1"] = $this->addInfo1;
        $data["AddInfo2"] = $this->addInfo2;
        $data["AddInfo3"] = $this->addInfo3;
        $data["AddInfo4"] = $this->addInfo4;
        $data["AddInfo5"] = $this->addInfo5;
        $data["Description"] = $this->description;
        $data["Recurrent"] = $this->recurrent;
        $data["FreeText"] = $this->freeText;
        return $data;
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

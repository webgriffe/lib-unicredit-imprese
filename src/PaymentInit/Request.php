<?php

namespace Webgriffe\LibUnicreditImprese\PaymentInit;

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
     * @var integer
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
     * @var string
     */
    protected $paymentReason;

    /**
     * @var string
     */
    protected $freeText;

    /**
     * @var string
     */
    protected $validityExpire;

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
        return $this->amount / 100;
    }

    /**
     * Convert to "number of cents" representation. Beware of possible rounding errors.
     *
     * @param float $amount
     */
    public function setAmount($amount)
    {
        //@todo: Maybe thos should become a "dumb" setter and this code should be in the client?
        $centsAmount = $amount * 100;
        $newAmount = round($centsAmount);
        //Make sure that the supplied amount contains no more than 2 decimal places
        if (abs($newAmount - $centsAmount) > 0.0000000001) {
            throw new \RuntimeException(
                sprintf(
                    'Unicredit PagOnline Imprese only accepts amounts with up to 2 decimal places. %s given',
                    $amount
                )
            );
        }
        $this->amount = $newAmount;
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
     * @return string
     */
    public function getPaymentReason()
    {
        return $this->paymentReason;
    }

    /**
     * @param string $paymentReason
     */
    public function setPaymentReason($paymentReason)
    {
        $this->paymentReason = $paymentReason;
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
    public function getValidityExpire()
    {
        return $this->validityExpire;
    }

    /**
     * @param string $validityExpire
     */
    public function setValidityExpire($validityExpire)
    {
        $this->validityExpire = $validityExpire;
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
        $data .= $this->description;
        $data .= $this->paymentReason;
        $data .= $this->freeText;
        $data .= $this->validityExpire;

        return $data;
    }

    public function toArray()
    {
        //Even though the documentation mentions an initial uppercase letter in the field names, these seem to work
        //with a lowercase first letter...
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
            'description'     => $this->description,
            'paymentReason'   => $this->paymentReason,
            'freeText'        => $this->freeText,
            'validityExpire'  => $this->validityExpire,
        );
    }
}

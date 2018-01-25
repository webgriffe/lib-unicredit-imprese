<?php

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;

use Webgriffe\LibUnicreditImprese\PaymentInit\Request as InitRequest;
use Webgriffe\LibUnicreditImprese\PaymentInit\Response as InitResponse;

use Webgriffe\LibUnicreditImprese\PaymentVerify\Request as VerifyRequest;
use Webgriffe\LibUnicreditImprese\PaymentVerify\Response as VerifyResponse;

/**
 * Class Client
 * @package Webgriffe\LibUnicreditImprese
 */
class Client
{
    const TRANSACTION_TYPE_AUTH = 'AUTH';
    const TRANSACTION_TYPE_PURCHASE = 'PURCHASE';
    const CURRENCY_CODE_EUR = 'EUR';
    const CURRENCY_CODE_USD = 'USD';
    const TRANSACTION_IN_PROGRESS_RETURN_CODE = 'IGFS_814';
    const LANGUAGE_ITA = 'IT';
    const LANGUAGE_ENG = 'EN';
    
    protected $logger;
    protected $kSig;

    /**
     * @var string
     */
    protected $tid;

    /**
     * @var null|\SoapClient
     */
    protected $soapClient = null;

    /**
     * @var string
     */
    protected $tId;

    /**
     * Client constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * @return mixed
     */
    public function getKSig()
    {
        return $this->kSig;
    }

    /**
     * @param mixed $kSig
     */
    public function setKSig($kSig)
    {
        $this->kSig = $kSig;
    }

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
        $this->tId = $tid;
    }

    public function init($isTestMode, $kSig, $tid, $wsdl)
    {
        $this->kSig = $kSig;
        $this->tid = $tid;
        $soapOptions = array(
            'compression' => SOAP_COMPRESSION_ACCEPT,
            'soap_version' => SOAP_1_1,
        );
        if (!extension_loaded('soap')) {
            if ($this->logger) {
                $this->logger->critical(
                    'Unable to create the webserver client.'.PHP_EOL.
                    'The PHP_SOAP extension is required to use this library.'
                );
            }
            throw new \RuntimeException('PHP SOAP extension is required.');
        }

        if ($isTestMode) {
            //Allow self-signed certificates in test mode
            $contextOptions = array(
                'ssl' => array(
                    'allow_self_signed' => true,
                )
            );
            $sslContext = stream_context_create($contextOptions);
            $soapOptions['stream_context'] = $sslContext;
        }
        $this->soapClient = $this->getClient($wsdl, $soapOptions);
    }

    /**
     * @param string $wsdl
     * @param array $soapOptions
     * @return \SoapClient
     */
    protected function getClient($wsdl, array $soapOptions)
    {
        return new \SoapClient($wsdl, $soapOptions);
    }

    /**
     * https://pagamenti.unicredit.it/UNI_CG_SERVICES/services/PaymentInitGatewayPort?xsd=dto/init/PaymentInit.xsd
     *
     * @param $shopId
     * @param $shopUserRef
     * @param $shopUserName
     * @param $shopUserAccount
     * @param $trType
     * @param $floatAmount
     * @param $currencyCode
     * @param $langId
     * @param $notifyUrl
     * @param $errorUrl
     * @param $addInfo1
     * @param $addInfo2
     * @param $addInfo3
     * @param $addInfo4
     * @param $addInfo5
     * @param $description
     * @param $recurrent
     * @param $freeText
     * @return InitResponse
     * @throws \Exception
     */
    public function paymentInit(
        $trType,
        $floatAmount,
        $langId,
        $notifyUrl,
        $errorUrl,
        $currencyCode = self::CURRENCY_CODE_EUR,
        $shopId = null,
        $shopUserRef = null,
        $shopUserName = null,
        $description = null,
        $shopUserAccount = null,
        $addInfo1 = null,
        $addInfo2 = null,
        $addInfo3 = null,
        $addInfo4 = null,
        $addInfo5 = null,
        $recurrent = 0,
        $freeText = null
    ) {
        //@todo validation
        if (empty($trType) || empty($floatAmount) || empty($langId) || empty($notifyUrl) || empty($errorUrl)) {
            throw new \InvalidArgumentException("Cannot invoke webservice, some mandatory field is missing");
        }
        
        $currencyCode = strtoupper($currencyCode);
        if ($currencyCode != self::CURRENCY_CODE_EUR && $currencyCode != self::CURRENCY_CODE_USD) {
            throw new \InvalidArgumentException(sprintf('Unsupported currency specified %s.', $currencyCode));
        }

        try {
            $request = new InitRequest();

            $request->setShopId($shopId);
            $request->setShopUserRef($shopUserRef);
            $request->setShopUserName($shopUserName);
            $request->setShopUserAccount($shopUserAccount);
            $request->setTrType($trType);
            $request->setAmount($floatAmount);
            $request->setCurrencyCode($currencyCode);
            $request->setLangId($langId);
            $request->setNotifyUrl($notifyUrl);
            $request->setErrorUrl($errorUrl);
            $request->setAddInfo1($addInfo1);
            $request->setAddInfo2($addInfo2);
            $request->setAddInfo3($addInfo3);
            $request->setAddInfo4($addInfo4);
            $request->setAddInfo5($addInfo5);
            $request->setDescription($description);
            $request->setRecurrent($recurrent);
            $request->setFreeText($freeText);
            $request->setTid($this->tid);
        } catch (\Exception $ex) {
            $this->logger->critical($ex->getMessage());
            throw $ex;
        }

        $signatureCalculator = new SignatureCalculator();
        $signatureCalculator->sign($request, $this->kSig);

        return new InitResponse(
            $this->soapClient->init(
                array('request' => ($request->toArray()))
            ),
            $this->logger
        );
    }

    /**
     * @return bool
     */
    protected function canExecute()
    {
        return isset($this->tid) && isset($this->kSig);
    }

    /**
     * @param $shopId
     * @param $paymentId
     * @return VerifyResponse
     * @throws \Exception
     */
    public function paymentVerify($shopId, $paymentId)
    {
        $request = new VerifyRequest();
        $request->setTid($this->tid);
        $request->setShopId($shopId);
        $request->setPaymentId($paymentId);
        $signatureCalculator = new SignatureCalculator();
        $signatureCalculator->sign($request, $this->kSig);
        $request = array('request'=>($request->toArray()));
        $this->logger->debug(print_r($request, true));
        return new VerifyResponse(
            $this->soapClient->verify($request),
            $this->logger
        );
    }
}

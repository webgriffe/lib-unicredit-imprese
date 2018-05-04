<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 23/02/18
 * Time: 15.33
 */

namespace Webgriffe\LibUnicreditImprese\SoapClient;

class Wrapper implements WrapperInterface
{
    /**
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * {@inheritdoc}
     */
    public function initialize($wsdlUrl, array $soapOptions)
    {
        $this->soapClient = new \SoapClient($wsdlUrl, $soapOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function isInitialized()
    {
        return !is_null($this->soapClient);
    }

    /**
     * {@inheritdoc}
     */
    public function init(array $requestData)
    {
        return $this->getSoapClient()->init($requestData);
    }

    /**
     * {@inheritdoc}
     */
    public function verify(array $requestData)
    {
        return $this->getSoapClient()->verify($requestData);
    }

    /**
     * {@inheritdoc}
     */
    public function getLastRequest()
    {
        return $this->getSoapClient()->__getLastRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function getLastResponse()
    {
        return $this->getSoapClient()->__getLastResponse();
    }

    /**
     * @return \SoapClient
     */
    protected function getSoapClient()
    {
        if (!$this->isInitialized()) {
            throw new \LogicException('Soap wrapper was not initialized before requesting the soap client');
        }

        return $this->soapClient;
    }
}

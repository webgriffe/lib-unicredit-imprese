<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 23/02/18
 * Time: 16.09
 */

namespace Webgriffe\LibUnicreditImprese\SoapClient;


interface WrapperInterface
{
    /**
     * @param $wsdlUrl string
     * @param array $soapOptions
     */
    public function initialize($wsdlUrl, array $soapOptions);

    /**
     * @return bool
     */
    public function isInitialized();

    /**
     * @param array $requestData
     * @return \stdClass
     */
    public function init(array $requestData);

    /**
     * @param array $requestData
     * @return \stdClass
     */
    public function verify(array $requestData);
}
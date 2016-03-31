<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 30/03/16
 * Time: 10.09
 */
namespace Webgriffe\LibUnicreditImprese;

interface PaymentRequestInterface{
    /**
     * @return string
     */
    function getSignatureData();

    function getSignature($key);
}
<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 30/03/16
 * Time: 10.09
 */
namespace Webgriffe\LibUnicreditImprese;

interface SignableInterface
{
    /**
     * @return string
     */
    public function getSignatureData();

    /**
     * @param $param
     * @return mixed
     */
    public function setSignature($param);
}

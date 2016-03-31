<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 30/03/16
 * Time: 12.02
 */
namespace Webgriffe\LibUnicreditImprese;

class PaymentInitRequestValidator implements RequestValidatorInterface
{
    protected $mandatoryFields = array(
        "tid",
        "trType",
        "shopId",
        "shopUserRef",
        "amount",
        "currencyCode",
        "langId"
    );

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data){
        foreach($this->mandatoryFields as $mandatoryField)
        {
            if(!array_key_exists($mandatoryField, $data))
            {
                return false;
            }
        }
        return true;
    }
}
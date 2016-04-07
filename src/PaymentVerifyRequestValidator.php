<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 30/03/16
 * Time: 12.02
 */
namespace Webgriffe\LibUnicreditImprese;

class PaymentVerifyRequestValidator implements RequestValidatorInterface
{
    protected $mandatoryFields = array(
        "Tid",
        "ShopId",
        "PaymentId"
    );

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data)
    {
        foreach ($this->mandatoryFields as $mandatoryField) {
            if (!array_key_exists($mandatoryField, $data)) {
                return false;
            }
        }
        return true;
    }
}

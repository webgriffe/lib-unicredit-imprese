<?php

namespace Webgriffe\LibUnicreditImprese\Lists;

/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 08/03/18
 * Time: 14.25
 */
class Currency implements ValuesList
{
    const CURRENCY_CODE_EUR = 'EUR';
    const CURRENCY_CODE_USD = 'USD';

    /**
     * @return array
     */
    public function getList()
    {
        return [
            self::CURRENCY_CODE_EUR => 'Euro',
            self::CURRENCY_CODE_USD => 'US Dollar',
        ];
    }
}

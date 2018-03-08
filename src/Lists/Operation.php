<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 08/03/18
 * Time: 14.42
 */

namespace Webgriffe\LibUnicreditImprese\Lists;

class Operation implements ValuesList
{
    const TRANSACTION_TYPE_AUTH     = 'AUTH';
    const TRANSACTION_TYPE_PURCHASE = 'PURCHASE';

    /**
     * @return array
     */
    public function getList()
    {
        return [
            self::TRANSACTION_TYPE_AUTH     => 'Authorize',
            self::TRANSACTION_TYPE_PURCHASE => 'Purchase',
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 08/03/18
 * Time: 14.30
 */

namespace Webgriffe\LibUnicreditImprese\Lists;

class Language implements ValuesList
{
    const LANGUAGE_ITA = 'IT';
    const LANGUAGE_ENG = 'EN';

    /**
     * @return array
     */
    public function getList()
    {
        return [
            self::LANGUAGE_ITA => 'Italian',
            self::LANGUAGE_ENG => 'English',
        ];
    }
}

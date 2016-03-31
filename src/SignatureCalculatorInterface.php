<?php

namespace Webgriffe\LibUnicreditImprese;

interface SignatureCalculatorInterface
{
    /**
     * @param $data
     * @param $key
     * @return string
     */
    public function calculate($data, $key);
}

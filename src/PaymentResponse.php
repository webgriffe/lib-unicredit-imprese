<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 15/04/16
 * Time: 15.44
 */

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;

abstract class PaymentResponse
{
    /**
     * PaymentResponse constructor.
     * @param \stdClass $data
     * @param LoggerInterface|null $logger
     */
    public function __construct(\stdClass $data, LoggerInterface $logger)
    {
        if (isset($data->response->error) && !empty($data->response->error)) {
            if ($logger) {
                $logger->critical('Webservice error, description:' . print_r($data, true));
            }
        }

        $this->initFromRawSoapResponse($data);
    }

    /**
     * @param \stdClass $data
     * @return void
     */
    abstract protected function initFromRawSoapResponse(\stdClass $data);
}

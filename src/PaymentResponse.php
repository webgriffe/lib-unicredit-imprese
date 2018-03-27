<?php
/**
 * Created by PhpStorm.
 * User: atedeschi
 * Date: 15/04/16
 * Time: 15.44
 */

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

abstract class PaymentResponse
{
    use Logging;

    /**
     * PaymentResponse constructor.
     * @param \stdClass $data
     * @param LoggerInterface|null $logger
     */
    public function __construct(\stdClass $data, LoggerInterface $logger)
    {
        $this->logger = $logger;

        if (isset($data->response->error) && !empty($data->response->error)) {
            $this->log('Webservice error, description:' . print_r($data, true), LogLevel::CRITICAL);
        }

        $this->initFromRawSoapResponse($data);
    }

    /**
     * @param \stdClass $data
     * @return void
     */
    abstract protected function initFromRawSoapResponse(\stdClass $data);
}

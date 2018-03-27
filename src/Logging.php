<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 27/03/18
 * Time: 17.18
 */

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

trait Logging
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    protected function log($message, $level = LogLevel::DEBUG)
    {
        if ($this->logger) {
            $this->logger->log($level, '[lib unicreditimprese] '.$message);
        }
    }
}

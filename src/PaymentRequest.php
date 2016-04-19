<?php

namespace Webgriffe\LibUnicreditImprese;

use Psr\Log\LoggerInterface;

abstract class PaymentRequest implements PaymentRequestInterface
{
    /**
     * @var SignatureCalculatorInterface
     */
    protected $signatureCalculator;

    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var
     */
    protected $requestValidator;

    /**
     * @param SignatureCalculatorInterface $signatureCalculator
     * @param RequestValidatorInterface $requestValidator
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        SignatureCalculatorInterface $signatureCalculator,
        RequestValidatorInterface $requestValidator,
        LoggerInterface $logger = null
    ) {
        $this->signatureCalculator = $signatureCalculator;
        $this->requestValidator = $requestValidator;
        $this->logger = $logger;
    }

    public function initialize($data)
    {
        $this->reset();
        if (!$this->requestValidator->validate($data)) {
            throw new \InvalidArgumentException("Could not initialize with this data!");
        }
        $this->fromArray($data);
    }

    /**
     * @param $key
     * @return string
     */
    public function sign($key)
    {
        if (!$this->signature) {
            $this->signature = $this->signatureCalculator->calculate($this->getSignatureData(), $key);
        }
        return $this->signature;
    }

    abstract public function reset();

    abstract public function getSignatureData();
}

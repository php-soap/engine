<?php
declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\Exception\DriverException;
use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Engine\Metadata\Metadata;

final class PartialDriver implements Driver
{
    public function __construct(
        private ?Encoder $encoder = null,
        private ?Decoder $decoder = null,
        private ?Metadata $metadata = null
    ) {
    }

    /**
     * @throws DriverException
     */
    public function decode(string $method, SoapResponse $response): mixed
    {
        if (!$this->decoder) {
            throw DriverException::partialException(Decoder::class);
        }

        return $this->decoder->decode($method, $response);
    }

    /**
     * @throws DriverException
     */
    public function encode(string $method, array $arguments): SoapRequest
    {
        if (!$this->encoder) {
            throw DriverException::partialException(Encoder::class);
        }

        return $this->encoder->encode($method, $arguments);
    }

    /**
     * @throws DriverException
     */
    public function getMetadata(): Metadata
    {
        if (!$this->metadata) {
            throw DriverException::partialException(Metadata::class);
        }

        return $this->metadata;
    }
}

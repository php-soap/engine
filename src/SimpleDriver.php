<?php
declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Engine\Metadata\Metadata;

final class SimpleDriver implements Driver
{
    public function __construct(
        private Encoder $encoder,
        private Decoder $decoder,
        private Metadata $metadata
    ) {
    }

    public function decode(string $method, SoapResponse $response): mixed
    {
        return $this->decoder->decode($method, $response);
    }

    public function encode(string $method, array $arguments): SoapRequest
    {
        return $this->encoder->encode($method, $arguments);
    }

    public function getMetadata(): Metadata
    {
        return $this->metadata;
    }
}

<?php declare(strict_types=1);

namespace SoapTest\Engine\Fixtures;

use Soap\Engine\Driver;
use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Engine\Metadata\Metadata;

final class PassThroughDriver implements Driver
{
    private string $request;
    private array $response;
    private Metadata $metadata;

    public function __construct(string $request, array $response, Metadata $metadata)
    {
        $this->request = $request;
        $this->response = $response;
        $this->metadata = $metadata;
    }

    public function decode(string $method, SoapResponse $response)
    {
        return $this->response;
    }

    public function encode(string $method, array $arguments): SoapRequest
    {
        return new SoapRequest($this->request, '', '', SoapRequest::SOAP_1_1);
    }

    public function getMetadata(): Metadata
    {
        return $this->metadata;
    }
}

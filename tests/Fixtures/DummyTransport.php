<?php

declare(strict_types=1);

namespace SoapTest\Engine\Fixtures;

use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Engine\Transport;

final class DummyTransport implements Transport
{
    private string $response;

    public function __construct(string $response)
    {
        $this->response = $response;
    }

    public function request(SoapRequest $request): SoapResponse
    {
        return new SoapResponse($this->response);
    }
}

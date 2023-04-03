<?php
declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\Exception\TransportException;
use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;

final class NoopTransport implements Transport
{
    /**
     * @throws TransportException
     */
    public function request(SoapRequest $request): SoapResponse
    {
        throw TransportException::noop();
    }
}

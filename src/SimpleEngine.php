<?php

declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\Metadata\Metadata;

final class SimpleEngine implements Engine
{
    private Driver $driver;
    private Transport $transport;

    public function __construct(
        Driver $driver,
        Transport $transport
    ) {
        $this->driver = $driver;
        $this->transport = $transport;
    }

    public function request(string $method, array $arguments)
    {
        $request = $this->driver->encode($method, $arguments);
        $response = $this->transport->request($request);

        return $this->driver->decode($method, $response);
    }

    public function getMetadata(): Metadata
    {
        return $this->driver->getMetadata();
    }
}

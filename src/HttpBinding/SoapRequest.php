<?php

namespace Soap\Engine\HttpBinding;

class SoapRequest
{
    private string $request;
    private string $location;
    private string $action;
    private int $version;
    private int $oneWay;

    public function __construct(string $request, string $location, string $action, int $version, int $oneWay = 0)
    {
        $this->request = $request;
        $this->location = $location;
        $this->action = $action;
        $this->version = $version;
        $this->oneWay = $oneWay;
    }

    public function getRequest(): string
    {
        return $this->request;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function isSOAP11(): bool
    {
        return $this->getVersion() === SOAP_1_1;
    }

    public function isSOAP12(): bool
    {
        return $this->getVersion() === SOAP_1_2;
    }

    public function getOneWay(): int
    {
        return $this->oneWay;
    }
}

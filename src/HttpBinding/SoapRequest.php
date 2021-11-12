<?php declare(strict_types=1);

namespace Soap\Engine\HttpBinding;

final class SoapRequest
{
    public const SOAP_1_1 = 1;
    public const SOAP_1_2 = 2;

    private string $request;
    private string $location;
    private string $action;
    private int $version;
    private bool $oneWay;

    public function __construct(string $request, string $location, string $action, int $version, bool $oneWay = false)
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
        return $this->getVersion() === self::SOAP_1_1;
    }

    public function isSOAP12(): bool
    {
        return $this->getVersion() === self::SOAP_1_2;
    }

    public function getOneWay(): bool
    {
        return $this->oneWay;
    }
}

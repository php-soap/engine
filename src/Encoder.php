<?php declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\HttpBinding\SoapRequest;

interface Encoder
{
    public function encode(string $method, array $arguments): SoapRequest;
}

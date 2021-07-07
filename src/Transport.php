<?php declare(strict_types=1);


namespace Soap\Engine;

use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;

interface Transport
{
    public function request(SoapRequest $request): SoapResponse;
}

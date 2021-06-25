<?php

namespace Soap\Engine;

use Soap\Engine\HttpBinding\SoapResponse;

interface Decoder
{
    /**
     * @return mixed
     */
    public function decode(string $method, SoapResponse $response);
}

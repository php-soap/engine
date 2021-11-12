<?php

declare(strict_types=1);

namespace SoapTest\Engine\HttpBinding;

use PHPUnit\Framework\TestCase;
use Soap\Engine\HttpBinding\SoapRequest;

final class SoapRequestTest extends TestCase
{
    public function test_request()
    {
        $request = new SoapRequest('requestbody', 'location', 'action', SoapRequest::SOAP_1_1, false);

        static::assertSame('requestbody', $request->getRequest());
        static::assertSame('location', $request->getLocation());
        static::assertSame('action', $request->getAction());
        static::assertSame(SoapRequest::SOAP_1_1, $request->getVersion());
        static::assertSame(false, $request->getOneWay());
    }
}

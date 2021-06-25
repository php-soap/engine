<?php

declare(strict_types=1);

namespace SoapTest\Engine\HttpBinding;

use PHPUnit\Framework\TestCase;
use Soap\Engine\HttpBinding\SoapRequest;

class SoapRequestTest extends TestCase
{
    public function testRequest()
    {
        $request = new SoapRequest('requestbody', 'location', 'action', SoapRequest::SOAP_1_1, 0);

        self::assertSame('requestbody', $request->getRequest());
        self::assertSame('location', $request->getLocation());
        self::assertSame('action', $request->getAction());
        self::assertSame(SoapRequest::SOAP_1_1, $request->getVersion());
        self::assertSame(0, $request->getOneWay());
    }
}

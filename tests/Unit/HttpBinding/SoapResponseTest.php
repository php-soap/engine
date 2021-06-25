<?php

declare(strict_types=1);

namespace SoapTest\Engine\HttpBinding;

use PHPUnit\Framework\TestCase;
use Soap\Engine\HttpBinding\SoapResponse;

class SoapResponseTest extends TestCase
{
    public function testResponse()
    {
        $request = new SoapResponse('response');

        self::assertSame('response', $request->getPayload());
    }
}

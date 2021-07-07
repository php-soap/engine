<?php

declare(strict_types=1);

namespace SoapTest\Engine\HttpBinding;

use PHPUnit\Framework\TestCase;
use Soap\Engine\HttpBinding\SoapResponse;

final class SoapResponseTest extends TestCase
{
    public function test_response()
    {
        $request = new SoapResponse('response');

        static::assertSame('response', $request->getPayload());
    }
}

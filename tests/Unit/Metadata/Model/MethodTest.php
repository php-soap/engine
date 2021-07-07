<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Method;
use Soap\Engine\Metadata\Model\XsdType;

final class MethodTest extends TestCase
{
    public function test_method()
    {
        $method = new Method('method', $params = new ParameterCollection(), $result = XsdType::create('string'));

        static::assertSame('method', $method->getName());
        static::assertSame($params, $method->getParameters());
        static::assertSame($result, $method->getReturnType());
    }
}

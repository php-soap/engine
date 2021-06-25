<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Method;
use Soap\Engine\Metadata\Model\Parameter;
use Soap\Engine\Metadata\Model\XsdType;

class MethodTest extends TestCase
{
    public function testMethod()
    {
        $method = new Method('method', $params = new ParameterCollection(), $result = XsdType::create('string'));

        self::assertSame('method', $method->getName());
        self::assertSame($params, $method->getParameters());
        self::assertSame($result, $method->getReturnType());
    }
}

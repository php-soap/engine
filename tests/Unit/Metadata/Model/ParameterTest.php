<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\Parameter;
use Soap\Engine\Metadata\Model\XsdType;

final class ParameterTest extends TestCase
{
    public function test_parameter()
    {
        $param = new Parameter('name', $type = XsdType::create('string'));

        static::assertSame($param->getName(), 'name');
        static::assertSame($param->getType(), $type);
    }
}

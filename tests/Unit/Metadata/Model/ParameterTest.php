<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\Parameter;
use Soap\Engine\Metadata\Model\XsdType;

class ParameterTest extends TestCase
{
    public function testParameter()
    {
        $param = new Parameter('name', $type = XsdType::create('string'));

        self::assertSame($param->getName(), 'name');
        self::assertSame($param->getType(), $type);
    }
}

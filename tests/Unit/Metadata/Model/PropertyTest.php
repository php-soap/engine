<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\XsdType;

final class PropertyTest extends TestCase
{
    public function test_property()
    {
        $param = new Property('name', $type = XsdType::create('string'));

        static::assertSame($param->getName(), 'name');
        static::assertSame($param->getType(), $type);
    }
}

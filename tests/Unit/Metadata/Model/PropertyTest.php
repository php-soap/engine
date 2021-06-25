<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\XsdType;

class PropertyTest extends TestCase
{
    public function testProperty()
    {
        $param = new Property('name', $type = XsdType::create('string'));

        self::assertSame($param->getName(), 'name');
        self::assertSame($param->getType(), $type);
    }
}

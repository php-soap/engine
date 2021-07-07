<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Model\Type;
use Soap\Engine\Metadata\Model\XsdType;

final class TypeTest extends TestCase
{
    public function test_type()
    {
        $type = new Type(
            $xsd = XsdType::create('SomeObject'),
            $properties = new PropertyCollection()
        );

        static::assertSame($xsd, $type->getXsdType());
        static::assertSame($properties, $type->getProperties());
        static::assertSame('SomeObject', $type->getName());
    }
}

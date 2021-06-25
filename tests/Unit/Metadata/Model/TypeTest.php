<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\Type;
use Soap\Engine\Metadata\Model\XsdType;

class TypeTest extends TestCase
{
    public function testType()
    {
        $type = new Type(
            $xsd = XsdType::create('SomeObject'),
            $properties = new PropertyCollection()
        );

        self::assertSame($xsd, $type->getXsdType());
        self::assertSame($properties, $type->getProperties());
        self::assertSame('SomeObject', $type->getName());
    }
}

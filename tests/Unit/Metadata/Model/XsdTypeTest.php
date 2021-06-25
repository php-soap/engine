<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\Type;
use Soap\Engine\Metadata\Model\XsdType;

class XsdTypeTest extends TestCase
{
    /** @test */
    function it_contains_only_a_name()
    {
        $type = XsdType::create('myType');

        self::assertSame('myType', $type->getName());
        self::assertSame('myType', $type->getBaseTypeOrFallbackToName());
        self::assertSame('', $type->getXmlNamespace());
        self::assertSame('', $type->getXmlNamespaceName());
        self::assertSame('', $type->getBaseType());
        self::assertSame([], $type->getMemberTypes());
    }

    /** @test */
    function it_cannot_guess_unknown_types()
    {
        $type = XsdType::guess('myType');
        self::assertSame('myType', $type->getName());
        self::assertSame('', $type->getBaseType());
    }

    /** @test */
    function it_can_guess_known_types()
    {
        foreach (XsdType::fetchAllKnownBaseTypeMappings() as $typeName => $baseType) {
            $type = XsdType::guess($typeName);
            self::assertSame($typeName, $type->getName());
            self::assertSame($baseType, $type->getBaseType());
        }
    }

    /** @test */
    function it_can_add_base_type()
    {
        $type = XsdType::create('myType')->withBaseType('baseType');

        self::assertSame('myType', $type->getName());
        self::assertSame('baseType', $type->getBaseType());
        self::assertSame('baseType', $type->getBaseTypeOrFallbackToName());
    }

    /** @test */
    function it_can_add_known_base_type_and_move_actual_type_to_member_types()
    {
        foreach (XsdType::fetchAllKnownBaseTypeMappings() as $typeName => $baseType) {
            $new = XsdType::create('myType')->withBaseType($typeName);

            self::assertSame('myType', $new->getName());
            self::assertSame($baseType, $new->getBaseType());
            self::assertSame($baseType, $new->getBaseTypeOrFallbackToName());
            self::assertSame([$typeName], $new->getMemberTypes());
        }
    }

    /** @test */
    function it_can_add_member_types()
    {
        $new = XsdType::create('myType')->withMemberTypes($types = ['type1', 'type2']);

        self::assertSame('myType', $new->getName());
        self::assertSame($types, $new->getMemberTypes());
    }

    /** @test */
    function it_can_add_xml_namespace()
    {
        $new = XsdType::create('myType')->withXmlNamespace($namespace = 'http://www.w3.org/2001/XMLSchema');

        self::assertSame('myType', $new->getName());
        self::assertSame($namespace, $new->getXmlNamespace());
    }

    /** @test */
    function it_can_add_xml_namespace_name()
    {
        $new = XsdType::create('myType')->withXmlNamespaceName($namespace = 'hello');

        self::assertSame('myType', $new->getName());
        self::assertSame('hello', $new->getXmlNamespaceName());
    }

    /** @test */
    function it_can_add_meta()
    {
        $new = XsdType::create('myType')->withMeta($meta = ['minOccurs' => 1]);

        self::assertSame('myType', $new->getName());
        self::assertSame($meta, $new->getMeta());
    }

    /** @test */
    function it_can_return_name_as_string()
    {
        $new = XsdType::create('myType');

        self::assertSame('myType', (string) $new);
    }
}

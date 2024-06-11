<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Model;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\TypeMeta;
use Soap\Engine\Metadata\Model\XsdType;

final class XsdTypeTest extends TestCase
{
    public function test_it_contains_only_a_name()
    {
        $type = XsdType::create('myType');

        static::assertSame('myType', $type->getName());
        static::assertSame('myType', $type->getBaseTypeOrFallbackToName());
        static::assertSame('', $type->getXmlNamespace());
        static::assertSame('', $type->getXmlNamespaceName());
        static::assertSame('', $type->getXmlTargetNamespace());
        static::assertSame('', $type->getXmlTargetNamespaceName());
        static::assertSame('', $type->getXmlTargetNodeName());
        static::assertSame('', $type->getXmlTypeName());
        static::assertSame('', $type->getBaseType());
        static::assertSame([], $type->getMemberTypes());
    }

    public function test_it_cannot_guess_unknown_types()
    {
        $type = XsdType::guess('myType');
        static::assertSame('myType', $type->getName());
        static::assertSame('', $type->getBaseType());
    }

    public function test_it_can_guess_known_types()
    {
        foreach (XsdType::fetchAllKnownBaseTypeMappings() as $typeName => $baseType) {
            $type = XsdType::guess($typeName);
            static::assertSame($typeName, $type->getName());
            static::assertSame($baseType, $type->getBaseType());
        }
    }

    public function test_it_can_add_base_type()
    {
        $type = XsdType::create('myType')->withBaseType('baseType');

        static::assertSame('myType', $type->getName());
        static::assertSame('baseType', $type->getBaseType());
        static::assertSame('baseType', $type->getBaseTypeOrFallbackToName());
    }

    public function test_it_can_add_known_base_type_and_move_actual_type_to_member_types()
    {
        foreach (XsdType::fetchAllKnownBaseTypeMappings() as $typeName => $baseType) {
            $new = XsdType::create('myType')->withBaseType($typeName);

            static::assertSame('myType', $new->getName());
            static::assertSame($baseType, $new->getBaseType());
            static::assertSame($baseType, $new->getBaseTypeOrFallbackToName());
            static::assertSame($typeName === $baseType ? [] : [$typeName], $new->getMemberTypes());
        }
    }

    public function test_it_can_add_member_types()
    {
        $new = XsdType::create('myType')->withMemberTypes($types = ['type1', 'type2']);

        static::assertSame('myType', $new->getName());
        static::assertSame($types, $new->getMemberTypes());
    }

    public function test_it_can_add_xml_namespace()
    {
        $new = XsdType::create('myType')->withXmlNamespace($namespace = 'http://www.w3.org/2001/XMLSchema');

        static::assertSame('myType', $new->getName());
        static::assertSame($namespace, $new->getXmlNamespace());
    }

    public function test_it_can_add_xml_namespace_name()
    {
        $new = XsdType::create('myType')->withXmlNamespaceName($namespace = 'hello');

        static::assertSame('myType', $new->getName());
        static::assertSame('hello', $new->getXmlNamespaceName());
    }

    public function test_it_can_add_xml_target_namespace()
    {
        $new = XsdType::create('myType')->withXmlTargetNamespace($namespace = 'http://tns');

        static::assertSame('myType', $new->getName());
        static::assertSame($namespace, $new->getXmlTargetNamespace());
    }

    public function test_it_can_add_xml_target_namespace_name()
    {
        $new = XsdType::create('myType')->withXmlTargetNamespaceName($namespaceName = 'tns');

        static::assertSame('myType', $new->getName());
        static::assertSame($namespaceName, $new->getXmlTargetNamespaceName());
    }

    public function test_it_can_add_xml_node_name()
    {
        $new = XsdType::create('myType')->withXmlTargetNodeName($node = 'myTypeNodeName');

        static::assertSame('myType', $new->getName());
        static::assertSame($node, $new->getXmlTargetNodeName());
    }

    public function test_it_can_add_xml_type_name()
    {
        $new = XsdType::create('myType')->withXmlTypeName($node = 'myTypeTypeName');

        static::assertSame('myType', $new->getName());
        static::assertSame($node, $new->getXmlTypeName());
    }

    public function test_it_can_add_meta()
    {
        $type = XsdType::create('myType');
        $new = $type->withMeta(
            static fn (TypeMeta $meta): TypeMeta => $meta->withMinOccurs(1)
        );

        static::assertSame('myType', $new->getName());
        static::assertNotSame($type->getMeta(), $new->getMeta());
        static::assertSame(1, $new->getMeta()->minOccurs()->unwrapOr(0));
    }

    public function test_it_can_return_name_as_string()
    {
        $new = XsdType::create('myType');

        static::assertSame('myType', (string) $new);
    }

    
    public function test_it_can_copy_a_type(): void
    {
        $type = XsdType::any();
        $new = $type->copy('new');

        static::assertSame('new', $new->getName());
        static::assertSame($type->getBaseType(), $new->getBaseType());
        static::assertSame($type->getMemberTypes(), $new->getMemberTypes());
        static::assertSame($type->getXmlNamespace(), $new->getXmlNamespace());
        static::assertSame($type->getXmlNamespaceName(), $new->getXmlNamespaceName());
        static::assertSame($type->getXmlTargetNamespace(), $new->getXmlTargetNamespace());
        static::assertSame($type->getXmlTargetNamespaceName(), $new->getXmlTargetNamespaceName());
        static::assertSame($type->getXmlTargetNodeName(), $new->getXmlTargetNodeName());
        static::assertSame($type->getXmlTypeName(), $new->getXmlTypeName());
        static::assertSame($type->getMeta(), $new->getMeta());
    }
}

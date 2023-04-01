<?php
declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\TypeMeta;

final class TypeMetaTest extends TestCase
{
    public function test_it_has_is_abstract()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsAbstract($value);
        static::assertSame($value, $meta->isAbstract()->unwrapOr(null));
    }

    public function test_it_has_default()
    {
        $value = 'default';
        $meta = (new TypeMeta())->withDefault($value);
        static::assertSame($value, $meta->default()->unwrapOr(null));
    }

    public function test_it_has_docs()
    {
        $value = 'docs';
        $meta = (new TypeMeta())->withDocs($value);
        static::assertSame($value, $meta->docs()->unwrapOr(null));
    }

    public function test_it_has_enums()
    {
        $value = ['hello', 'world'];
        $meta = (new TypeMeta())->withEnums($value);
        static::assertSame($value, $meta->enums()->unwrapOr(null));
    }

    public function test_it_has_extends()
    {
        $value = [
            'type' => 'baseType',
            'namespace' => 'http://dummy'
        ];
        $meta = (new TypeMeta())->withExtends($value);
        static::assertSame($value, $meta->extends()->unwrapOr(null));
    }

    public function test_it_has_fixed()
    {
        $value = 'fixed';
        $meta = (new TypeMeta())->withFixed($value);
        static::assertSame($value, $meta->fixed()->unwrapOr(null));
    }

    public function test_it_has_is_alias()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsAlias($value);
        static::assertSame($value, $meta->isAlias()->unwrapOr(null));
    }

    public function test_it_has_is_attribute()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsAttribute($value);
        static::assertSame($value, $meta->isAttribute()->unwrapOr(null));
    }

    public function test_it_has_is_element_value()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsElementValue($value);
        static::assertSame($value, $meta->isElementValue()->unwrapOr(null));
    }

    public function test_it_has_is_list()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsList($value);
        static::assertSame($value, $meta->isList()->unwrapOr(null));
    }

    public function test_it_has_is_nullable()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsNullable($value);
        static::assertSame($value, $meta->isNullable()->unwrapOr(null));
    }

    public function test_it_has_is_simple()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsSimple($value);
        static::assertSame($value, $meta->isSimple()->unwrapOr(null));
    }

    public function test_it_has_is_element()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsElement($value);
        static::assertSame($value, $meta->isElement()->unwrapOr(null));
    }

    public function test_it_has_is_local()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsLocal($value);
        static::assertSame($value, $meta->isLocal()->unwrapOr(null));
    }

    public function test_it_has_is_nil()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsNil($value);
        static::assertSame($value, $meta->isNil()->unwrapOr(null));
    }

    public function test_it_has_min_occurs()
    {
        $value = 10;
        $meta = (new TypeMeta())->withMinOccurs($value);
        static::assertSame($value, $meta->minOccurs()->unwrapOr(null));
    }

    public function test_it_has_max_occurs()
    {
        $value = 20;
        $meta = (new TypeMeta())->withMaxOccurs($value);
        static::assertSame($value, $meta->maxOccurs()->unwrapOr(null));
    }

    public function test_it_has_restriction()
    {
        $value = ['mixed' => ['content']];
        $meta = (new TypeMeta())->withRestriction($value);
        static::assertSame($value, $meta->restriction()->unwrapOr(null));
    }

    public function test_it_has_unions()
    {
        $value = [
            [
                'type' => 'myType',
                'namespace' => 'https://mytypesnamespace',
                'isList' => false,
            ]
        ];
        $meta = (new TypeMeta())->withUnions($value);
        static::assertSame($value, $meta->unions()->unwrapOr(null));
    }

    public function test_it_has_use()
    {
        $value = 'use';
        $meta = (new TypeMeta())->withUse($value);
        static::assertSame($value, $meta->use()->unwrapOr(null));
    }

    public function test_it_has_is_qualified()
    {
        $value = true;
        $meta = (new TypeMeta())->withIsQualified($value);
        static::assertSame($value, $meta->isQualified()->unwrapOr(null));
    }
}

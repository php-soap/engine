<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\XsdTypeCollection;
use Soap\Engine\Metadata\Model\XsdType;

final class XsdTypeCollectionTest extends TestCase
{
    private XsdTypeCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new XsdTypeCollection(
            XsdType::create('Object')
        );
    }

    
    public function test_it_can_iterate_over_xsd_types(): void
    {
        static::assertCount(1, $this->collection);
        static::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }

    
    public function test_it_can_fetch_by_name(): void
    {
        $xsdType = $this->collection->fetchByNameWithFallback('Object');
        static::assertSame('Object', $xsdType->getName());
    }

    
    public function test_it_can_fetch_by_name_with_fallback(): void
    {
        $xsdType = $this->collection->fetchByNameWithFallback('time');
        static::assertSame('time', $xsdType->getName());
        static::assertSame('string', $xsdType->getBaseType());
    }
}

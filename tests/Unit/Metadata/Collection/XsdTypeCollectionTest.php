<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Collection\XsdTypeCollection;
use Soap\Engine\Metadata\Model\XsdType;

class XsdTypeCollectionTest extends TestCase
{
    private XsdTypeCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new XsdTypeCollection(
            XsdType::create('Object')
        );
    }

    /** @test */
    public function it_can_iterate_over_xsdTypes(): void
    {
        self::assertCount(1, $this->collection);
        self::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }

    /** @test */
    public function it_can_fetch_by_name(): void
    {
        $xsdType = $this->collection->fetchByNameWithFallback('Object');
        self::assertSame('Object', $xsdType->getName());
    }

    /** @test */
    public function it_can_fetch_by_name_with_fallback(): void
    {
        $xsdType = $this->collection->fetchByNameWithFallback('time');
        self::assertSame('time', $xsdType->getName());
        self::assertSame('string', $xsdType->getBaseType());
    }
}

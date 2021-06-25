<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Type;
use Soap\Engine\Metadata\Model\XsdType;

class TypeCollectionTest extends TestCase
{
    private TypeCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new TypeCollection(
            new Type(XsdType::create('Response'), new PropertyCollection())
        );
    }

    /** @test */
    public function it_can_iterate_over_types(): void
    {
        self::assertCount(1, $this->collection);
        self::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }

    /** @test */
    public function it_can_fetch_by_name(): void
    {
        $type = $this->collection->fetchFirstByName('Response');
        self::assertSame('Response', $type->getName());
    }

    /** @test */
    public function it_can_fail_fetching_by_name(): void
    {
        $this->expectException(MetadataException::class);
        $this->collection->fetchFirstByName('nope');
    }

    /** @test */
    public function it_can_reduce(): void
    {
        $result = $this->collection->reduce(static fn (int $i, Type $item) => $i + 1, 0);
        self::assertSame(1, $result);
    }

    /** @test */
    public function it_can_filter(): void
    {
        $result = $this->collection->filter(static fn (Type $type) => true);
        self::assertNotSame($this->collection, $result);
        self::assertCount(1, $result);

        $result = $this->collection->filter(static fn (Type $type) => false);
        self::assertNotSame($this->collection, $result);
        self::assertCount(0, $result);
    }
}

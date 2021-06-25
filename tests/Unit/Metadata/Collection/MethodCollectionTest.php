<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Method;
use Soap\Engine\Metadata\Model\XsdType;

class MethodCollectionTest extends TestCase
{
    private MethodCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new MethodCollection(
            new Method('hello', new ParameterCollection(), XsdType::create('Response'))
        );
    }

    /** @test */
    public function it_can_iterate_over_methods(): void
    {
        self::assertCount(1, $this->collection);
        self::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }

    /** @test */
    public function it_can_fetch_by_name(): void
    {
        $method = $this->collection->fetchByName('hello');
        self::assertSame('hello', $method->getName());
    }

    /** @test */
    public function it_can_fail_fetching_by_name(): void
    {
        $this->expectException(MetadataException::class);
        $this->collection->fetchByName('nope');
    }
}

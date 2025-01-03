<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Method;
use Soap\Engine\Metadata\Model\MethodMeta;
use Soap\Engine\Metadata\Model\XsdType;

final class MethodCollectionTest extends TestCase
{
    private MethodCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new MethodCollection(
            (new Method('hello', new ParameterCollection(), XsdType::create('Response')))->withMeta(
                static fn (MethodMeta $meta) => $meta->withAction('uri:hello')
            )
        );
    }

    public function test_it_can_iterate_over_methods(): void
    {
        static::assertCount(1, $this->collection);
        static::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }

    
    public function test_it_can_fetch_by_name(): void
    {
        $method = $this->collection->fetchByName('hello');
        static::assertSame('hello', $method->getName());
    }

    
    public function test_it_can_fail_fetching_by_name(): void
    {
        $this->expectException(MetadataException::class);
        $this->collection->fetchByName('nope');
    }

    public function test_it_can_fetch_by_soap_action(): void
    {
        $method = $this->collection->fetchBySoapAction('uri:hello');
        static::assertSame('hello', $method->getName());
    }

    public function test_it_can_fail_fetching_by_soap_action(): void
    {
        $this->expectException(MetadataException::class);
        $this->collection->fetchBySoapAction('uri:nope');
    }
}

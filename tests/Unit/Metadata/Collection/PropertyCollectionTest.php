<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\PropertyCollection;
use Soap\Engine\Metadata\Model\Property;
use Soap\Engine\Metadata\Model\XsdType;

final class PropertyCollectionTest extends TestCase
{
    private PropertyCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new PropertyCollection(
            new Property('hello', XsdType::create('Response'))
        );
    }

    
    public function test_it_can_iterate_over_properties(): void
    {
        static::assertCount(1, $this->collection);
        static::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }
}

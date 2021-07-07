<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Parameter;
use Soap\Engine\Metadata\Model\XsdType;

final class ParameterCollectionTest extends TestCase
{
    private ParameterCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new ParameterCollection(
            new Parameter('hello', XsdType::create('Response'))
        );
    }

    
    public function test_it_can_iterate_over_parameters(): void
    {
        static::assertCount(1, $this->collection);
        static::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }
}

<?php

declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\ParameterCollection;
use Soap\Engine\Metadata\Model\Parameter;
use Soap\Engine\Metadata\Model\XsdType;

class ParameterCollectionTest extends TestCase
{
    private ParameterCollection $collection;

    protected function setUp(): void
    {
        $this->collection = new ParameterCollection(
            new Parameter('hello', XsdType::create('Response'))
        );
    }

    /** @test */
    public function it_can_iterate_over_parameters(): void
    {
        self::assertCount(1, $this->collection);
        self::assertSame([...$this->collection], $this->collection->map(static fn ($item) => $item));
    }
}

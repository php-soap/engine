<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Metadata\Model\Property;

final class PropertyCollection implements IteratorAggregate, Countable
{
    /**
     * @var Property[]
     */
    private array $properties;

    public function __construct(Property ...$properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return ArrayIterator|Property[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->properties);
    }

    public function count(): int
    {
        return count($this->properties);
    }

    public function map(callable  $callback): array
    {
        return array_map($callback, $this->properties);
    }
}

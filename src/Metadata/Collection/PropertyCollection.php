<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Metadata\Model\Property;

/**
 * @implements IteratorAggregate<Property>
 */
final class PropertyCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<Property>
     */
    private array $properties;

    /**
     * @no-named-arguments
     */
    public function __construct(Property ...$properties)
    {
        $this->properties = $properties;
    }

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

<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Metadata\Model\Property;

/**
 * @implements IteratorAggregate<int<0,max>, Property>
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

    /**
     * @return ArrayIterator<int<0,max>, Property>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->properties);
    }

    public function count(): int
    {
        return count($this->properties);
    }

    /**
     * @template T
     * @param callable(Property): T $callback
     * @return list<T>
     */
    public function map(callable  $callback): array
    {
        return array_map($callback, $this->properties);
    }
}

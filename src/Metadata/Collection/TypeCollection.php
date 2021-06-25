<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Model\Type;

final class TypeCollection implements IteratorAggregate, Countable
{
    /**
     * @var Type[]
     */
    private array $types;

    public function __construct(Type ...$types)
    {
        $this->types = $types;
    }

    /**
     * @return ArrayIterator|Type[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->types);
    }

    public function count(): int
    {
        return count($this->types);
    }

    public function map(callable $callback): array
    {
        return array_map($callback, $this->types);
    }

    public function filter(callable $filter): self
    {
        return new self(...array_filter(
            $this->types,
            $filter
        ));
    }

    public function reduce(callable $reducer, $initial = null)
    {
        return array_reduce(
            $this->types,
            $reducer,
            $initial
        );
    }

    public function fetchFirstByName(string $name): Type
    {
        foreach ($this->types as $type) {
            if ($name === $type->getName()) {
                return $type;
            }
        }

        throw MetadataException::typeNotFound($name);
    }
}

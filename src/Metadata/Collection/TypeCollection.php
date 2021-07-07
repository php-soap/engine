<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Model\Type;

/**
 * @implements IteratorAggregate<Type>
 */
final class TypeCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<Type>
     */
    private array $types;

    /**
     * @no-named-arguments
     */
    public function __construct(Type ...$types)
    {
        $this->types = $types;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->types);
    }

    public function count(): int
    {
        return count($this->types);
    }

    /**
     * @template T
     * @param callable(Type): T $callback
     * @return array<T>
     */
    public function map(callable $callback): array
    {
        return array_map($callback, $this->types);
    }

    /**
     * @param callable(Type): bool $filter
     */
    public function filter(callable $filter): self
    {
        return new self(...array_filter(
            $this->types,
            $filter
        ));
    }

    /**
     * @psalm-suppress MixedReturnStatement
     * @psalm-suppress MixedInferredReturnType
     *
     * @template T
     * @param callable(T, Type): T $reducer
     * @param T $initial
     * @return T
     */
    public function reduce(callable $reducer, mixed $initial)
    {
        return array_reduce(
            $this->types,
            $reducer,
            $initial
        );
    }

    /**
     * @throws MetadataException
     */
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

<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Metadata\Model\XsdType;

/**
 * @implements IteratorAggregate<int<0,max>, XsdType>
 */
final class XsdTypeCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<XsdType>
     */
    private array $types;

    /**
     * @no-named-arguments
     */
    public function __construct(XsdType ...$types)
    {
        $this->types = $types;
    }

    /**
     * @return ArrayIterator<int<0,max>, XsdType>
     */
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
     * @param callable(XsdType): T $callback
     * @return list<T>
     */
    public function map(callable  $callback): array
    {
        return array_map($callback, $this->types);
    }

    public function fetchByNameWithFallback(string $name): XsdType
    {
        foreach ($this->types as $type) {
            if ($name === $type->getName()) {
                return $type;
            }
        }

        return XsdType::guess($name);
    }
}

<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Metadata\Model\XsdType;

/**
 * @implements IteratorAggregate<XsdType>
 */
final class XsdTypeCollection implements IteratorAggregate, Countable
{
    /**
     * @var XsdType[]
     */
    private array $types;

    public function __construct(XsdType ...$types)
    {
        $this->types = $types;
    }

    /**
     * @return ArrayIterator|XsdType[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->types);
    }

    public function count(): int
    {
        return count($this->types);
    }

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

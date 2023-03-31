<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Exception\MetadataException;
use Soap\Engine\Metadata\Model\Method;

/**
 * @implements IteratorAggregate<int<0,max>, Method>
 */
final class MethodCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<Method>
     */
    private array $methods;

    /**
     * @no-named-arguments
     */
    public function __construct(Method ...$methods)
    {
        $this->methods = $methods;
    }

    /**
     * @return ArrayIterator<int<0,max>, Method>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->methods);
    }

    public function count(): int
    {
        return count($this->methods);
    }

    /**
     * @template T
     * @param callable(Method): T $callback
     * @return list<T>
     */
    public function map(callable $callback): array
    {
        return array_map($callback, $this->methods);
    }

    /**
     * @throws MetadataException
     */
    public function fetchByName(string $name): Method
    {
        foreach ($this->methods as $method) {
            if ($name === $method->getName()) {
                return $method;
            }
        }

        throw MetadataException::methodNotFound($name);
    }
}

<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Soap\Engine\Metadata\Model\Parameter;

/**
 * @implements IteratorAggregate<Parameter>
 */
final class ParameterCollection implements Countable, IteratorAggregate
{
    /**
     * @var list<Parameter>
     */
    private array $parameters;

    /**
     * @no-named-arguments
     */
    public function __construct(Parameter ...$parameters)
    {
        $this->parameters = $parameters;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->parameters);
    }

    public function count(): int
    {
        return count($this->parameters);
    }

    public function map(callable  $callback): array
    {
        return array_map($callback, $this->parameters);
    }
}

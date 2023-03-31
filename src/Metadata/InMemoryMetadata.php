<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata;

use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;

final class InMemoryMetadata implements Metadata
{
    public function __construct(
        private readonly TypeCollection $types,
        private readonly MethodCollection $methods,
    ) {
    }

    public function getTypes(): TypeCollection
    {
        return $this->types;
    }

    public function getMethods(): MethodCollection
    {
        return $this->methods;
    }
}

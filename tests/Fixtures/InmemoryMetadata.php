<?php

declare(strict_types=1);

namespace SoapTest\Engine\Fixtures;

use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;
use Soap\Engine\Metadata\Metadata;

class InmemoryMetadata implements Metadata
{
    private TypeCollection $types;
    private MethodCollection $methods;

    public function __construct(?TypeCollection $types = null, ?MethodCollection $methods = null)
    {
        $this->types = $types ?? new TypeCollection();
        $this->methods = $methods ?? new MethodCollection();
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

<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata;

use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;

interface Metadata
{
    public function getTypes(): TypeCollection;
    public function getMethods(): MethodCollection;
}

<?php

declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\Metadata\MetadataProvider;

interface Engine extends MetadataProvider
{
    /**
     * @return mixed
     */
    public function request(string $method, array $arguments);
}

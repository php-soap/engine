<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata;

interface MetadataProvider
{
    public function getMetadata(): Metadata;
}

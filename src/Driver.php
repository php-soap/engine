<?php

declare(strict_types=1);

namespace Soap\Engine;

use Soap\Engine\Metadata\MetadataProvider;

interface Driver extends Decoder, Encoder, MetadataProvider
{
}

<?php
declare(strict_types=1);

namespace SoapTest\Engine\Metadata;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;
use Soap\Engine\Metadata\InMemoryMetadata;
use Soap\Engine\Metadata\Metadata;

final class InMemoryMetadataTest extends TestCase
{
    public function test_it_can_create_in_memory_metadata(): void
    {
        $metadata = new InMemoryMetadata(
            $types = new TypeCollection(),
            $methods = new MethodCollection()
        );

        static::assertInstanceOf(Metadata::class, $metadata);
        static::assertSame($types, $metadata->getTypes());
        static::assertSame($methods, $metadata->getMethods());
    }
}

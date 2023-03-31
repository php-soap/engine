<?php
declare(strict_types=1);

namespace SoapTest\Engine\Metadata;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\LazyMetadataProvider;
use Soap\Engine\Metadata\Metadata;
use SoapTest\Engine\Fixtures\DummyInMemoryMetadata;

final class LazyMetadataProviderTest extends TestCase
{
    private LazyMetadataProvider $provider;

    protected function setUp(): void
    {
        $this->provider = new LazyMetadataProvider(static fn (): Metadata => new DummyInMemoryMetadata());
    }

    public function test_it_lazily_loads_and_remembers_metadata(): void
    {
        $metadata1 = $this->provider->getMetadata();
        $metadata2 = $this->provider->getMetadata();

        static::assertSame($metadata1, $metadata2);
    }
}

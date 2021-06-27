<?php
declare(strict_types=1);

namespace SoapTest\Engine\Metadata;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Collection\MethodCollection;
use Soap\Engine\Metadata\Collection\TypeCollection;
use Soap\Engine\Metadata\LazyInMemoryMetadata;
use Soap\Engine\Metadata\Metadata;

class LazyInMemoryMetadataTest extends TestCase
{
    private Metadata $metadata;

    protected function setUp(): void
    {
        $this->metadata = $this->createMock(Metadata::class);
        $this->metadata->expects($this->once())->method('getTypes')->willReturn(new TypeCollection());
        $this->metadata->expects($this->once())->method('getMethods')->willReturn(new MethodCollection());
    }

    /** @test */
    public function it_lazily_loads_and_remembers_metadata(): void
    {
        $lazy = new LazyInMemoryMetadata($this->metadata);

        $types1 = $lazy->getTypes();
        $types2 = $lazy->getTypes();
        $methods1 = $lazy->getMethods();
        $methods2 = $lazy->getMethods();

        self::assertSame($types1, $types2);
        self::assertSame($methods1, $methods2);
    }
}

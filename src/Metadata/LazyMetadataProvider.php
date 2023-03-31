<?php
declare(strict_types=1);

namespace Soap\Engine\Metadata;

final class LazyMetadataProvider implements MetadataProvider
{
    /**
     * @var callable(): Metadata
     */
    private $metadataProvider;

    private Metadata|null $metadata = null;

    /**
     * @param callable(): Metadata $factory
     */
    public function __construct(callable $factory)
    {
        $this->metadataProvider = $factory;
    }

    public function getMetadata(): Metadata
    {
        if (!$this->metadata) {
            $this->metadata = ($this->metadataProvider)();
        }

        return $this->metadata;
    }
}

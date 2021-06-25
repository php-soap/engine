<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Model;

use Soap\Engine\Metadata\Collection\PropertyCollection;

final class Type
{
    private XsdType $xsdType;
    private PropertyCollection $properties;

    public function __construct(XsdType $xsdType, PropertyCollection $properties)
    {
        $this->xsdType = $xsdType;
        $this->properties = $properties;
    }

    public function getName(): string
    {
        return $this->xsdType->getName();
    }

    public function getXsdType(): XsdType
    {
        return $this->xsdType;
    }

    public function getProperties(): PropertyCollection
    {
        return $this->properties;
    }
}

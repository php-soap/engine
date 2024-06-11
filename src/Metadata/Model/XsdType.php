<?php

declare(strict_types=1);

namespace Soap\Engine\Metadata\Model;

use Soap\Xml\Xmlns;

final class XsdType
{
    /**
     * The name of the current type.
     */
    private string $name;

    /**
     * The expected PHP base type.
     */
    private string $baseType = '';

    /**
     * The XML namespace of the linked XML type=""
     * For example : a string element can be in a specific tns: <tns:x>stringValue</tns:x>
     * But it is still a string (in xsd namespace)
     */
    private string $xmlNamespace = '';

    /**
     * The XML namespace name of the linked XML type=""
     * For example : a string element can be in a specific tns: <tns:x>stringValue</tns:x>
     * But it is still a string (in xsd namespace)
     */
    private string $xmlNamespaceName = '';

    /**
     * The name of the linked XML type=""
     * For example: <element name="X" type="anyType" /> --> anyType
     */
    private string $xmlTypeName = '';

    /**
     * The name="" of the type. (Same as Type::name)
     * For example: <element name="X" type="anyType" />
     * The target node name would be X
     */
    private string $xmlTargetNodeName = '';

    /**
     * Contains the wrapping XML target namespace.
     * For example : a string element can be in a specific tns: <tns:x>stringValue</tns:x>
     */
    private string $xmlTargetNamespace = '';

    /**
     * Contains the wrapping XML target namespace name.
     * For example : a string element can be in a specific tns: <tns:x>stringValue</tns:x>
     */
    private string $xmlTargetNamespaceName = '';

    private TypeMeta $meta;
    private array $memberTypes = [];

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->meta = new TypeMeta();
    }

    public static function create(string $name): self
    {
        return new self($name);
    }

    public static function guess(string $name): self
    {
        return self::create($name)
            ->withBaseType(self::convertBaseType($name, ''));
    }

    public static function any(): self
    {
        return self::guess('anyType')
            ->withXmlTypeName('anyType')
            ->withXmlNamespace(Xmlns::xsd()->value())
            ->withMeta(
                static fn (TypeMeta $meta): TypeMeta => $meta
                    ->withIsSimple(true)
                    ->withIsNullable(true)
                    ->withIsNil(true)
            );
    }

    public static function void(): self
    {
        return self::guess('void')
            ->withBaseType('mixed')
            ->withMeta(
                static fn (TypeMeta $meta): TypeMeta => $meta
                    ->withIsSimple(true)
            );
    }

    /**
     * @return array<string, string>
     */
    public static function fetchAllKnownBaseTypeMappings(): array
    {
        return [
            'any' => 'mixed',
            'anytype' => 'mixed',
            'anyuri' => 'string',
            'anyxml' => 'string',
            'anysimpletype' => 'mixed',
            'array' => 'array',
            'base64binary' => 'string',
            'byte' => 'integer',
            'decimal' => 'float',
            'double' => 'float',
            'duration' => 'string',
            'entities' => 'string',
            'entity' => 'string',
            'gday' => 'string',
            'gmonth' => 'string',
            'gmonthday' => 'string',
            'gyear' => 'string',
            'gyearmonth' => 'string',
            'hexbinary' => 'string',
            'id' => 'string',
            'idref' => 'string',
            'idrefs' => 'string',
            'int' => 'integer',
            'language' => 'string',
            'long' => 'integer',
            'map' => 'array',
            'name' => 'string',
            'ncname' => 'string',
            'ncnames' => 'string',
            'negativeinteger' => 'integer',
            'nmtoken' => 'string',
            'nmtokens' => 'string',
            'nonnegativeinteger' => 'integer',
            'nonpositiveinteger' => 'integer',
            'normalizedstring' => 'string',
            'notation' => 'string',
            'positiveinteger' => 'integer',
            'qname' => 'string',
            'short' => 'integer',
            'struct' => 'object',
            'time' => 'string',
            'timeinstant' => 'string',
            'token' => 'string',
            'unknown' => 'mixed',
            'unsignedbyte' => 'integer',
            'unsignedint' => 'integer',
            'unsignedlong' => 'integer',
            'unsignedshort' => 'integer',
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBaseType(): string
    {
        return $this->baseType;
    }

    public function getBaseTypeOrFallbackToName(): string
    {
        return $this->baseType ?: $this->name;
    }

    public function getMemberTypes(): array
    {
        return $this->memberTypes;
    }

    public function getXmlNamespace(): string
    {
        return $this->xmlNamespace;
    }

    public function getXmlNamespaceName(): string
    {
        return $this->xmlNamespaceName;
    }

    public function getXmlTargetNamespace(): string
    {
        return $this->xmlTargetNamespace;
    }

    public function getXmlTargetNamespaceName(): string
    {
        return $this->xmlTargetNamespaceName;
    }

    public function getXmlTypeName(): string
    {
        return $this->xmlTypeName;
    }

    public function getXmlTargetNodeName(): string
    {
        return $this->xmlTargetNodeName;
    }

    public function withXmlNamespace(string $xmlNamespace): self
    {
        $new = clone $this;
        $new->xmlNamespace = $xmlNamespace;

        return $new;
    }

    public function withXmlNamespaceName(string $xmlNamespaceName): self
    {
        $new = clone $this;
        $new->xmlNamespaceName = $xmlNamespaceName;

        return $new;
    }

    public function withXmlTargetNamespace(string $xmlTargetNamespace): self
    {
        $new = clone $this;
        $new->xmlTargetNamespace = $xmlTargetNamespace;

        return $new;
    }

    public function withXmlTargetNamespaceName(string $xmlTargetNamespaceName): self
    {
        $new = clone $this;
        $new->xmlTargetNamespaceName = $xmlTargetNamespaceName;

        return $new;
    }

    public function withXmlTargetNodeName(string $xmlTargetNodeName): self
    {
        $new = clone $this;
        $new->xmlTargetNodeName = $xmlTargetNodeName;

        return $new;
    }

    public function withXmlTypeName(string $xmlTypeName): self
    {
        $new = clone $this;
        $new->xmlTypeName = $xmlTypeName;

        return $new;
    }

    public function withBaseType(string $baseType): self
    {
        $new = clone $this;
        $new->baseType = self::convertBaseType($baseType, $baseType);

        if ($new->baseType !== $baseType) {
            $new->memberTypes[] = $baseType;
        }

        return $new;
    }

    public function withMemberTypes(array $memberTypes): self
    {
        $new = clone $this;
        $new->memberTypes = array_values(array_filter($memberTypes));

        return $new;
    }

    /**
     * @param callable(TypeMeta): TypeMeta $metaProvider
     */
    public function withMeta(callable $metaProvider): self
    {
        $new = clone $this;
        $new->meta = $metaProvider($this->meta);

        return $new;
    }

    public function getMeta(): TypeMeta
    {
        return $this->meta;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function copy(string $name): self
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    private static function convertBaseType(string $baseType, string $fallback): string
    {
        return self::fetchAllKnownBaseTypeMappings()[strtolower($baseType)] ?? $fallback;
    }
}

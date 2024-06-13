<?php
declare(strict_types=1);

namespace Soap\Engine\Metadata\Model;

use Psl\Option\Option;
use Psl\Type\Exception\CoercionException;
use function Psl\Option\from_nullable;
use function Psl\Type\bool;
use function Psl\Type\mixed_dict;
use function Psl\Type\non_empty_string;
use function Psl\Type\optional;
use function Psl\Type\shape;
use function Psl\Type\string;
use function Psl\Type\vec;

final class TypeMeta
{
    /**
     * @var Option<bool>
     */
    private Option $isAbstract;

    /**
     * @var Option<string>
     */
    private Option $default;

    /**
     * @var Option<string>
     */
    private Option $docs;

    /**
     * @var Option<list<string>>
     */
    private Option $enums;

    /**
     * @var Option<array{type: non-empty-string, namespace: non-empty-string, isSimple ?: bool}>
     */
    private Option $extends;

    /**
     * @var Option<string>
     */
    private Option $fixed;

    /**
     * @var Option<bool>
     */
    private Option $isAlias;

    /**
     * @var Option<bool>
     */
    private Option $isAttribute;

    /**
     * Indicates the element value of an attribute-group.
     *
     * @var Option<bool>
     */
    private Option $isElementValue;

    /**
     * @var Option<bool>
     */
    private Option $isList;

    /**
     * @var Option<bool>
     */
    private Option $isRepeatingElement;

    /**
     * @var Option<bool>
     */
    private Option $isNullable;

    /**
     * @var Option<bool>
     */
    private Option $isElement;

    /**
     * @var Option<bool>
     */
    private Option $isSimple;

    /**
     * @var Option<bool>
     */
    private Option $isLocal;

    /**
     * @var Option<bool>
     */
    private Option $isNil;

    /**
     * @var Option<int>
     */
    private Option $minOccurs;

    /**
     * @var Option<int>
     */
    private Option $maxOccurs;

    /**
     * @var Option<array<array-key, mixed>>
     */
    private Option $restriction;

    /**
     * @var Option<list<array{type: non-empty-string, namespace: non-empty-string, isList: bool}>>
     */
    private Option $unions;

    /**
     * @var Option<string>
     */
    private Option $use;

    /**
     * @var Option<bool>
     */
    private Option $isQualified;

    /**
     * The soap-enc array-type information
     *
     * @var Option<array{type: non-empty-string, itemType: non-empty-string, namespace: non-empty-string}>
     */
    private Option $arrayType;

    /**
     * The name of the internal array nodes for soap-enc arrays
     *
     * @var Option<string>
     */
    private Option $arrayNodeName;


    public function __construct()
    {
        $none = Option::none();
        $this->isAbstract = $none;
        $this->default = $none;
        $this->docs = $none;
        $this->enums = $none;
        $this->extends = $none;
        $this->fixed = $none;
        $this->isAlias = $none;
        $this->isAttribute = $none;
        $this->isElementValue = $none;
        $this->isList = $none;
        $this->isRepeatingElement = $none;
        $this->isNullable = $none;
        $this->isSimple = $none;
        $this->isElement = $none;
        $this->isLocal = $none;
        $this->isNil = $none;
        $this->minOccurs = $none;
        $this->maxOccurs = $none;
        $this->restriction = $none;
        $this->unions = $none;
        $this->use = $none;
        $this->isQualified = $none;
        $this->arrayType = $none;
        $this->arrayNodeName = $none;
    }


    /**
     * @return Option<bool>
     */
    public function isAbstract(): Option
    {
        return $this->isAbstract;
    }

    public function withIsAbstract(?bool $abstract): self
    {
        $new = clone $this;
        $new->isAbstract = from_nullable($abstract);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function default(): Option
    {
        return $this->default;
    }

    public function withDefault(?string $default): self
    {
        $new = clone $this;
        $new->default = from_nullable($default);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function docs(): Option
    {
        return $this->docs;
    }

    public function withDocs(?string $docs): self
    {
        $new = clone $this;
        $new->docs = from_nullable($docs);

        return $new;
    }

    /**
     * @return Option<list<string>>
     */
    public function enums(): Option
    {
        return $this->enums;
    }

    /**
     * @throws CoercionException
     */
    public function withEnums(?array $enums): self
    {
        $new = clone $this;
        $new->enums = from_nullable(optional(vec(string()))->coerce($enums));

        return $new;
    }

    /**
     * @return Option<array{type: non-empty-string, namespace: non-empty-string, isSimple ?: bool}>
     */
    public function extends(): Option
    {
        return $this->extends;
    }

    /**
     * @throws CoercionException
     */
    public function withExtends(?array $extends): self
    {
        $new = clone $this;
        $new->extends = from_nullable(optional(
            shape([
                'type' => non_empty_string(),
                'namespace' => non_empty_string(),
                'isSimple' => optional(bool()),
            ], true)
        )->coerce($extends));

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function fixed(): Option
    {
        return $this->fixed;
    }

    public function withFixed(?string $fixed): self
    {
        $new = clone $this;
        $new->fixed = from_nullable($fixed);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isAlias(): Option
    {
        return $this->isAlias;
    }

    public function withIsAlias(?bool $isAlias): self
    {
        $new = clone $this;
        $new->isAlias = from_nullable($isAlias);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isAttribute(): Option
    {
        return $this->isAttribute;
    }

    public function withIsAttribute(?bool $isAttribute): self
    {
        $new = clone $this;
        $new->isAttribute = from_nullable($isAttribute);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isElementValue(): Option
    {
        return $this->isElementValue;
    }

    public function withIsElementValue(?bool $isElementValue): self
    {
        $new = clone $this;
        $new->isElementValue = from_nullable($isElementValue);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isList(): Option
    {
        return $this->isList;
    }

    public function withIsList(?bool $isList): self
    {
        $new = clone $this;
        $new->isList = from_nullable($isList);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isRepeatingElement(): Option
    {
        return $this->isRepeatingElement;
    }

    public function withIsRepeatingElement(?bool $isRepeatingElement): self
    {
        $new = clone $this;
        $new->isRepeatingElement = from_nullable($isRepeatingElement);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isNullable(): Option
    {
        return $this->isNullable;
    }

    public function withIsNullable(?bool $isNullable): self
    {
        $new = clone $this;
        $new->isNullable = from_nullable($isNullable);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isSimple(): Option
    {
        return $this->isSimple;
    }

    public function withIsSimple(?bool $isSimple): self
    {
        $new = clone $this;
        $new->isSimple = from_nullable($isSimple);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isElement(): Option
    {
        return $this->isElement;
    }

    public function withIsElement(?bool $isElement): self
    {
        $new = clone $this;
        $new->isElement = from_nullable($isElement);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isLocal(): Option
    {
        return $this->isLocal;
    }

    public function withIsLocal(?bool $local): self
    {
        $new = clone $this;
        $new->isLocal = from_nullable($local);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isNil(): Option
    {
        return $this->isNil;
    }

    public function withIsNil(?bool $nil): self
    {
        $new = clone $this;
        $new->isNil = from_nullable($nil);

        return $new;
    }

    /**
     * @return Option<int>
     */
    public function minOccurs(): Option
    {
        return $this->minOccurs;
    }

    public function withMinOccurs(?int $min): self
    {
        $new = clone $this;
        $new->minOccurs = from_nullable($min);

        return $new;
    }

    /**
     * @return Option<int>
     */
    public function maxOccurs(): Option
    {
        return $this->maxOccurs;
    }

    public function withMaxOccurs(?int $max): self
    {
        $new = clone $this;
        $new->maxOccurs = from_nullable($max);

        return $new;
    }

    /**
     * @return Option<array<array-key, mixed>>
     */
    public function restriction(): Option
    {
        return $this->restriction;
    }

    /**
     * @throws CoercionException
     */
    public function withRestriction(?array $restriction): self
    {
        $new = clone $this;
        $new->restriction = from_nullable(optional(mixed_dict())->coerce($restriction));

        return $new;
    }

    /**
     * @return Option<list<array{type: non-empty-string, namespace: non-empty-string, isList: bool}>>
     */
    public function unions(): Option
    {
        return $this->unions;
    }

    /**
     * @throws CoercionException
     */
    public function withUnions(?array $unions): self
    {
        $new = clone $this;
        $new->unions = from_nullable(optional(
            vec(
                shape([
                    'type' => non_empty_string(),
                    'namespace' => non_empty_string(),
                    'isList' => bool(),
                ], true)
            )
        )->coerce($unions));

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function use(): Option
    {
        return $this->use;
    }

    public function withUse(?string $use): self
    {
        $new = clone $this;
        $new->use = from_nullable($use);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isQualified(): Option
    {
        return $this->isQualified;
    }

    public function withIsQualified(?bool $qualified): self
    {
        $new = clone $this;
        $new->isQualified = from_nullable($qualified);

        return $new;
    }

    /**
     * @return Option<array{type: non-empty-string, itemType: non-empty-string, namespace: non-empty-string}>
     */
    public function arrayType(): Option
    {
        return $this->arrayType;
    }

    /**
     * @throws CoercionException
     */
    public function withArrayType(?array $arrayType): self
    {
        $new = clone $this;
        $new->arrayType = from_nullable(optional(
            shape([
                'type' => non_empty_string(),
                'itemType' => non_empty_string(),
                'namespace' => non_empty_string(),
            ], true)
        )->coerce($arrayType));

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function arrayNodeName(): Option
    {
        return $this->arrayNodeName;
    }

    public function withArrayNodeName(?string $arrayNodeName): self
    {
        $new = clone $this;
        $new->arrayNodeName = from_nullable($arrayNodeName);

        return $new;
    }
}

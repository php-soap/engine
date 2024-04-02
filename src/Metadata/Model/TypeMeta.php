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
     * @var bool|null
     */
    private $isAbstract;

    /**
     * @var string|null|null
     */
    private $default;

    /**
     * @var string|null
     */
    private $docs;

    /**
     * @var list<string>|null
     */
    private $enums;

    /**
     * @var array{type: non-empty-string, namespace: non-empty-string, isSimple ?: bool}|null
     */
    private $extends;

    /**
     * @var null|string|null
     */
    private $fixed;

    /**
     * @var bool|null
     */
    private $isAlias;

    /**
     * @var bool|null
     */
    private $isAttribute;

    /**
     * Indicates the element value of an attribute-group.
     *
     * @var bool|null
     */
    private $isElementValue;

    /**
     * @var bool|null
     */
    private $isList;

    /**
     * @var bool|null
     */
    private $isNullable;

    /**
     * @var bool|null
     */
    private $isElement;

    /**
     * @var bool|null
     */
    private $isSimple;

    /**
     * @var bool|null
     */
    private $isLocal;

    /**
     * @var bool|null
     */
    private $isNil;

    /**
     * @var int|null
     */
    private $minOccurs;

    /**
     * @var int|null
     */
    private $maxOccurs;

    /**
     * @var array<array-key, mixed>|null
     */
    private $restriction;

    /**
     * @var list<array{type: non-empty-string, namespace: non-empty-string, isList: bool}>|null
     */
    private $unions;

    /**
     * @var null|string
     */
    private $use;

    /**
     * @var bool|null
     */
    private $isQualified;

    /**
     * @return Option<bool>
     */
    public function isAbstract(): Option
    {
        return from_nullable($this->isAbstract);
    }

    public function withIsAbstract(?bool $abstract): self
    {
        $new = clone $this;
        $new->isAbstract = $abstract;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function default(): Option
    {
        return from_nullable($this->default);
    }

    public function withDefault(?string $default): self
    {
        $new = clone $this;
        $new->default = $default;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function docs(): Option
    {
        return from_nullable($this->docs);
    }

    public function withDocs(?string $docs): self
    {
        $new = clone $this;
        $new->docs = $docs;

        return $new;
    }

    /**
     * @return Option<list<string>>
     */
    public function enums(): Option
    {
        return from_nullable($this->enums);
    }

    /**
     * @throws CoercionException
     */
    public function withEnums(?array $enums): self
    {
        $new = clone $this;
        $new->enums = optional(vec(string()))->coerce($enums);

        return $new;
    }

    /**
     * @return Option<array{type: non-empty-string, namespace: non-empty-string, isSimple ?: bool}>
     */
    public function extends(): Option
    {
        return from_nullable($this->extends);
    }

    /**
     * @throws CoercionException
     */
    public function withExtends(?array $extends): self
    {
        $new = clone $this;
        $new->extends = optional(
            shape([
                'type' => non_empty_string(),
                'namespace' => non_empty_string(),
                'isSimple' => optional(bool()),
            ], true)
        )->coerce($extends);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function fixed(): Option
    {
        return from_nullable($this->fixed);
    }

    public function withFixed(?string $fixed): self
    {
        $new = clone $this;
        $new->fixed = $fixed;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isAlias(): Option
    {
        return from_nullable($this->isAlias);
    }

    public function withIsAlias(?bool $isAlias): self
    {
        $new = clone $this;
        $new->isAlias = $isAlias;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isAttribute(): Option
    {
        return from_nullable($this->isAttribute);
    }

    public function withIsAttribute(?bool $isAttribute): self
    {
        $new = clone $this;
        $new->isAttribute = $isAttribute;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isElementValue(): Option
    {
        return from_nullable($this->isElementValue);
    }

    public function withIsElementValue(?bool $isElementValue): self
    {
        $new = clone $this;
        $new->isElementValue = $isElementValue;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isList(): Option
    {
        return from_nullable($this->isList);
    }

    public function withIsList(?bool $isList): self
    {
        $new = clone $this;
        $new->isList = $isList;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isNullable(): Option
    {
        return from_nullable($this->isNullable);
    }

    public function withIsNullable(?bool $isNullable): self
    {
        $new = clone $this;
        $new->isNullable = $isNullable;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isSimple(): Option
    {
        return from_nullable($this->isSimple);
    }

    public function withIsSimple(?bool $isSimple): self
    {
        $new = clone $this;
        $new->isSimple = $isSimple;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isElement(): Option
    {
        return from_nullable($this->isElement);
    }

    public function withIsElement(?bool $isElement): self
    {
        $new = clone $this;
        $new->isElement = $isElement;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isLocal(): Option
    {
        return from_nullable($this->isLocal);
    }

    public function withIsLocal(?bool $local): self
    {
        $new = clone $this;
        $new->isLocal = $local;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isNil(): Option
    {
        return from_nullable($this->isNil);
    }

    public function withIsNil(?bool $nil): self
    {
        $new = clone $this;
        $new->isNil = $nil;

        return $new;
    }

    /**
     * @return Option<int>
     */
    public function minOccurs(): Option
    {
        return from_nullable($this->minOccurs);
    }

    public function withMinOccurs(?int $min): self
    {
        $new = clone $this;
        $new->minOccurs = $min;

        return $new;
    }

    /**
     * @return Option<int>
     */
    public function maxOccurs(): Option
    {
        return from_nullable($this->maxOccurs);
    }

    public function withMaxOccurs(?int $max): self
    {
        $new = clone $this;
        $new->maxOccurs = $max;

        return $new;
    }

    /**
     * @return Option<array<array-key, mixed>>
     */
    public function restriction(): Option
    {
        return from_nullable($this->restriction);
    }

    /**
     * @throws CoercionException
     */
    public function withRestriction(?array $restriction): self
    {
        $new = clone $this;
        $new->restriction = optional(mixed_dict())->coerce($restriction);

        return $new;
    }

    /**
     * @return Option<list<array{type: non-empty-string, namespace: non-empty-string, isList: bool}>>
     */
    public function unions(): Option
    {
        return from_nullable($this->unions);
    }

    /**
     * @throws CoercionException
     */
    public function withUnions(?array $unions): self
    {
        $new = clone $this;
        $new->unions = optional(
            vec(
                shape([
                    'type' => non_empty_string(),
                    'namespace' => non_empty_string(),
                    'isList' => bool(),
                ], true)
            )
        )->coerce($unions);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function use(): Option
    {
        return from_nullable($this->use);
    }

    public function withUse(?string $use): self
    {
        $new = clone $this;
        $new->use = $use;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isQualified(): Option
    {
        return from_nullable($this->isQualified);
    }

    public function withIsQualified(?bool $qualified): self
    {
        $new = clone $this;
        $new->isQualified = $qualified;

        return $new;
    }
}

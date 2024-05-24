<?php
declare(strict_types=1);

namespace Soap\Engine\Metadata\Model;

use Psl\Option\Option;
use function Psl\Option\from_nullable;

final class MethodMeta
{
    /**
     * @var string|null
     */
    private $docs;

    /**
     * @var string|null
     */
    private $action;

    /**
     * @var string|null
     */
    private $operationName;

    /**
     * @var string|null
     */
    private $location;

    /**
     * @var string|null
     */
    private $targetNamespace;

    /**
     * @var string|null
     */
    private $soapVersion;

    /**
     * @var string|null
     */
    private $transport;

    /**
     * @var string|null
     */
    private $bindingStyle;

    /**
     * @var string|null
     */
    private $inputBindingUsage;

    /**
     * @var string|null
     */
    private $inputNamespace;

    /**
     * @var string|null
     */
    private $inputEncodingStyle;

    /**
     * @var string|null
     */
    private $outputBindingUsage;

    /**
     * @var string|null
     */
    private $outputNamespace;

    /**
     * @var string|null
     */
    private $outputEncodingStyle;

    /**
     * @var bool|null
     */
    private $isOneWay;

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
     * @return Option<string>
     */
    public function action(): Option
    {
        return from_nullable($this->action);
    }

    public function withAction(?string $action): self
    {
        $new = clone $this;
        $new->action = $action;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function operationName(): Option
    {
        return from_nullable($this->operationName);
    }

    public function withOperationName(?string $operationName): self
    {
        $new = clone $this;
        $new->operationName = $operationName;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function location(): Option
    {
        return from_nullable($this->location);
    }

    public function withlocation(?string $location): self
    {
        $new = clone $this;
        $new->location = $location;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function targetNamespace(): Option
    {
        return from_nullable($this->targetNamespace);
    }

    public function withTargetNamespace(?string $targetNamespace): self
    {
        $new = clone $this;
        $new->targetNamespace = $targetNamespace;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function soapVersion(): Option
    {
        return from_nullable($this->soapVersion);
    }

    public function withSoapVersion(?string $soapVersion): self
    {
        $new = clone $this;
        $new->soapVersion = $soapVersion;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function transport(): Option
    {
        return from_nullable($this->transport);
    }

    public function withTransport(?string $transport): self
    {
        $new = clone $this;
        $new->transport = $transport;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function bindingStyle(): Option
    {
        return from_nullable($this->bindingStyle);
    }

    public function withBindingStyle(?string $bindingStyle): self
    {
        $new = clone $this;
        $new->bindingStyle = $bindingStyle;

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isOneWay(): Option
    {
        return from_nullable($this->isOneWay);
    }

    public function withIsOneWay(?bool $isOneWay): self
    {
        $new = clone $this;
        $new->isOneWay = $isOneWay;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function inputBindingUsage(): Option
    {
        return from_nullable($this->inputBindingUsage);
    }

    public function withInputBindingUsage(?string $inputBindingUsage): self
    {
        $new = clone $this;
        $new->inputBindingUsage = $inputBindingUsage;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function inputNamespace(): Option
    {
        return from_nullable($this->inputNamespace);
    }

    public function withInputNamespace(?string $inputNamespace): self
    {
        $new = clone $this;
        $new->inputNamespace = $inputNamespace;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function inputEncodingStyle(): Option
    {
        return from_nullable($this->inputEncodingStyle);
    }

    public function withInputEncodingStyle(?string $inputEncodingStyle): self
    {
        $new = clone $this;
        $new->inputEncodingStyle = $inputEncodingStyle;

        return $new;
    }


    /**
     * @return Option<string>
     */
    public function outputBindingUsage(): Option
    {
        return from_nullable($this->outputBindingUsage);
    }

    public function withOutputBindingUsage(?string $outputBindingUsage): self
    {
        $new = clone $this;
        $new->outputBindingUsage = $outputBindingUsage;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function outputNamespace(): Option
    {
        return from_nullable($this->outputNamespace);
    }

    public function withOutputNamespace(?string $outputNamespace): self
    {
        $new = clone $this;
        $new->outputNamespace = $outputNamespace;

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function outputEncodingStyle(): Option
    {
        return from_nullable($this->outputEncodingStyle);
    }

    public function withOutputEncodingStyle(?string $outputEncodingStyle): self
    {
        $new = clone $this;
        $new->outputEncodingStyle = $outputEncodingStyle;

        return $new;
    }
}

<?php
declare(strict_types=1);

namespace Soap\Engine\Metadata\Model;

use Psl\Option\Option;
use function Psl\Option\from_nullable;

final class MethodMeta
{
    /**
     * @var Option<string>
     */
    private Option $docs;

    /**
     * @var Option<string>
     */
    private Option $action;

    /**
     * @var Option<string>
     */
    private Option $operationName;

    /**
     * @var Option<string>
     */
    private Option $location;

    /**
     * @var Option<string>
     */
    private Option $targetNamespace;

    /**
     * @var Option<string>
     */
    private Option $soapVersion;

    /**
     * @var Option<string>
     */
    private Option $transport;

    /**
     * @var Option<string>
     */
    private Option $bindingStyle;

    /**
     * @var Option<string>
     */
    private Option $inputBindingUsage;

    /**
     * @var Option<string>
     */
    private Option $inputNamespace;

    /**
     * @var Option<string>
     */
    private Option $inputEncodingStyle;

    /**
     * @var Option<string>
     */
    private Option $outputBindingUsage;

    /**
     * @var Option<string>
     */
    private Option $outputNamespace;

    /**
     * @var Option<string>
     */
    private Option $outputEncodingStyle;

    /**
     * @var Option<bool>
     */
    private Option $isOneWay;

    public function __construct()
    {
        $none = Option::none();

        $this->docs = $none;
        $this->action = $none;
        $this->operationName = $none;
        $this->location = $none;
        $this->targetNamespace = $none;
        $this->soapVersion = $none;
        $this->transport = $none;
        $this->bindingStyle = $none;
        $this->isOneWay = $none;
        $this->inputBindingUsage = $none;
        $this->inputNamespace = $none;
        $this->inputEncodingStyle = $none;
        $this->outputBindingUsage = $none;
        $this->outputNamespace = $none;
        $this->outputEncodingStyle = $none;
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
     * @return Option<string>
     */
    public function action(): Option
    {
        return $this->action;
    }

    public function withAction(?string $action): self
    {
        $new = clone $this;
        $new->action = from_nullable($action);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function operationName(): Option
    {
        return $this->operationName;
    }

    public function withOperationName(?string $operationName): self
    {
        $new = clone $this;
        $new->operationName = from_nullable($operationName);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function location(): Option
    {
        return $this->location;
    }

    public function withlocation(?string $location): self
    {
        $new = clone $this;
        $new->location = from_nullable($location);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function targetNamespace(): Option
    {
        return $this->targetNamespace;
    }

    public function withTargetNamespace(?string $targetNamespace): self
    {
        $new = clone $this;
        $new->targetNamespace = from_nullable($targetNamespace);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function soapVersion(): Option
    {
        return $this->soapVersion;
    }

    public function withSoapVersion(?string $soapVersion): self
    {
        $new = clone $this;
        $new->soapVersion = from_nullable($soapVersion);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function transport(): Option
    {
        return $this->transport;
    }

    public function withTransport(?string $transport): self
    {
        $new = clone $this;
        $new->transport = from_nullable($transport);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function bindingStyle(): Option
    {
        return $this->bindingStyle;
    }

    public function withBindingStyle(?string $bindingStyle): self
    {
        $new = clone $this;
        $new->bindingStyle = from_nullable($bindingStyle);

        return $new;
    }

    /**
     * @return Option<bool>
     */
    public function isOneWay(): Option
    {
        return $this->isOneWay;
    }

    public function withIsOneWay(?bool $isOneWay): self
    {
        $new = clone $this;
        $new->isOneWay = from_nullable($isOneWay);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function inputBindingUsage(): Option
    {
        return $this->inputBindingUsage;
    }

    public function withInputBindingUsage(?string $inputBindingUsage): self
    {
        $new = clone $this;
        $new->inputBindingUsage = from_nullable($inputBindingUsage);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function inputNamespace(): Option
    {
        return $this->inputNamespace;
    }

    public function withInputNamespace(?string $inputNamespace): self
    {
        $new = clone $this;
        $new->inputNamespace = from_nullable($inputNamespace);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function inputEncodingStyle(): Option
    {
        return $this->inputEncodingStyle;
    }

    public function withInputEncodingStyle(?string $inputEncodingStyle): self
    {
        $new = clone $this;
        $new->inputEncodingStyle = from_nullable($inputEncodingStyle);

        return $new;
    }


    /**
     * @return Option<string>
     */
    public function outputBindingUsage(): Option
    {
        return $this->outputBindingUsage;
    }

    public function withOutputBindingUsage(?string $outputBindingUsage): self
    {
        $new = clone $this;
        $new->outputBindingUsage = from_nullable($outputBindingUsage);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function outputNamespace(): Option
    {
        return $this->outputNamespace;
    }

    public function withOutputNamespace(?string $outputNamespace): self
    {
        $new = clone $this;
        $new->outputNamespace = from_nullable($outputNamespace);

        return $new;
    }

    /**
     * @return Option<string>
     */
    public function outputEncodingStyle(): Option
    {
        return $this->outputEncodingStyle;
    }

    public function withOutputEncodingStyle(?string $outputEncodingStyle): self
    {
        $new = clone $this;
        $new->outputEncodingStyle = from_nullable($outputEncodingStyle);

        return $new;
    }
}

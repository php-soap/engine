<?php
declare(strict_types=1);

namespace SoapTest\Engine\Metadata\Collection;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Model\MethodMeta;

final class MethodMetaTest extends TestCase
{
    public function test_it_contains_a_docs(): void
    {
        $value = 'docs';
        $meta = (new MethodMeta())->withDocs($value);
        static::assertSame($value, $meta->docs()->unwrapOr(null));
    }

    public function test_it_contains_a_action(): void
    {
        $value = 'action';
        $meta = (new MethodMeta())->withAction($value);
        static::assertSame($value, $meta->action()->unwrapOr(null));
    }

    public function test_it_contains_a_location(): void
    {
        $value = 'https://location';
        $meta = (new MethodMeta())->withLocation($value);
        static::assertSame($value, $meta->location()->unwrapOr(null));
    }

    public function test_it_contains_a_soap_version(): void
    {
        $value = 'http://schemas.xmlsoap.org/wsdl/soap12/';
        $meta = (new MethodMeta())->withSoapVersion($value);
        static::assertSame($value, $meta->soapVersion()->unwrapOr(null));
    }

    public function test_it_contains_a_transport(): void
    {
        $value = 'http://schemas.xmlsoap.org/soap/http';
        $meta = (new MethodMeta())->withTransport($value);
        static::assertSame($value, $meta->transport()->unwrapOr(null));
    }

    public function test_it_contains_a_binding_style(): void
    {
        $value = 'document';
        $meta = (new MethodMeta())->withBindingStyle($value);
        static::assertSame($value, $meta->bindingStyle()->unwrapOr(null));
    }

    public function test_it_contains_a_input_binding_usage(): void
    {
        $value = 'literal';
        $meta = (new MethodMeta())->withInputBindingUsage($value);
        static::assertSame($value, $meta->inputBindingUsage()->unwrapOr(null));
    }

    public function test_it_contains_a_output_binding_usage(): void
    {
        $value = 'literal';
        $meta = (new MethodMeta())->withOutputBindingUsage($value);
        static::assertSame($value, $meta->outputBindingUsage()->unwrapOr(null));
    }

    public function test_it_contains_a_is_one_way(): void
    {
        $value = true;
        $meta = (new MethodMeta())->withIsOneWay($value);
        static::assertSame($value, $meta->isOneWay()->unwrapOr(null));
    }
}

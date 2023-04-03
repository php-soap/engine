<?php
declare(strict_types=1);

namespace SoapTest\Engine;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Decoder;
use Soap\Engine\Encoder;
use Soap\Engine\Exception\DriverException;
use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Engine\PartialDriver;
use SoapTest\Engine\Fixtures\DummyInMemoryMetadata;

final class PartialDriverTest extends TestCase
{
    public function test_it_can_encode(): void
    {
        $encoder = $this->createStub(Encoder::class);
        $encoder->method('encode')->willReturn(
            $request = new SoapRequest('', '', '', SoapRequest::SOAP_1_1)
        );

        $driver = new PartialDriver(encoder: $encoder);
        static::assertEquals($request, $driver->encode('method', []));
    }

    public function test_it_will_not_encode(): void
    {
        $this->expectException(DriverException::class);

        $driver = new PartialDriver();
        $driver->encode('method', []);
    }

    public function test_it_can_decode(): void
    {
        $decoder = $this->createStub(Decoder::class);
        $decoder->method('decode')->willReturn([]);
        $driver = new PartialDriver(decoder: $decoder);

        static::assertEquals([], $driver->decode('method', new SoapResponse('payload')));
    }

    public function test_it_will_not_decode(): void
    {
        $this->expectException(DriverException::class);

        $driver = new PartialDriver();
        $driver->decode('method', new SoapResponse('payload'));
    }

    public function test_it_can_provide_metadata(): void
    {
        $metadata = new DummyInMemoryMetadata();
        $driver = new PartialDriver(metadata: $metadata);

        static::assertEquals($metadata, $driver->getMetadata());
    }

    public function test_it_will_not_provide_metadata(): void
    {
        $this->expectException(DriverException::class);

        $driver = new PartialDriver();
        $driver->getMetadata();
    }
}

<?php
declare(strict_types=1);

namespace SoapTest\Engine;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Decoder;
use Soap\Engine\Encoder;
use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\HttpBinding\SoapResponse;
use Soap\Engine\SimpleDriver;
use SoapTest\Engine\Fixtures\DummyInMemoryMetadata;

final class SimpleDriverTest extends TestCase
{
    private SimpleDriver $driver;
    private SoapRequest $request;

    protected function setUp(): void
    {
        $encoder = $this->createStub(Encoder::class);
        $encoder->method('encode')->willReturn(
            $this->request = new SoapRequest('', '', '', SoapRequest::SOAP_1_1)
        );
        $decoder = $this->createStub(Decoder::class);
        $decoder->method('decode')->willReturn([]);
        $metadata = new DummyInMemoryMetadata();

        $this->driver = new SimpleDriver($encoder, $decoder, $metadata);
    }

    public function test_it_can_encode(): void
    {
        static::assertEquals($this->request, $this->driver->encode('method', []));
    }

    public function test_it_can_decode(): void
    {
        static::assertEquals([], $this->driver->decode('method', new SoapResponse('payload')));
    }

    public function test_it_can_provide_metadata(): void
    {
        static::assertEquals(new DummyInMemoryMetadata(), $this->driver->getMetadata());
    }
}

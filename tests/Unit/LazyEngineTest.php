<?php

declare(strict_types=1);

namespace SoapTest\Engine;

use PHPUnit\Framework\TestCase;
use Soap\Engine\LazyEngine;
use Soap\Engine\Metadata\Metadata;
use Soap\Engine\SimpleEngine;
use Soap\Engine\Transport;
use SoapTest\Engine\Fixtures\DummyTransport;
use SoapTest\Engine\Fixtures\InmemoryMetadata;
use SoapTest\Engine\Fixtures\PassThroughDriver;

class LazyEngineTest extends TestCase
{
    private LazyEngine $engine;
    private Metadata $metadata;
    private Transport $transport;

    protected function setUp(): void
    {
        $this->metadata = new InmemoryMetadata();
        $this->transport = new DummyTransport('response');

        $this->engine = new LazyEngine(
            fn () => new SimpleEngine(
                new PassThroughDriver(
                    'request',
                    ['object'],
                    $this->metadata
                ),
                $this->transport
            )
        );
    }

    public function testItCanRequestSoap()
    {
        $response = $this->engine->request('hello', ['world']);
        self::assertSame(['object'], $response);
    }

    public function testItCanLoadMetadata()
    {
        self::assertSame($this->metadata, $this->engine->getMetadata());
    }

    public function testIt_does_not_load_until_needed(): void
    {
        $this->expectNotToPerformAssertions();

        new LazyEngine(function () {
            throw new \RuntimeException('You shall not pass!');
        });
    }
}

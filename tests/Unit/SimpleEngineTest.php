<?php

declare(strict_types=1);

namespace SoapTest\Engine;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Metadata\Metadata;
use Soap\Engine\SimpleEngine;
use Soap\Engine\Transport;
use SoapTest\Engine\Fixtures\DummyTransport;
use SoapTest\Engine\Fixtures\InmemoryMetadata;
use SoapTest\Engine\Fixtures\PassThroughDriver;

class SimpleEngineTest extends TestCase
{
    private SimpleEngine $engine;
    private Metadata $metadata;
    private Transport $transport;

    protected function setUp(): void
    {
        $this->engine = new SimpleEngine(
            new PassThroughDriver(
                'request',
                ['object'],
                $this->metadata = new InmemoryMetadata()
            ),
            $this->transport = new DummyTransport('response')
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
}

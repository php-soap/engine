<?php

declare(strict_types=1);

namespace SoapTest\Engine;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Soap\Engine\LazyEngine;
use Soap\Engine\Metadata\Metadata;
use Soap\Engine\SimpleEngine;
use Soap\Engine\Transport;
use SoapTest\Engine\Fixtures\DummyTransport;
use SoapTest\Engine\Fixtures\InmemoryMetadata;
use SoapTest\Engine\Fixtures\PassThroughDriver;

final class LazyEngineTest extends TestCase
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

    public function test_it_can_request_soap()
    {
        $response = $this->engine->request('hello', ['world']);
        static::assertSame(['object'], $response);
    }

    public function test_it_can_load_metadata()
    {
        static::assertSame($this->metadata, $this->engine->getMetadata());
    }

    public function test_it_does_not_load_until_needed(): void
    {
        $this->expectNotToPerformAssertions();

        new LazyEngine(static function () {
            throw new RuntimeException('You shall not pass!');
        });
    }
}

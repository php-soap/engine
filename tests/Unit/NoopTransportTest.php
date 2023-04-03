<?php
declare(strict_types=1);

namespace SoapTest\Engine;

use PHPUnit\Framework\TestCase;
use Soap\Engine\Exception\TransportException;
use Soap\Engine\HttpBinding\SoapRequest;
use Soap\Engine\NoopTransport;

final class NoopTransportTest extends TestCase
{
    public function test_it_doesnt_transport(): void
    {
        $this->expectException(TransportException::class);

        $transport = new NoopTransport();
        $transport->request(new SoapRequest('', '', '', SoapRequest::SOAP_1_1));
    }
}

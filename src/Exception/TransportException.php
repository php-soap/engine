<?php
declare(strict_types=1);

namespace Soap\Engine\Exception;

final class TransportException extends RuntimeException
{
    public static function noop(): self
    {
        return new self(
            'The transport you are using is configured not to handle any requests. Please specify a different SOAP transport!'
        );
    }
}

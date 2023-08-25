<?php
declare(strict_types=1);

namespace Soap\Engine\Exception;

final class DriverException extends RuntimeException
{
    public static function partialException(string $class): self
    {
        return new self(
            'The partial driver you are using, does not implement '.$class.'. Please use a different SOAP driver.'
        );
    }
}

<?php

namespace Marlonbasten\OhdearCroncheckLaravel\Exception;

use Exception;
use Throwable;

class ProvidedClassIsNotACommandException extends Exception
{
    public function __construct(
        string $message = 'The provided class is not a command.',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}

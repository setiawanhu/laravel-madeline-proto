<?php

namespace Hu\MadelineProto\Exceptions;

use Exception;
use Throwable;

class SignUpNeededException extends Exception
{
    public function __construct($message = "Sign up needed", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

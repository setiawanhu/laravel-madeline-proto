<?php

namespace Hu\MadelineProto\Exceptions;

use Exception;
use Hu\MadelineProto\TelegramObject;
use Throwable;

class NeedTwoFactorAuthException extends Exception
{
    /**
     * @var TelegramObject
     */
    public $account;

    public function __construct(TelegramObject $account, $message = "User enabled 2FA, more steps needed", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->account = $account;
    }
}

<?php

namespace Hu\MadelineProto\Facades;

use Illuminate\Support\Facades\Facade;
use \Hu\MadelineProto\MadelineProto;

/**
 * Facade for MadelineProtoFactory class.
 *
 * @package Hu\MadelineProto\Facades
 *
 * @method static MadelineProto get(mixed $session, array $config = null)
 * @method static MadelineProto make(string $sessionFile, array $config)
 */
class Factory extends Facade
{
    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor()
    {
        return 'madeline-proto-factory';
    }
}

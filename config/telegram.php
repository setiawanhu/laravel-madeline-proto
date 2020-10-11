<?php

use danog\MadelineProto\Logger;

return [

    /*
    |--------------------------------------------------------------------------
    | Madeline Proto Sessions
    |--------------------------------------------------------------------------
    |
    | To store information about an account session and avoid re-logging in, serialization must be done.
    | A MadelineProto session is automatically serialized every
    | settings['serialization']['serialization_interval'] seconds (by default 30 seconds),
    | and on shutdown. If the scripts shutdowns normally (without ctrl+c or fatal errors/exceptions), the
    | session will also be serialized automatically.
    |
    | Types: "single", "multiple"
    |
    */

    'sessions' => [

        'single' => [
            'session_file' => env('MP_SESSION_FILE', 'session.madeline'),
        ],

        'multiple' => [
            'table' => 'telegram_sessions'
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Madeline Proto Settings
    |--------------------------------------------------------------------------
    |
    | An array that contains some other arrays, which are the settings for
    | a specific MadelineProto function.
    |
    | Please see documentations for more details.
    |
    */

    'settings' => [

        'logger' => [

            'logger' => Logger::FILE_LOGGER,

            'logger_param' => env('MP_LOGGER_PATH', storage_path('logs/madeline_proto_' . date('dmY') . '.log')),

        ],

        'app_info' => [

            'api_id' => env('MP_TELEGRAM_API_ID', ''),

            'api_hash' => env('MP_TELEGRAM_API_HASH', ''),

        ],
    ],
];

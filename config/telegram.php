<?php

use danog\MadelineProto\Logger;

return [

    /*
    |--------------------------------------------------------------------------
    | Madeline Proto Session File Location
    |--------------------------------------------------------------------------
    |
    | To store information about an account session and avoid re-logging in, serialization must be done.
    | A MadelineProto session is automatically serialized every
    | settings['serialization']['serialization_interval'] seconds (by default 30 seconds),
    | and on shutdown. If the scripts shutdowns normally (without ctrl+c or fatal errors/exceptions), the
    | session will also be serialized automatically.
    |
    */

    'session_file' => env('MADELINE_PROTO_SESSION_FILE', 'session.madeline'),

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

            'logger_param' => storage_path('logs/madeline-proto.log'),

        ],

        'app_info' => [

            'api_id' => env('TELEGRAM_API_ID'),

            'api_hash' => env('TELEGRAM_API_HASH'),

        ],
    ],
];

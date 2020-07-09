# Laravel Madeline Proto

A third party Telegram client library [danog/MadelineProto](https://github.com/danog/MadelineProto) wrapper for Laravel.

# Usage

Add the laravel-madeline-proto to the project dependency:

```shell script
composer require setiawanhu/laravel-madeline-proto
```

Then publish the telegram config file:

```shell script
php artisan vendor:publish --provider="Hu\MadelineProto\MadelineProtoServiceProvider"
```

Set up the Telegram API key by providing env variables:

```dotenv
MP_TELEGRAM_API_ID=... //your telegram api id here
MP_TELEGRAM_API_HASH=... //your telegram api hash here
```

To do a login: 

* call `MadelineProto::phoneLogin(string $phone)` method to send the phone code.

* call `MadelineProto::completePhoneLogin(string $code)` to complete the phone login by providing the phone code sent by the telegram.

* You're logged in! Now you can use the `Messages` api.
 

# Notes

* This wrapper package is still not wrapping all the apis yet, I'm still focusing on wrapping the messages api.

* If you can't find the method that you want in Messages facade or need to use the default danog/MadelineProto api, you might want to use `MadelineProto::getClient()` facade method. It will return `danog\MadelineProto\API` object where you can call all the method provided by the [danog/MadelineProto](https://github.com/danog/MadelineProto) library.

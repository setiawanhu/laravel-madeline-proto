<?php

namespace Hu\MadelineProto;

use danog\MadelineProto\API as Client;
use Hu\MadelineProto\Commands\TelegramAccountLoginCommand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class MadelineProtoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('madeline-proto-client', function () {
            return new Client(config('telegram.session_file'), config('telegram.settings'));
        });
        $this->app->alias('madeline-proto-client', Client::class);

        $this->app->bind('madeline-proto', function (Application $app) {
            return new MadelineProto($app->make('madeline-proto-client'));
        });
        $this->app->alias('madeline-proto', MadelineProto::class);

        $this->app->bind('madeline-proto-messages', function (Application $app) {
            $client = $app->make('madeline-proto-client');

            return new ClientMessages($client->messages);
        });
        $this->app->alias('madeline-proto-messages', ClientMessages::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();

            $this->publishes([
                __DIR__ . '/../config/telegram.php' => config_path('telegram.php')
            ]);
        }
    }

    /**
     * Register laravel madeline proton login prompt command.
     *
     * @return void
     */
    public function registerCommands()
    {
        $this->commands([
            TelegramAccountLoginCommand::class
        ]);
    }

    /**
     * @inheritDoc
     */
    public function provides()
    {
        return [
            'madeline-proto',
            'madeline-proto-client'
        ];
    }
}

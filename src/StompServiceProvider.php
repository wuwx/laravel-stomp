<?php

namespace Wuwx\LaravelStomp;

use Illuminate\Support\ServiceProvider;

class StompServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('stomp.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'stomp'
        );

        $this->app->singleton('stomp', function ($app) {
            return new StompManager(config('stomp'));
        });
    }

}

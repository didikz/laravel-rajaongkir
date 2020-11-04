<?php

namespace Didikz\LaravelRajaongkir;

use Illuminate\Support\ServiceProvider;

class LaravelRajaongkirServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-rajaongkir.php' => config_path('laravel-rajaongkir.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-rajaongkir.php', 'laravel-rajaongkir');
    }
}

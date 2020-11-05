<?php

namespace Didikz\LaravelRajaongkir;

use Illuminate\Support\ServiceProvider;

class LaravelRajaongkirServiceProvider extends ServiceProvider
{
    /**
     * Boot provider
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-rajaongkir.php' => config_path('laravel-rajaongkir.php'),
            ], 'config');
        }
    }

    /**
     * Register application
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-rajaongkir.php', 'laravel-rajaongkir');

        // binding facade
        $this->app->bind('location', function () {
            return new Location(config('laravel-rajaongkir.api_key'));
        });

        $this->app->bind('cost', function () {
            return new Cost(config('laravel-rajaongkir.api_key'));
        });
    }
}

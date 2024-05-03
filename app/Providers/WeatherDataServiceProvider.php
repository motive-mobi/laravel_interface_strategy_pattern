<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Exception;

use App\Interfaces\WeatherDataInterface;

use App\Services\WeatherbitIoApi;
use App\Services\WeatherApi;

class WeatherDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WeatherDataInterface::class, function ($app) {
            $driver = config('services.weather-data-driver');

            if ($driver === 'weatherbit') {
                return new WeatherbitIoApi();
            }

            if ($driver === 'weather-api') {
                return new WeatherApi();
            }

            throw new Exception('Weather data driver not found');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Interfaces;

interface WeatherDataInterface
{
    public function getWeatherData(string $lat, string $lon): array;
}
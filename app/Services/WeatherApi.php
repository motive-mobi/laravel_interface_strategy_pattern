<?php

namespace App\Services;

use App\Interfaces\WeatherDataInterface;

class WeatherApi implements WeatherDataInterface
{
    public function getWeatherData(string $lat, string $lon): array
    {
        // Request data from https://www.weatherapi.com
        $data = [
            "wind_mph"      => 23.0,
            "wind_kph"      => 37.1,
            "wind_degree"   => 270,
            "wind_dir"      => "W",
            "pressure_mb"   => 1010.0,
            "pressure_in"   => 29.83,
            "precip_mm"     => 0.0,
            "precip_in"     => 0.0,
            "humidity"      => 58,
            "cloud"         => 75,
            "feelslike_c"   => 8.1,
            "feelslike_f"   => 46.5,
            "vis_km"        => 10.0,
            "vis_miles"     => 6.0,
            "uv"            => 2.0,
            "gust_mph"      => 22.4,
            "gust_kph"      => 36.0
        ];

        return $data;
    }
}
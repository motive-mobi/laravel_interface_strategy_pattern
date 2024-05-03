<?php

namespace App\Services;

use App\Interfaces\WeatherDataInterface;

class WeatherbitIoApi implements WeatherDataInterface
{
    public function getWeatherData(string $lat, string $lon): array
    {
        // Request data from https://www.weatherbit.io
        $data = [
            "wind_cdir"         => "NE",
            "rh"                => 59,
            "pod"               => "d",
            "lon"               => -78.63861,
            "pres"              => 1006.6,
            "timezone"          => "America\/New_York",
            "ob_time"           => "2017-08-28 16:45",
            "country_code"      => "US",
            "clouds"            => 75,
            "vis"               => 10,
            "wind_spd"          => 6.17,
            "gust"              => 8,
            "wind_cdir_full"    => "northeast",
            "app_temp"          => 24.25,
            "state_code"        => "NC",
            "ts"                => 1503936000,
            "h_angle"           => 0,
            "dewpt"             => 15.65
        ];
        return $data;
    }
}
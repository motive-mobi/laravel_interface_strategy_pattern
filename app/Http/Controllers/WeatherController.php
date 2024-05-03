<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Interfaces\WeatherDataInterface;

class WeatherController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        WeatherDataInterface $weatherDataInterface
    ): JsonResponse {
        $data = $weatherDataInterface->getWeatherData(
            request()->lat,
            request()->lon,
        );

        return response()->json(['data' => $data]);
    }
}

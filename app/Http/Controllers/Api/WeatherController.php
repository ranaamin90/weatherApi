<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weather(Request $request){
        try {
            $city = $request->get('city');
            $weather = new LaravelOWM();
            $current_weather = $weather->getCurrentWeather($city);

            return response()->json([
                'status' => 200,
                'data' => $current_weather
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 500,
                'error' => $ex->getMessage(),
            ]);
        }
    }
}

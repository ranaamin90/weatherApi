<?php

namespace App\Http\Controllers;

use Gmopx\LaravelOWM\LaravelOWM;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('weather');
    }

    public function weather(Request $request){

        $city = $request->get('city');
        $weather = new LaravelOWM();
        $current_weather = $weather->getCurrentWeather($city);

        return response()->json($current_weather);
    }
}

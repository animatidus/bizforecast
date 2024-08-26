<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showForecast(Request $request)
    {
        $validated = $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
        ]);

        try {
            $forecast = $this->weatherService->getForecast($validated['lat'], $validated['lon']);
            return response()->json($forecast);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

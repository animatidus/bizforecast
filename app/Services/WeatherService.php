<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = env('OPENWEATHER_BASE_URL');
        $this->apiKey = env('OPENWEATHER_API_KEY');
    }

    public function getForecast($lat, $lon)
    {
        try {
            $response = Http::get("{$this->baseUrl}/forecast", [
                'lat' => $lat,
                'lon' => $lon,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]);

            if ($response->failed()) {
                $this->handleError($response);
            }
            return $response->json();

        }catch (\Exception $e) {
            Log::error('Error in WeatherService: ' . $e->getMessage());
            throw $e;
        }
    }

    protected function handleError($response)
    {
        $status = $response->status();
        $body = $response->body();

        if ($status === 404) {
            throw new \Exception('Weather API endpoint not found.');
        } elseif ($status === 401) {
            throw new \Exception('Unauthorized access. Check your API key.');
        } else {
            Log::error('Weather API request failed', [
                'status' => $status,
                'body' => $body
            ]);
            throw new \Exception('Weather API request failed with status ' . $status);
        }
    }
}

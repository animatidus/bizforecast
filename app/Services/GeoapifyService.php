<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeoapifyService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('GEOAPIFY_API_KEY');
        $this->baseUrl = env('GEOAPIFY_BASE_URL');
    }

    public function geocode($address)
    {
        try{
            $response = Http::get($this->baseUrl, [
                'text' => $address,
                'apiKey' => $this->apiKey
            ]);

            if ($response->failed()) {
                $this->handleError($response);
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Error in GeoapifyService: ' . $e->getMessage());
            throw $e;
        }
    }
    protected function handleError($response)
    {
        $status = $response->status();
        $body = $response->body();

        if ($status === 404) {
            throw new \Exception('Geoapify API endpoint not found.');
        } elseif ($status === 401) {
            throw new \Exception('Unauthorized access. Check your API key.');
        } else {
            Log::error('Geoapify API request failed', [
                'status' => $status,
                'body' => $body
            ]);
            throw new \Exception('Geoapify API request failed with status ' . $status);
        }
    }
}

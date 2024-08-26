<?php

namespace App\Http\Controllers;

use App\Services\GeoapifyService;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    protected $geoapifyService;

    public function __construct(GeoapifyService $geoapifyService)
    {
        $this->geoapifyService = $geoapifyService;
    }

    public function getCoordinates(Request $request)
    {
        $address = $request->input('address');
        $result = $this->geoapifyService->geocode($address);

        if (isset($result['features'][0]['geometry']['coordinates'])) {
            $coordinates = $result['features'][0]['geometry']['coordinates'];
            return response()->json([
                'longitude' => $coordinates[0],
                'latitude' => $coordinates[1],
            ]);
        } else {
            return response()->json(['error' => 'Location not found'], 404);
        }
    }
}

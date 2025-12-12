<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DistanceController extends Controller
{
    public function calculateDistance(Request $request)
    {
        $request->validate([
            "from" => "required|string",
            "to" => "required|string",
        ]);

        $apiKey = env("GOOGLE_MAPS_API_KEY");

        $payload = [
            "origin" => [
                "address" => $request->from
            ],
            "destination" => [
                "address" => $request->to
            ],
            "travelMode" => "DRIVE",
            "routingPreference" => "TRAFFIC_AWARE",
            "computeAlternativeRoutes" => false,
            "routeModifiers" => [
                "avoidTolls" => false,
                "avoidHighways" => false,
                "avoidFerries" => false,
            ],
            "languageCode" => "en-US",
            "units" => "METRIC"
        ];

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "X-Goog-Api-Key" => $apiKey,
            "X-Goog-FieldMask" => "routes.distanceMeters,routes.duration,routes.legs"
        ])->post(
            "https://routes.googleapis.com/directions/v2:computeRoutes",
            $payload
        );

        $data = $response->json();

        if (!$response->ok() || empty($data["routes"])) {
            return response()->json([
                "success" => false,
                "message" => "No route found. Please check location names."
            ], 400);
        }

        $route = $data["routes"][0];

        //dd( $route["duration"]);
        return response()->json([
            "success" => true,
            "distance" => $route["distanceMeters"],
            "distanceText" => round($route["distanceMeters"] / 1000, 2) . " km",
            "duration" => $route["duration"], // keep raw seconds if needed
            //"durationText" => $this->formatDuration($route["duration"]), // formatted string
        ]);
    }
}

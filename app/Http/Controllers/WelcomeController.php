<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\TripPoster;

class WelcomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        $tripPosters = TripPoster::where('is_active', true)->get();

        return view('welcome', compact('vehicles', 'tripPosters'));
    }
}

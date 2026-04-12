<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_per_km' => 'required|numeric',
            'image_url' => 'nullable|url',
        ]);

        $data = $request->all();

        // Convert textarea features to array
        if ($request->filled('features_text')) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $request->features_text)));
        } else {
            $data['features'] = [];
        }
        unset($data['features_text']);

        // Handle checkbox (unchecked = not in request)
        $data['is_featured'] = $request->has('is_featured') ? true : false;

        Vehicle::create($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function show(Vehicle $vehicle)
    {
        return redirect()->route('vehicles.index');
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'name' => 'required',
            'price_per_km' => 'required|numeric',
        ]);

        $data = $request->all();

        if ($request->filled('features_text')) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $request->features_text)));
        } else {
            $data['features'] = [];
        }
        unset($data['features_text']);

        $data['is_featured'] = $request->has('is_featured') ? true : false;

        $vehicle->update($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}

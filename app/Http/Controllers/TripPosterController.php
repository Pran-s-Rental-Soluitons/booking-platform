<?php

namespace App\Http\Controllers;

use App\Models\TripPoster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripPosterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:trip-poster-list|trip-poster-create|trip-poster-edit|trip-poster-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:trip-poster-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:trip-poster-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:trip-poster-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $posters = TripPoster::latest()->get();
        return view('trip_posters.index', compact('posters'));
    }

    public function create()
    {
        return view('trip_posters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'poster_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'call_number' => 'required',
        ]);

        $path = $request->file('poster_image')->store('posters', 'public');

        TripPoster::create([
            'title' => $request->title,
            'poster_image' => $path,
            'call_number' => $request->call_number,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('trip-posters.index')->with('success', 'Trip Poster added successfully.');
    }

    public function show(TripPoster $tripPoster)
    {
        return redirect()->route('trip-posters.index');
    }

    public function edit(TripPoster $tripPoster)
    {
        return view('trip_posters.create'); // reuse create for now
    }

    public function update(Request $request, TripPoster $tripPoster)
    {
        $tripPoster->update([
            'title'      => $request->title,
            'call_number'=> $request->call_number,
            'is_active'  => $request->has('is_active'),
        ]);
        return redirect()->route('trip-posters.index')->with('success', 'Poster updated.');
    }

    public function destroy(TripPoster $tripPoster)
    {
        Storage::disk('public')->delete($tripPoster->poster_image);
        $tripPoster->delete();
        return redirect()->route('trip-posters.index')->with('success', 'Trip Poster deleted successfully.');
    }
}

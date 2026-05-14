<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:lead-list', ['only' => ['index']]);
    }

    public function index()
    {
        $leads = Lead::latest()->paginate(20);
        return view('leads.index', compact('leads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'details' => $request->details,
            'type' => $request->type ?? 'contact',
        ]);

        return back()->with('success', 'Thank you! We have received your details and will get back to you soon.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index()
    {
        $journeys = \App\Models\Journey::orderBy('year', 'asc')->paginate(10);
        return view('admin.about.journey', compact('journeys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        \App\Models\Journey::create($request->all());

        return redirect()->route('admin.journeys.index')->with('success', 'Journey milestone added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $journey = \App\Models\Journey::findOrFail($id);
        $journey->update($request->all());

        return redirect()->route('admin.journeys.index')->with('success', 'Journey milestone updated successfully.');
    }

    public function destroy($id)
    {
        $journey = \App\Models\Journey::findOrFail($id);
        $journey->delete();

        return redirect()->route('admin.journeys.index')->with('success', 'Journey milestone deleted successfully.');
    }
}

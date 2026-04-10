<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImpactNumbers;

class ImpactNumbersController extends Controller
{
    public function index()
    {
        $impactNumbers = ImpactNumbers::all();
        $hasData = $impactNumbers->count() > 0;
        return view('admin.impactnumbers.index', compact('impactNumbers', 'hasData'));
    }

    public function store(Request $request)
    {
        if (ImpactNumbers::count() > 0) {
            return redirect()->back()->with('error', 'Only one entry is allowed.');
        }

        $request->validate([
            'farmers_empowered' => 'required|string|max:255',
            'research_projects' => 'required|string|max:255',
            'countries_active' => 'required|string|max:255',
            'partner_organizations' => 'required|string|max:255',
        ]);

        ImpactNumbers::create($request->all());

        return redirect()->route('admin.impactnumbers.index')->with('success', 'Impact Numbers created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'farmers_empowered' => 'required|string|max:255',
            'research_projects' => 'required|string|max:255',
            'countries_active' => 'required|string|max:255',
            'partner_organizations' => 'required|string|max:255',
        ]);

        $impactNumbers = ImpactNumbers::findOrFail($id);
        $impactNumbers->update($request->all());

        return redirect()->route('admin.impactnumbers.index')->with('success', 'Impact Numbers updated successfully.');
    }
}

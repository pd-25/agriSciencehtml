<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResearchNumberController extends Controller
{
    public function index()
    {
        $researchNumbers = \App\Models\ResearchNumber::all();
        $hasData = $researchNumbers->count() > 0;
        return view('admin.research.numbers', compact('researchNumbers', 'hasData'));
    }

    public function store(Request $request)
    {
        if (\App\Models\ResearchNumber::count() > 0) {
            return redirect()->back()->with('error', 'Only one entry is allowed.');
        }

        $request->validate([
            'published_papers' => 'required|string|max:255',
            'research_partners' => 'required|string|max:255',
            'field_studies' => 'required|string|max:255',
            'open_access_downloads' => 'required|string|max:255',
        ]);

        \App\Models\ResearchNumber::create($request->all());

        return redirect()->route('admin.research-numbers.index')->with('success', 'Research Numbers created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'published_papers' => 'required|string|max:255',
            'research_partners' => 'required|string|max:255',
            'field_studies' => 'required|string|max:255',
            'open_access_downloads' => 'required|string|max:255',
        ]);

        $researchNumber = \App\Models\ResearchNumber::findOrFail($id);
        $researchNumber->update($request->all());

        return redirect()->route('admin.research-numbers.index')->with('success', 'Research Numbers updated successfully.');
    }
}

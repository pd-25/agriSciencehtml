<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApproachController extends Controller
{
    public function index()
    {
        $approaches = \App\Models\Approach::paginate(10);
        return view('admin.approach.index', compact('approaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color_var' => 'nullable|string|max:255'
        ]);

        \App\Models\Approach::create($request->all());

        return redirect()->route('admin.approach.index')->with('success', 'Approach created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color_var' => 'nullable|string|max:255'
        ]);

        $approach = \App\Models\Approach::findOrFail($id);
        $approach->update($request->all());

        return redirect()->route('admin.approach.index')->with('success', 'Approach updated successfully.');
    }

    public function destroy($id)
    {
        $approach = \App\Models\Approach::findOrFail($id);
        $approach->delete();

        return redirect()->route('admin.approach.index')->with('success', 'Approach deleted successfully.');
    }
}

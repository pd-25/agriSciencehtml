<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = \App\Models\Publication::paginate(10);
        return view('admin.research.publication', compact('publications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'type_label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'source_info' => 'required|string|max:255',
            'source_icon' => 'required|string|max:255',
        ]);

        \App\Models\Publication::create($request->all());

        return redirect()->route('admin.publications.index')->with('success', 'Publication created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'type_label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'source_info' => 'required|string|max:255',
            'source_icon' => 'required|string|max:255',
        ]);

        $publication = \App\Models\Publication::findOrFail($id);
        $publication->update($request->all());

        return redirect()->route('admin.publications.index')->with('success', 'Publication updated successfully.');
    }

    public function destroy($id)
    {
        $publication = \App\Models\Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('admin.publications.index')->with('success', 'Publication deleted successfully.');
    }
}

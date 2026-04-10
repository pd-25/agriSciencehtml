<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = \App\Models\Team::paginate(10);
        return view('admin.about.teams', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'social_icon' => 'nullable|string|max:255',
            'social_link' => 'nullable|url|max:255',
        ]);

        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/teams'), $imageName);
            $data['image'] = 'images/teams/' . $imageName;
        }

        \App\Models\Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'nullable|string',
            'social_icon' => 'nullable|string|max:255',
            'social_link' => 'nullable|url|max:255',
        ]);

        $team = \App\Models\Team::findOrFail($id);
        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($team->image && file_exists(public_path($team->image))) {
                unlink(public_path($team->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/teams'), $imageName);
            $data['image'] = 'images/teams/' . $imageName;
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy($id)
    {
        $team = \App\Models\Team::findOrFail($id);
        
        if ($team->image && file_exists(public_path($team->image))) {
            unlink(public_path($team->image));
        }
        
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted successfully.');
    }
}

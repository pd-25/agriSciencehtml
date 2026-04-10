<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = \App\Models\About::first();
        return view('admin.about.about', compact('about'));
    }

    public function store(Request $request)
    {
        if (\App\Models\About::count() > 0) {
            return redirect()->back()->with('error', 'About record already exists. Please update it instead.');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'label' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'list_items' => 'nullable|array',
            'list_items.*' => 'nullable|string',
            'experience_years' => 'nullable|string|max:255',
            'experience_text' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'phone' => 'nullable|array',
            'phone.*' => 'nullable|string|max:20',
            'email' => 'nullable|array',
            'email.*' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'regional_offices' => 'nullable|array',
            'regional_offices.*.name' => 'nullable|string|max:255',
            'regional_offices.*.address' => 'nullable|string|max:500',
            'regional_offices.*.email' => 'nullable|email|max:255',
        ]);

        $data = $request->except('_token', 'image', 'list_items', 'phone', 'email', 'regional_offices');
        
        // Clean up simple array fields
        foreach (['list_items', 'phone', 'email'] as $field) {
            if ($request->has($field)) {
                $data[$field] = array_values(array_filter($request->input($field), function($val) {
                    return !is_null($val) && trim($val) !== '';
                }));
            }
        }

        // Clean up multi-field array (regional offices)
        if ($request->has('regional_offices')) {
            $data['regional_offices'] = array_values(array_filter($request->regional_offices, function($office) {
                return !empty($office['name']) && !empty($office['address']);
            }));
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/about'), $imageName);
            $data['image'] = 'images/about/' . $imageName;
        }

        \App\Models\About::create($data);

        return redirect()->route('admin.abouts.index')->with('success', 'About content created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'label' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'list_items' => 'nullable|array',
            'list_items.*' => 'nullable|string',
            'experience_years' => 'nullable|string|max:255',
            'experience_text' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'phone' => 'nullable|array',
            'phone.*' => 'nullable|string|max:20',
            'email' => 'nullable|array',
            'email.*' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'regional_offices' => 'nullable|array',
            'regional_offices.*.name' => 'nullable|string|max:255',
            'regional_offices.*.address' => 'nullable|string|max:500',
            'regional_offices.*.email' => 'nullable|email|max:255',
        ]);

        $about = \App\Models\About::findOrFail($id);
        $data = $request->except('_token', 'image', 'list_items', 'phone', 'email', 'regional_offices');

        // Clean up simple array fields
        foreach (['list_items', 'phone', 'email'] as $field) {
            if ($request->has($field)) {
                $data[$field] = array_values(array_filter($request->input($field), function($val) {
                    return !is_null($val) && trim($val) !== '';
                }));
            } else {
                $data[$field] = null;
            }
        }

        // Clean up multi-field array (regional offices)
        if ($request->has('regional_offices')) {
            $data['regional_offices'] = array_values(array_filter($request->regional_offices, function($office) {
                return !empty($office['name']) && !empty($office['address']);
            }));
        } else {
            $data['regional_offices'] = null;
        }

        if ($request->hasFile('image')) {
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/about'), $imageName);
            $data['image'] = 'images/about/' . $imageName;
        }

        $about->update($data);

        return redirect()->route('admin.abouts.index')->with('success', 'About content updated successfully.');
    }
}

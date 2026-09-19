<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::withCount('images')->latest()->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('feature_image')) {
            $data['feature_image'] = $this->uploadImage($request->file('feature_image'));
        }

        $gallery = Gallery::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $gallery->images()->create([
                    'image' => $this->uploadImage($image),
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::with('images')->findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $gallery = Gallery::findOrFail($id);
        $data = ['title' => $request->title];

        if ($request->hasFile('feature_image')) {
            $this->deleteImage($gallery->feature_image);
            $data['feature_image'] = $this->uploadImage($request->file('feature_image'));
        }

        $gallery->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $gallery->images()->create([
                    'image' => $this->uploadImage($image),
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::with('images')->findOrFail($id);

        $this->deleteImage($gallery->feature_image);
        foreach ($gallery->images as $image) {
            $this->deleteImage($image->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully.');
    }

    public function destroyImage($id)
    {
        $image = GalleryImage::findOrFail($id);
        $galleryId = $image->gallery_id;

        $this->deleteImage($image->image);
        $image->delete();

        return redirect()->route('admin.gallery.edit', $galleryId)->with('success', 'Image removed successfully.');
    }

    private function uploadImage($file): string
    {
        $imageName = time() . '_' . uniqid() . '.' . $file->extension();
        $file->move(public_path('images/gallery'), $imageName);

        return 'images/gallery/' . $imageName;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
}

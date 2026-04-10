<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('_token', 'image', 'author_image');
        $data['slug'] = Str::slug($request->title) . '-' . time();
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        if ($request->hasFile('author_image')) {
            $imageName = 'author_' . time() . '_' . uniqid() . '.' . $request->author_image->extension();
            $request->author_image->move(public_path('images/blogs/authors'), $imageName);
            $data['author_image'] = 'images/blogs/authors/' . $imageName;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $data = $request->except('_token', 'image', 'author_image');
        
        if ($blog->title !== $request->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }
        
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        if ($request->hasFile('author_image')) {
            if ($blog->author_image && file_exists(public_path($blog->author_image))) {
                unlink(public_path($blog->author_image));
            }
            $imageName = 'author_' . time() . '_' . uniqid() . '.' . $request->author_image->extension();
            $request->author_image->move(public_path('images/blogs/authors'), $imageName);
            $data['author_image'] = 'images/blogs/authors/' . $imageName;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        if ($blog->author_image && file_exists(public_path($blog->author_image))) {
            unlink(public_path($blog->author_image));
        }
        
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}

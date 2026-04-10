@extends('admin.layout.main')

@section('title', 'Edit Blog')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Edit Blog Post</h3>
                <p class="text-muted">Modify your article content and settings.</p>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border rounded-pill px-4 shadow-sm">
                <i class="fa fa-arrow-left me-2"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-8">
                        <div class="premium-card p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required value="{{ $blog->title }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Exerpt / Summary</label>
                                <textarea name="excerpt" class="form-control" rows="2">{{ $blog->excerpt }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Content <span class="text-danger">*</span></label>
                                <textarea name="content" id="editor" class="form-control" rows="15" required>{{ $blog->content }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Settings -->
                    <div class="col-lg-4">
                        <div class="premium-card p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-select" required>
                                    @foreach(['Farming Practices', 'AgriTech', 'Community Stories', 'Policy & Advocacy'] as $cat)
                                        <option value="{{ $cat }}" {{ $blog->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Publish Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" required value="{{ $blog->date->format('Y-m-d') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Read Time (e.g. 5 min read)</label>
                                <input type="text" name="read_time" class="form-control" value="{{ $blog->read_time }}">
                            </div>

                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_featured" id="featuredSwitch" {{ $blog->is_featured ? 'checked' : '' }}>
                                    <label class="form-check-label fw-medium small" for="featuredSwitch">Mark as Featured</label>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Featured Image</label>
                                @if($blog->image)
                                    <div class="mb-2">
                                        <img src="{{ asset($blog->image) }}" class="rounded shadow-sm img-fluid" style="max-height: 150px;">
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <small class="text-muted small">Leave empty to keep current image.</small>
                            </div>
                        </div>

                        <div class="premium-card p-4 mb-4">
                            <h6 class="fw-bold mb-3">Author Details</h6>
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Author Name</label>
                                <input type="text" name="author_name" class="form-control" value="{{ $blog->author_name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Author Image</label>
                                @if($blog->author_image)
                                    <div class="mb-2">
                                        <img src="{{ asset($blog->author_image) }}" class="rounded-circle shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="author_image" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                            <i class="fa fa-save me-2"></i> Update Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

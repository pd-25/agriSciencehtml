@extends('admin.layout.main')

@section('title', 'Create Blog')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Create Blog Post</h3>
                <p class="text-muted">Draft a new article for your website.</p>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border rounded-pill px-4 shadow-sm">
                <i class="fa fa-arrow-left me-2"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-8">
                        <div class="premium-card p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required placeholder="Enter post title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Exerpt / Summary</label>
                                <textarea name="excerpt" class="form-control" rows="2" placeholder="Brief summary of the post..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Content <span class="text-danger">*</span></label>
                                <textarea name="content" id="editor" class="form-control" rows="15" required placeholder="Write your content here..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Settings -->
                    <div class="col-lg-4">
                        <div class="premium-card p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-select" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Farming Practices">Farming Practices</option>
                                    <option value="AgriTech">AgriTech</option>
                                    <option value="Community Stories">Community Stories</option>
                                    <option value="Policy & Advocacy">Policy & Advocacy</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Publish Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" required value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Read Time (e.g. 5 min read)</label>
                                <input type="text" name="read_time" class="form-control" placeholder="e.g. 8 min read">
                            </div>

                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_featured" id="featuredSwitch">
                                    <label class="form-check-label fw-medium small" for="featuredSwitch">Mark as Featured</label>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Featured Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <small class="text-muted small">Recommended: 1200x800px</small>
                            </div>
                        </div>

                        <div class="premium-card p-4 mb-4">
                            <h6 class="fw-bold mb-3">Author Details</h6>
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Author Name</label>
                                <input type="text" name="author_name" class="form-control" placeholder="e.g. Dr. Lena Ochieng">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Author Image</label>
                                <input type="file" name="author_image" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                            <i class="fa fa-save me-2"></i> Publish Article
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

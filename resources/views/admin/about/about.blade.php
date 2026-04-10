@extends('admin.layout.main')

@section('title', 'About Content')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12">
            <h3 class="fw-bold mb-1">About Us Content</h3>
            <p class="text-muted">Manage the main "About" section content and social links.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ $about ? route('admin.abouts.update', $about->id) : route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($about)
                    @method('PUT')
                @endif

                <div class="row">
                    <!-- Main Content Card -->
                    <div class="col-lg-8">
                        <div class="premium-card p-4 mb-4">
                            <h5 class="fw-bold mb-4 border-bottom pb-2">Main Section Content</h5>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Section Label</label>
                                <input type="text" name="label" class="form-control" value="{{ $about->label ?? 'ABOUT AGRISCIENCE' }}" placeholder="e.g. ABOUT AGRISCIENCE">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Section Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required value="{{ $about->title ?? '' }}" placeholder="Enter main heading">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="4" required placeholder="Enter primary description...">{{ $about->description ?? '' }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium small d-flex justify-content-between">
                                    Key Features List
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" id="add-list-item">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </label>
                                <div id="list-items-container">
                                    @if($about && $about->list_items)
                                        @foreach($about->list_items as $item)
                                            <div class="input-group mb-2 list-item-row">
                                                <input type="text" name="list_items[]" class="form-control" value="{{ $item }}">
                                                <button class="btn btn-outline-danger remove-list-item" type="button"><i class="fa fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="input-group mb-2 list-item-row">
                                            <input type="text" name="list_items[]" class="form-control" placeholder="e.g. Evidence-based farming methods">
                                            <button class="btn btn-outline-danger remove-list-item" type="button"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Footer/Social Card -->
                        <div class="premium-card p-4">
                            <h5 class="fw-bold mb-4 border-bottom pb-2">Footer Content & Social Links</h5>
                            
                            <div class="mb-4">
                                <label class="form-label fw-medium small">Short Footer Bio</label>
                                <textarea name="footer_text" class="form-control" rows="3" placeholder="Empowering communities through sustainable agriculture...">{{ $about->footer_text ?? '' }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium small"><i class="bi bi-facebook me-1"></i> Facebook URL</label>
                                    <input type="url" name="facebook" class="form-control" value="{{ $about->facebook ?? '' }}" placeholder="https://facebook.com/...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium small"><i class="bi bi-twitter-x me-1"></i> X (Twitter) URL</label>
                                    <input type="url" name="twitter" class="form-control" value="{{ $about->twitter ?? '' }}" placeholder="https://x.com/...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium small"><i class="bi bi-linkedin me-1"></i> LinkedIn URL</label>
                                    <input type="url" name="linkedin" class="form-control" value="{{ $about->linkedin ?? '' }}" placeholder="https://linkedin.com/...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium small"><i class="bi bi-instagram me-1"></i> Instagram URL</label>
                                    <input type="url" name="instagram" class="form-control" value="{{ $about->instagram ?? '' }}" placeholder="https://instagram.com/...">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-medium small"><i class="bi bi-youtube me-1"></i> YouTube URL</label>
                                    <input type="url" name="youtube" class="form-control" value="{{ $about->youtube ?? '' }}" placeholder="https://youtube.com/...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Visuals Card -->
                    <div class="col-lg-4">
                        <div class="premium-card p-4 mb-4 sticky-top" style="top: 20px; z-index: 100;">
                            <h5 class="fw-bold mb-4 border-bottom pb-2">Visuals</h5>
                            
                            <div class="mb-4">
                                <label class="form-label fw-medium small">Featured Image</label>
                                <div class="image-upload-preview mb-3">
                                    @if($about && $about->image)
                                        <img src="{{ asset($about->image) }}" id="preview-img" class="img-fluid rounded border shadow-sm" style="max-height: 200px; width: 100%; object-fit: cover;">
                                    @else
                                        <div id="image-placeholder" class="bg-light rounded border d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                                            <i class="fa fa-image fa-3x opacity-25"></i>
                                        </div>
                                        <img src="" id="preview-img" class="img-fluid rounded border shadow-sm d-none" style="max-height: 200px; width: 100%; object-fit: cover;">
                                    @endif
                                </div>
                                <input type="file" name="image" class="form-control" id="image-input" accept="image/*">
                                <small class="text-muted small">Recommended: Large landscape image.</small>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Experience Counter (e.g. 12+)</label>
                                <input type="text" name="experience_years" class="form-control" value="{{ $about->experience_years ?? '' }}" placeholder="e.g. 12+">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium small">Counter Label (e.g. Years of Service)</label>
                                <input type="text" name="experience_text" class="form-control" value="{{ $about->experience_text ?? '' }}" placeholder="e.g. Years of Service">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold mt-4">
                                <i class="fa fa-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Preview Image
            const imgInput = document.getElementById('image-input');
            const previewImg = document.getElementById('preview-img');
            const placeholder = document.getElementById('image-placeholder');

            imgInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewImg.classList.remove('d-none');
                        if(placeholder) placeholder.classList.add('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Add List Item
            const container = document.getElementById('list-items-container');
            const addButton = document.getElementById('add-list-item');

            addButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.className = 'input-group mb-2 list-item-row animate__animated animate__fadeInDown';
                newRow.innerHTML = `
                    <input type="text" name="list_items[]" class="form-control" placeholder="Add another point...">
                    <button class="btn btn-outline-danger remove-list-item" type="button"><i class="fa fa-times"></i></button>
                `;
                container.appendChild(newRow);
            });

            // Remove List Item (Event Delegation)
            container.addEventListener('click', function(e) {
                if (e.target.closest('.remove-list-item')) {
                    const row = e.target.closest('.list-item-row');
                    if (container.querySelectorAll('.list-item-row').length > 1) {
                        row.classList.remove('animate__fadeInDown');
                        row.classList.add('animate__fadeOut');
                        setTimeout(() => row.remove(), 300);
                    } else {
                        row.querySelector('input').value = '';
                    }
                }
            });
        });
    </script>
@endsection

@extends('admin.layout.main')

@section('title', 'Create Gallery')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Create Gallery</h3>
                <p class="text-muted">Add a new gallery and upload its images.</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-light border rounded-pill px-4 shadow-sm">
                <i class="fa fa-arrow-left me-2"></i> Back to List
            </a>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="premium-card p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required
                                    value="{{ old('title') }}" placeholder="Enter gallery title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium small">Gallery Images</label>
                                <input type="file" name="images[]" id="galleryImages" class="form-control"
                                    accept="image/*" multiple>
                                <small class="text-muted small">You can select multiple images at once.</small>
                            </div>

                            <div class="row g-3" id="imagesPreview"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="premium-card p-4 mb-4">
                            <div class="mb-3">
                                <label class="form-label fw-medium small">Feature Image</label>
                                <input type="file" name="feature_image" id="featureImage" class="form-control"
                                    accept="image/*">
                                <small class="text-muted small">Recommended: 1200x800px</small>
                            </div>
                            <img id="featurePreview" src="" class="img-fluid rounded shadow-sm d-none"
                                style="max-height: 200px; object-fit: cover;">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                            <i class="fa fa-save me-2"></i> Save Gallery
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('featureImage').addEventListener('change', function (e) {
            const preview = document.getElementById('featurePreview');
            const file = e.target.files[0];
            if (!file) {
                preview.classList.add('d-none');
                return;
            }
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        });

        document.getElementById('galleryImages').addEventListener('change', function (e) {
            const wrapper = document.getElementById('imagesPreview');
            wrapper.innerHTML = '';
            Array.from(e.target.files).forEach(function (file) {
                const col = document.createElement('div');
                col.className = 'col-6 col-md-3';
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = 'img-fluid rounded shadow-sm w-100';
                img.style.height = '120px';
                img.style.objectFit = 'cover';
                col.appendChild(img);
                wrapper.appendChild(col);
            });
        });
    </script>
@endpush

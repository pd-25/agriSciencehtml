@extends('admin.layout.main')

@section('title', 'Edit Gallery')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Edit Gallery</h3>
                <p class="text-muted">Update the gallery details and its images.</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-light border rounded-pill px-4 shadow-sm">
                <i class="fa fa-arrow-left me-2"></i> Back to List
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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

    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="premium-card p-4 mb-4">
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required
                            value="{{ old('title', $gallery->title) }}" placeholder="Enter gallery title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Add More Images</label>
                        <input type="file" name="images[]" id="galleryImages" class="form-control" accept="image/*"
                            multiple>
                        <small class="text-muted small">You can select multiple images at once.</small>
                    </div>

                    <div class="row g-3" id="imagesPreview"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="premium-card p-4 mb-4">
                    <label class="form-label fw-medium small">Feature Image</label>
                    @if($gallery->feature_image)
                        <img src="{{ asset($gallery->feature_image) }}" class="img-fluid rounded shadow-sm mb-3 w-100"
                            style="max-height: 200px; object-fit: cover;">
                    @endif
                    <input type="file" name="feature_image" id="featureImage" class="form-control" accept="image/*">
                    <small class="text-muted small">Leave empty to keep the current image.</small>
                    <img id="featurePreview" src="" class="img-fluid rounded shadow-sm mt-3 d-none"
                        style="max-height: 200px; object-fit: cover;">
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 shadow-sm fw-bold">
                    <i class="fa fa-save me-2"></i> Update Gallery
                </button>
            </div>
        </div>
    </form>

    <div class="row mt-2">
        <div class="col-lg-8">
            <div class="premium-card p-4">
                <h6 class="fw-bold mb-3">Gallery Images ({{ $gallery->images->count() }})</h6>

                @if($gallery->images->isEmpty())
                    <div class="text-center py-4">
                        <div class="text-muted mb-2"><i class="fa fa-images fa-2x opacity-50"></i></div>
                        <p class="text-muted small mb-0">No images yet. Use 'Add More Images' above to upload some.</p>
                    </div>
                @else
                    <div class="row g-3">
                        @foreach($gallery->images as $image)
                            <div class="col-6 col-md-3">
                                <div class="position-relative">
                                    <img src="{{ asset($image->image) }}" class="img-fluid rounded shadow-sm w-100"
                                        style="height: 120px; object-fit: cover;">
                                    <button type="button"
                                        class="btn btn-sm btn-danger rounded-circle position-absolute top-0 end-0 m-1 shadow-sm"
                                        data-bs-toggle="modal" data-bs-target="#deleteImageModal{{ $image->id }}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    @foreach($gallery->images as $image)
        <!-- Delete Image Modal -->
        <div class="modal fade" id="deleteImageModal{{ $image->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="{{ route('admin.gallery.image.destroy', $image->id) }}" method="POST"
                    class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Remove image?</h4>
                    <p class="text-muted small">This image will be permanently deleted from the gallery.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
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

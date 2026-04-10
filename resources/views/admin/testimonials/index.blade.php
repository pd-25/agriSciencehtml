@extends('admin.layout.main')

@section('title', 'Testimonials')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Testimonials</h3>
                <p class="text-muted">Manage user feedback and ratings.</p>
            </div>
            <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-plus me-2"></i> Add New
            </button>
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

            <div class="premium-card p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>User</th>
                                <th>Designation</th>
                                <th>Rating</th>
                                <th>Feedback</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $index => $item)
                                <tr>
                                    <td>{{ $testimonials->firstItem() + $index }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->image)
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="rounded-circle me-3" style="width: 45px; height: 45px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded-circle me-3 d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 45px; height: 45px;">
                                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                                </div>
                                            @endif
                                            <span class="fw-medium text-dark">{{ $item->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $item->designation ?? 'N/A' }}</td>
                                    <td>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fa{{ $i <= $item->rating ? 's' : 'r' }} fa-star fa-xs"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ Str::limit($item->feedback, 50) }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="btn btn-sm btn-light text-primary border shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-light text-danger border shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if($testimonials->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-comments fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No testimonials found</h5>
                                        <p class="text-muted small">Click 'Add New' to create the first record.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-end">
                    {{ $testimonials->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="Full Name">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Designation <span class="text-danger">*</span></label>
                        <input type="text" name="designation" class="form-control" required placeholder="e.g. Farmer, Partner">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Rating <span class="text-danger">*</span></label>
                        <select name="rating" class="form-select" required>
                            <option value="5" selected>5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Feedback <span class="text-danger">*</span></label>
                        <textarea name="feedback" class="form-control" rows="4" required placeholder="Enter feedback here..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">User Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit and Delete Modals rendered outside of table structure -->
    @foreach($testimonials as $item)
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.testimonials.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required value="{{ $item->name }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control" required value="{{ $item->designation }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium small">Rating <span class="text-danger">*</span></label>
                            <select name="rating" class="form-select" required>
                                <option value="5" {{ $item->rating == 5 ? 'selected' : '' }}>5 Stars</option>
                                <option value="4" {{ $item->rating == 4 ? 'selected' : '' }}>4 Stars</option>
                                <option value="3" {{ $item->rating == 3 ? 'selected' : '' }}>3 Stars</option>
                                <option value="2" {{ $item->rating == 2 ? 'selected' : '' }}>2 Stars</option>
                                <option value="1" {{ $item->rating == 1 ? 'selected' : '' }}>1 Star</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Feedback <span class="text-danger">*</span></label>
                            <textarea name="feedback" class="form-control" rows="4" required>{{ $item->feedback }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium small">User Image</label>
                            <div class="d-flex align-items-center gap-3 mb-2">
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" class="rounded-circle border shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                                @endif
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            <small class="text-muted small">Leave empty to keep current image.</small>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x animate__animated animate__heartBeat"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete this testimonial? This process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

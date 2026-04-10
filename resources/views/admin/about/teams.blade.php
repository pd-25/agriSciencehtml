@extends('admin.layout.main')

@section('title', 'Teams')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Teams</h3>
                <p class="text-muted">Manage your Organization Team Members.</p>
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
                                <th>Image</th>
                                <th>Name & Designation</th>
                                <th>Description</th>
                                <th>Social</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $index => $item)
                                <tr>
                                    <td>{{ $teams->firstItem() + $index }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                                {{ collect(explode(' ', $item->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->take(2)->implode('') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-medium text-dark">{{ $item->name }}</div>
                                        <small class="text-muted">{{ $item->designation }}</small>
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ Str::limit($item->description, 50) }}</span>
                                    </td>
                                    <td>
                                        @if($item->social_link)
                                            <a href="{{ $item->social_link }}" target="_blank" class="btn btn-sm btn-light border text-primary">
                                                <i class="{{ $item->social_icon ?: 'bi bi-link-45deg' }}"></i>
                                            </a>
                                        @else
                                            <span class="text-muted small">N/A</span>
                                        @endif
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

                            @if($teams->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-users fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No team members found</h5>
                                        <p class="text-muted small">Click 'Add New' to create the first record.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-end">
                    {{ $teams->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Dr. Vikram Patel">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control" required placeholder="e.g. Founder & Executive Director">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter brief description about the member..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Social Icon</label>
                            <select name="social_icon" class="form-select">
                                <option value="" selected>None</option>
                                <option value="bi bi-linkedin">LinkedIn</option>
                                <option value="bi bi-twitter-x">X (Twitter)</option>
                                <option value="bi bi-facebook">Facebook</option>
                                <option value="bi bi-instagram">Instagram</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Social Link URL</label>
                            <input type="url" name="social_link" class="form-control" placeholder="e.g. https://linkedin.com/in/username">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium small">Profile Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted d-block mt-1">If no image is uploaded, initials will be generated instead.</small>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save Content</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit and Delete Modals rendered outside of table structure -->
    @foreach($teams as $item)
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form action="{{ route('admin.teams.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Team Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required value="{{ $item->name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Designation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" class="form-control" required value="{{ $item->designation }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Social Icon</label>
                                <select name="social_icon" class="form-select">
                                    <option value="" {{ !$item->social_icon ? 'selected' : '' }}>None</option>
                                    <option value="bi bi-linkedin" {{ $item->social_icon == 'bi bi-linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                    <option value="bi bi-twitter-x" {{ $item->social_icon == 'bi bi-twitter-x' ? 'selected' : '' }}>X (Twitter)</option>
                                    <option value="bi bi-facebook" {{ $item->social_icon == 'bi bi-facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="bi bi-instagram" {{ $item->social_icon == 'bi bi-instagram' ? 'selected' : '' }}>Instagram</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Social Link URL</label>
                                <input type="url" name="social_link" class="form-control" value="{{ $item->social_link }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium small">Profile Image</label>
                            <div class="d-flex align-items-center gap-3 mb-2">
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" class="rounded-circle border shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                        {{ collect(explode(' ', $item->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->take(2)->implode('') }}
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            <small class="text-muted d-block mt-1">Leave empty to keep current image. Upload new image to overwrite.</small>
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
                <form action="{{ route('admin.teams.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x animate__animated animate__heartBeat"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete {{ $item->name }}? This process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

@extends('admin.layout.main')

@section('title', 'Our Journey')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Our Journey</h3>
                <p class="text-muted">Manage the timeline milestones of the organization.</p>
            </div>
            <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-plus me-2"></i> Add Milestone
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
                                <th>Year</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($journeys as $index => $item)
                                <tr>
                                    <td>{{ $journeys->firstItem() + $index }}</td>
                                    <td><span class="badge bg-primary bg-opacity-10 text-primary fw-bold">{{ $item->year }}</span></td>
                                    <td class="fw-medium text-dark">{{ $item->title }}</td>
                                    <td>
                                        <span class="text-muted small">{{ Str::limit($item->description, 60) }}</span>
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

                            @if($journeys->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-road fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No milestones found</h5>
                                        <p class="text-muted small">Click 'Add Milestone' to create the first record.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-end">
                    {{ $journeys->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.journeys.store') }}" method="POST" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Milestone</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Year <span class="text-danger">*</span></label>
                        <input type="text" name="year" class="form-control" required placeholder="e.g. 2014 or 2024 - Present">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Founded in New Delhi">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="4" required placeholder="Enter description..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save Milestone</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit and Delete Modals rendered outside of table structure -->
    @foreach($journeys as $item)
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.journeys.update', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Milestone</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Year <span class="text-danger">*</span></label>
                            <input type="text" name="year" class="form-control" required value="{{ $item->year }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required value="{{ $item->title }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $item->description }}</textarea>
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
                <form action="{{ route('admin.journeys.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x animate__animated animate__heartBeat"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete the milestone for <strong>{{ $item->year }}</strong>? This process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

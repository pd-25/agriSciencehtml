@extends('admin.layout.main')

@section('title', 'Publications')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Publications</h3>
                <p class="text-muted">Manage Research Papers, Reports, and Field Studies here.</p>
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
                                <th>Category / Type</th>
                                <th>Title</th>
                                <th>Author & Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publications as $index => $item)
                                <tr>
                                    <td>{{ $publications->firstItem() + $index }}</td>
                                    <td>
                                        <span class="badge bg-secondary mb-1">{{ ucfirst($item->category) }}</span><br>
                                        <small class="text-muted">{{ $item->type_label }}</small>
                                    </td>
                                    <td class="fw-medium">
                                        {{ Str::limit($item->title, 40) }}
                                    </td>
                                    <td>
                                        <small class="d-block"><i class="bi bi-person text-muted"></i> {{ $item->author }}</small>
                                        <small class="d-block"><i class="bi bi-calendar3 text-muted"></i> {{ \Carbon\Carbon::parse($item->date)->format('F Y') }}</small>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="btn btn-sm btn-light text-secondary border shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#viewModal{{ $item->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
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

                            @if($publications->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-folder-open fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No items found</h5>
                                        <p class="text-muted small">Click 'Add New' to create the first record.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-end">
                    {{ $publications->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form action="{{ route('admin.publications.store') }}" method="POST" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Publication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Category (Filter Tab) <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required>
                                <option value="" disabled selected>Select category...</option>
                                <option value="paper">Paper</option>
                                <option value="report">Report</option>
                                <option value="study">Field Study</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Type Label <span class="text-danger">*</span></label>
                            <input type="text" name="type_label" class="form-control" required placeholder="e.g. Peer-Reviewed Paper">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter title">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" required placeholder="Enter detailed description..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Author(s) <span class="text-danger">*</span></label>
                            <input type="text" name="author" class="form-control" required placeholder="e.g. Dr. V. Patel et al.">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Date <span class="text-danger">*</span></label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Source / Additional Info <span class="text-danger">*</span></label>
                            <input type="text" name="source_info" class="form-control" required placeholder="e.g. Nature Sustainability or 84 pages">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Source Icon Class <span class="text-danger">*</span></label>
                            <input type="text" name="source_icon" class="form-control" required placeholder="e.g. bi bi-journal">
                            <small class="text-muted">Examples: bi bi-journal, bi bi-file-earmark-pdf, bi bi-geo-alt</small>
                        </div>
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
    @foreach($publications as $item)
        <!-- View Modal -->
        <div class="modal fade" id="viewModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg text-start">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">View Publication</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-4">
                        <div class="mb-4">
                            <span class="badge bg-secondary me-2">{{ ucfirst($item->category) }}</span>
                            <span class="text-primary fw-medium">{{ $item->type_label }}</span>
                        </div>
                        <h4 class="mb-3">{{ $item->title }}</h4>
                        <p class="text-muted mb-4">{{ $item->description }}</p>
                        
                        <div class="row bg-light rounded p-3 m-0 border">
                            <div class="col-md-6 mb-3 mb-md-0 d-flex gap-2">
                                <i class="bi bi-person text-primary"></i>
                                <div>
                                    <small class="text-muted d-block text-uppercase" style="font-size:0.7rem;">Author(s)</small>
                                    <span class="fw-medium">{{ $item->author }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex gap-2">
                                <i class="bi bi-calendar3 text-primary"></i>
                                <div>
                                    <small class="text-muted d-block uppercase" style="font-size:0.7rem;">Date</small>
                                    <span class="fw-medium">{{ \Carbon\Carbon::parse($item->date)->format('F Y') }}</span>
                                </div>
                            </div>
                            <div class="col-12 mt-3 pt-3 border-top d-flex gap-2">
                                <i class="{{ $item->source_icon ?: 'bi bi-info-circle' }} text-primary"></i>
                                <div>
                                    <small class="text-muted d-block uppercase" style="font-size:0.7rem;">Source / Additional Info</small>
                                    <span class="fw-medium">{{ $item->source_info }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form action="{{ route('admin.publications.update', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Publication</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Category (Filter Tab) <span class="text-danger">*</span></label>
                                <select name="category" class="form-select" required>
                                    <option value="paper" {{ $item->category == 'paper' ? 'selected' : '' }}>Paper</option>
                                    <option value="report" {{ $item->category == 'report' ? 'selected' : '' }}>Report</option>
                                    <option value="study" {{ $item->category == 'study' ? 'selected' : '' }}>Field Study</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Type Label <span class="text-danger">*</span></label>
                                <input type="text" name="type_label" class="form-control" required value="{{ $item->type_label }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required value="{{ $item->title }}">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="3" required>{{ $item->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Author(s) <span class="text-danger">*</span></label>
                                <input type="text" name="author" class="form-control" required value="{{ $item->author }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" required value="{{ $item->date }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Source / Additional Info <span class="text-danger">*</span></label>
                                <input type="text" name="source_info" class="form-control" required value="{{ $item->source_info }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Source Icon Class <span class="text-danger">*</span></label>
                                <input type="text" name="source_icon" class="form-control" required value="{{ $item->source_icon }}">
                                <small class="text-muted">Examples: bi bi-journal, bi bi-file-earmark-pdf, bi bi-geo-alt</small>
                            </div>
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
                <form action="{{ route('admin.publications.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x animate__animated animate__heartBeat"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete this publication? This process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

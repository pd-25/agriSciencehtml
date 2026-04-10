@extends('admin.layout.main')

@section('title', 'Research Numbers')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Research Numbers</h3>
                <p class="text-muted">Manage the 'Research Numbers' section here. You can only create one record.</p>
            </div>
            @if(!$hasData)
            <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-plus me-2"></i> Add Data
            </button>
            @endif
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
                                <th>Published Papers</th>
                                <th>Research Partners</th>
                                <th>Field Studies</th>
                                <th>Open Access Downloads</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($researchNumbers as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-medium">{{ $item->published_papers }}</td>
                                    <td class="fw-medium">{{ $item->research_partners }}</td>
                                    <td class="fw-medium">{{ $item->field_studies }}</td>
                                    <td class="fw-medium">{{ $item->open_access_downloads }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="btn btn-sm btn-light text-primary border shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if($researchNumbers->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-folder-open fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No items found</h5>
                                        <p class="text-muted small">Click 'Add Data' to create the record.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(!$hasData)
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.research-numbers.store') }}" method="POST" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add Research Numbers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Published Papers <span class="text-danger">*</span></label>
                        <input type="text" name="published_papers" class="form-control" required placeholder="e.g. 150+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Research Partners <span class="text-danger">*</span></label>
                        <input type="text" name="research_partners" class="form-control" required placeholder="e.g. 50+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Field Studies <span class="text-danger">*</span></label>
                        <input type="text" name="field_studies" class="form-control" required placeholder="e.g. 200+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Open Access Downloads <span class="text-danger">*</span></label>
                        <input type="text" name="open_access_downloads" class="form-control" required placeholder="e.g. 500K+">
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save Content</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <!-- Edit Modal -->
    @foreach($researchNumbers as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.research-numbers.update', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Research Numbers</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Published Papers <span class="text-danger">*</span></label>
                            <input type="text" name="published_papers" class="form-control" required value="{{ $item->published_papers }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Research Partners <span class="text-danger">*</span></label>
                            <input type="text" name="research_partners" class="form-control" required value="{{ $item->research_partners }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Field Studies <span class="text-danger">*</span></label>
                            <input type="text" name="field_studies" class="form-control" required value="{{ $item->field_studies }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Open Access Downloads <span class="text-danger">*</span></label>
                            <input type="text" name="open_access_downloads" class="form-control" required value="{{ $item->open_access_downloads }}">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

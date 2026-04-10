@extends('admin.layout.main')

@section('title', 'Impact Numbers')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Impact Numbers</h3>
                <p class="text-muted">Manage the 'Impact Numbers' section here. You can only create one record.</p>
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
                                <th>Farmers Empowered</th>
                                <th>Research Projects</th>
                                <th>Countries Active</th>
                                <th>Partner Organizations</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($impactNumbers as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-medium">{{ $item->farmers_empowered }}</td>
                                    <td class="fw-medium">{{ $item->research_projects }}</td>
                                    <td class="fw-medium">{{ $item->countries_active }}</td>
                                    <td class="fw-medium">{{ $item->partner_organizations }}</td>
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

                            @if($impactNumbers->isEmpty())
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
            <form action="{{ route('admin.impactnumbers.store') }}" method="POST" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add Impact Numbers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Farmers Empowered <span class="text-danger">*</span></label>
                        <input type="text" name="farmers_empowered" class="form-control" required placeholder="e.g. 100K+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Research Projects <span class="text-danger">*</span></label>
                        <input type="text" name="research_projects" class="form-control" required placeholder="e.g. 50+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Countries Active <span class="text-danger">*</span></label>
                        <input type="text" name="countries_active" class="form-control" required placeholder="e.g. 10+">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Partner Organizations <span class="text-danger">*</span></label>
                        <input type="text" name="partner_organizations" class="form-control" required placeholder="e.g. 25+">
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
    @foreach($impactNumbers as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.impactnumbers.update', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Impact Numbers</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Farmers Empowered <span class="text-danger">*</span></label>
                            <input type="text" name="farmers_empowered" class="form-control" required value="{{ $item->farmers_empowered }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Research Projects <span class="text-danger">*</span></label>
                            <input type="text" name="research_projects" class="form-control" required value="{{ $item->research_projects }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Countries Active <span class="text-danger">*</span></label>
                            <input type="text" name="countries_active" class="form-control" required value="{{ $item->countries_active }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Partner Organizations <span class="text-danger">*</span></label>
                            <input type="text" name="partner_organizations" class="form-control" required value="{{ $item->partner_organizations }}">
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

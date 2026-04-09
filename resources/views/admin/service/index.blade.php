@extends('admin.layout.main')

@section('title', 'Services')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Services</h3>
                <p class="text-muted">Manage the 'Services' content sections here.</p>
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
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Color</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($whatWeDos as $index => $item)
                                <tr>
                                    <td>{{ $whatWeDos->firstItem() + $index }}</td>
                                    <td>
                                        <div class="bg-light p-2 rounded d-inline-block text-center"
                                            style="width: 40px; height: 40px; color: black;">
                                            <i class="{{ $item->icon }} mt-1 text-dark"></i>
                                        </div>
                                    </td>
                                    <td class="fw-medium">{{ $item->title }}</td>
                                    <td class="text-muted small">
                                        {{ Str::limit($item->description, 50) }}
                                    </td>
                                    <td>
                                        @if($item->color)
                                            <div class="d-flex align-items-center gap-2">
                                                <div
                                                    style="width: 15px; height: 15px; border-radius: 50%; background-color: {{ $item->color }};">
                                                </div>
                                                <small>{{ $item->color }}</small>
                                            </div>
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

                            @if($whatWeDos->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5">
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
                    {{ $whatWeDos->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.service.store') }}" method="POST" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="4" required
                            placeholder="Enter detailed description..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Icon Class</label>
                            <input type="text" name="icon" class="form-control" placeholder="e.g., fa fa-leaf">
                            <small class="text-muted d-block mt-1">FontAwesome class (e.g. 'fa fa-solid fa-star')</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium small">Color</label>
                            <select name="color" class="form-select" required>
                                <option value="" disabled selected>Select a color</option>
                                <option value="red">Red</option>
                                <option value="purple">Purple</option>
                                <option value="blue">Blue</option>
                                <option value="teal">Teal</option>
                                <option value="orange">Orange</option>
                                <option value="green">Green</option>
                            </select>
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
    @foreach($whatWeDos as $item)
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.service.update', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-start">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Content</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required value="{{ $item->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium small">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $item->description }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Icon Class</label>
                                <input type="text" name="icon" class="form-control" placeholder="e.g., fa fa-leaf" value="{{ $item->icon }}">
                                <small class="text-muted d-block mt-1">FontAwesome class (e.g. 'fa fa-solid fa-star')</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium small">Color</label>
                                <select name="color" class="form-select" required>
                                    <option value="" disabled>Select a color</option>
                                    <option value="red" {{ $item->color == 'red' ? 'selected' : '' }}>Red</option>
                                    <option value="purple" {{ $item->color == 'purple' ? 'selected' : '' }}>Purple</option>
                                    <option value="blue" {{ $item->color == 'blue' ? 'selected' : '' }}>Blue</option>
                                    <option value="teal" {{ $item->color == 'teal' ? 'selected' : '' }}>Teal</option>
                                    <option value="orange" {{ $item->color == 'orange' ? 'selected' : '' }}>Orange</option>
                                    <option value="green" {{ $item->color == 'green' ? 'selected' : '' }}>Green</option>
                                </select>
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
                <form action="{{ route('admin.service.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x animate__animated animate__heartBeat"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete "{{ $item->title }}"? This process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection
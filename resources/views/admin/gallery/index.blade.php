@extends('admin.layout.main')

@section('title', 'Gallery')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Gallery</h3>
                <p class="text-muted">Manage your photo galleries.</p>
            </div>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa fa-plus me-2"></i> Add New Gallery
            </a>
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

            <div class="premium-card p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Feature Image</th>
                                <th>Title</th>
                                <th>Images</th>
                                <th>Created</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $index => $item)
                                <tr>
                                    <td>{{ $galleries->firstItem() + $index }}</td>
                                    <td>
                                        @if($item->feature_image)
                                            <img src="{{ asset($item->feature_image) }}" class="rounded shadow-sm"
                                                style="width: 80px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted"
                                                style="width: 80px; height: 50px;">
                                                <i class="fa fa-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-medium text-dark">{{ Str::limit($item->title, 50) }}</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">
                                            {{ $item->images_count }} {{ Str::plural('image', $item->images_count) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->created_at?->format('M d, Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('admin.gallery.edit', $item->id) }}"
                                                class="btn btn-sm btn-light text-primary border shadow-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-light text-danger border shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if($galleries->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-images fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No galleries found</h5>
                                        <p class="text-muted small">Click 'Add New Gallery' to create your first gallery.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    {{ $galleries->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    @foreach($galleries as $item)
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST"
                    class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete this gallery and all of its images? This
                        process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

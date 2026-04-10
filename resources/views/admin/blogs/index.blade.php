@extends('admin.layout.main')

@section('title', 'Blogs')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Blog Posts</h3>
                <p class="text-muted">Manage your articles and news.</p>
            </div>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fa fa-plus me-2"></i> Create New Post
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
                                <th>Thumbnail</th>
                                <th>Title & Category</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $index => $item)
                                <tr>
                                    <td>{{ $blogs->firstItem() + $index }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" class="rounded shadow-sm"
                                                style="width: 80px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted"
                                                style="width: 80px; height: 50px;">
                                                <i class="fa fa-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-medium text-dark">{{ Str::limit($item->title, 40) }}</div>
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary small mt-1">{{ $item->category }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->author_image)
                                                <img src="{{ asset($item->author_image) }}" class="rounded-circle me-2"
                                                    style="width: 25px; height: 25px; object-fit: cover;">
                                            @endif
                                            <span class="small">{{ $item->author_name ?? 'Anonymous' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $item->date->format('M d, Y') }}</td>
                                    <td>
                                        @if($item->is_featured)
                                            <span class="badge bg-success shadow-sm">Featured</span>
                                        @else
                                            <span class="badge bg-light text-muted border">Standard</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('admin.blogs.show', $item->id) }}"
                                                class="btn btn-sm btn-light text-info border shadow-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blogs.edit', $item->id) }}"
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

                            @if($blogs->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-blog fa-3x opacity-50"></i></div>
                                        <h5 class="fw-medium text-muted">No blog posts found</h5>
                                        <p class="text-muted small">Click 'Create New Post' to write your first article.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>



                <div class="mt-4 d-flex justify-content-end">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    @foreach($blogs as $item)
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="{{ route('admin.blogs.destroy', $item->id) }}" method="POST"
                    class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Are you sure?</h4>
                    <p class="text-muted small">Do you really want to delete this blog post? This process cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
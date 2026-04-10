@extends('admin.layout.main')

@section('title', 'FAQs')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Frequently Asked Questions</h3>
                <p class="text-muted">Manage the questions and answers for your help section.</p>
            </div>
            <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fa fa-plus me-2"></i> Add New FAQ
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="premium-card p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 80px;">Order</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $item)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-primary border rounded-pill px-3">{{ $item->order }}</span>
                                    </td>
                                    <td class="fw-bold text-dark">{{ Str::limit($item->question, 50) }}</td>
                                    <td class="text-muted small">{{ Str::limit($item->answer, 100) }}</td>
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

                            @if($faqs->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-question-circle fa-3x opacity-25"></i></div>
                                        <h5 class="fw-medium text-muted">No FAQs found</h5>
                                        <p class="text-muted small">Click the "Add New FAQ" button to create your first one.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.faqs.store') }}" method="POST" class="modal-content border-0 shadow-lg">
                @csrf
                <div class="modal-header border-0 pb-0">
                    <h5 class="fw-bold">Add New FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Question</label>
                        <input type="text" name="question" class="form-control" required placeholder="e.g. What is AgriScience?">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Answer</label>
                        <textarea name="answer" class="form-control" rows="4" required placeholder="Provide a detailed answer..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Display Order</label>
                        <input type="number" name="order" class="form-control" value="0">
                        <small class="text-muted small">Lower numbers appear first.</small>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>

    @foreach($faqs as $item)
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.faqs.update', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-0 pb-0">
                        <h5 class="fw-bold">Edit FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Question</label>
                            <input type="text" name="question" class="form-control" required value="{{ $item->question }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Answer</label>
                            <textarea name="answer" class="form-control" rows="4" required>{{ $item->answer }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Display Order</label>
                            <input type="number" name="order" class="form-control" value="{{ $item->order }}">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Update FAQ</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="{{ route('admin.faqs.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Delete FAQ?</h4>
                    <p class="text-muted small">Are you sure you want to remove this question? This action cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

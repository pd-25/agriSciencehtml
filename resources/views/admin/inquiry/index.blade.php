@extends('admin.layout.main')

@section('title', 'Inquiries')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Inquiries & Messages</h3>
                <p class="text-muted">Manage messages from the contact us page.</p>
            </div>
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
                                <th>Status</th>
                                <th>Sender</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inquiries as $item)
                                <tr id="row-{{ $item->id }}" class="{{ $item->is_read ? '' : 'fw-bold' }}">
                                    <td>
                                        @if($item->is_read)
                                            <span class="badge bg-light text-muted border rounded-pill px-3">Read</span>
                                        @else
                                            <span class="badge bg-success text-white border-0 rounded-pill px-3">New</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2 bg-light rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="fa fa-user text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-dark">{{ $item->name }}</div>
                                                <small class="text-muted">{{ $item->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->subject }}</td>
                                    <td>
                                        <div class="small text-muted">
                                            {{ $item->created_at->format('M d, Y') }}<br>
                                            <span class="x-small">{{ $item->created_at->format('h:i A') }}</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="btn btn-sm btn-light text-primary border shadow-sm view-inquiry"
                                                data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-light text-danger border shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if($inquiries->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted mb-3"><i class="fa fa-envelope-open fa-3x opacity-25"></i></div>
                                        <h5 class="fw-medium text-muted">No inquiries yet</h5>
                                        <p class="text-muted small">Messages from the contact form will appear here.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $inquiries->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="fw-bold">Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <div id="loading-spinner" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div id="inquiry-content" style="display: none;">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Full Name</label>
                                <p id="detail-name" class="fw-bold text-dark fs-5 mb-0"></p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <label class="form-label small fw-bold text-muted text-uppercase">Date Received</label>
                                <p id="detail-date" class="text-dark mb-0"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                                <p class="mb-0"><a href="" id="detail-email" class="text-primary text-decoration-none"></a></p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <label class="form-label small fw-bold text-muted text-uppercase">Phone Number</label>
                                <p id="detail-phone" class="text-dark mb-0"></p>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="p-3 bg-light rounded-3">
                                    <label class="form-label small fw-bold text-muted text-uppercase mb-2">Subject: <span id="detail-subject" class="text-dark"></span></label>
                                    <hr class="my-2 opacity-10">
                                    <p id="detail-message" class="text-dark mb-0" style="white-space: pre-wrap;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($inquiries as $item)
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <form action="{{ route('admin.inquiries.destroy', $item->id) }}" method="POST" class="modal-content border-0 shadow-lg text-center p-4">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3 text-danger">
                        <i class="fa fa-exclamation-circle fa-4x"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Delete Inquiry?</h4>
                    <p class="text-muted small">Are you sure you want to remove this message? This action cannot be undone.</p>
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.view-inquiry').on('click', function() {
        const id = $(this).data('id');
        const url = "{{ route('admin.inquiries.show', ':id') }}".replace(':id', id);
        
        // Reset and show spinner
        $('#inquiry-content').hide();
        $('#loading-spinner').show();
        
        $.get(url, function(data) {
            $('#detail-name').text(data.name);
            $('#detail-email').text(data.email).attr('href', 'mailto:' + data.email);
            $('#detail-phone').text(data.phone || 'N/A');
            $('#detail-subject').text(data.subject);
            $('#detail-message').text(data.message);
            
            // Format date
            const date = new Date(data.created_at);
            $('#detail-date').text(date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            }));
            
            $('#loading-spinner').hide();
            $('#inquiry-content').fadeIn();
            
            // Mark as read in UI
            const row = $('#row-' + id);
            row.removeClass('fw-bold');
            row.find('.badge').removeClass('bg-success text-white').addClass('bg-light text-muted border-0').text('Read');
        });
    });
});
</script>
@endpush

@extends('admin.layout.main')

@section('title', 'Preview Blog')

@section('content')
    <div class="row mb-4 animate__animated animate__fadeIn">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-1">Preview Article</h3>
                <p class="text-muted">Viewing: {{ $blog->title }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border rounded-pill px-4 shadow-sm">
                    <i class="fa fa-arrow-left me-2"></i> Back
                </a>
                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="fa fa-edit me-2"></i> Edit Post
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="premium-card p-0 overflow-hidden mb-4">
                @if($blog->image)
                    <img src="{{ asset($blog->image) }}" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
                @endif
                
                <div class="p-5">
                    <div class="mb-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">{{ $blog->category }}</span>
                        @if($blog->is_featured)
                            <span class="badge bg-success ms-2 px-3 py-2 rounded-pill">Featured</span>
                        @endif
                    </div>

                    <h1 class="fw-bold mb-4" style="font-size: 2.5rem; color: #1a202c;">{{ $blog->title }}</h1>

                    <div class="d-flex align-items-center mb-5 pb-4 border-bottom">
                        @if($blog->author_image)
                            <img src="{{ asset($blog->author_image) }}" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <div class="bg-light rounded-circle me-3 d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 50px; height: 50px;">
                                {{ strtoupper(substr($blog->author_name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <div class="fw-bold text-dark">{{ $blog->author_name ?? 'Anonymous' }}</div>
                            <div class="text-muted small">
                                <i class="fa fa-calendar-alt me-1"></i> {{ $blog->date->format('F d, Y') }}
                                @if($blog->read_time)
                                    <span class="ms-3"><i class="fa fa-clock me-1"></i> {{ $blog->read_time }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($blog->excerpt)
                        <div class="lead fw-medium mb-4 p-3 bg-light rounded border-start border-primary border-4">
                            "{{ $blog->excerpt }}"
                        </div>
                    @endif

                    <div class="blog-content text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

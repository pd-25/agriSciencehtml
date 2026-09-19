@extends('frontend.layout.main')
@section('title', $gallery->title)
@section('content')
<!-- Page Header -->
<section class="page-header" style="padding: 140px 0 70px;">
    <div class="container">
        <h1>{{ $gallery->title }}</h1>
        <p>{{ $gallery->images->count() }} {{ Str::plural('photo', $gallery->images->count()) }}
            @if($gallery->created_at) &middot; {{ $gallery->created_at->format('M d, Y') }} @endif
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('gallery') }}">Gallery</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($gallery->title, 40) }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Images -->
<section class="section-padding">
    <div class="container">
        @if($gallery->images->isEmpty())
            <div class="text-center py-5 reveal">
                <i class="bi bi-image" style="font-size:3.5rem;color:var(--gray-400);"></i>
                <h4 class="mt-4">No photos in this gallery yet</h4>
                <a href="{{ route('gallery') }}" class="btn-agri mt-3"><i class="bi bi-arrow-left"></i> Back to Gallery</a>
            </div>
        @else
            <div class="row g-4">
                @foreach($gallery->images as $index => $image)
                <div class="col-6 col-md-4 reveal">
                    <button type="button" class="gallery-thumb" data-index="{{ $index }}"
                        data-bs-toggle="modal" data-bs-target="#galleryLightbox"
                        aria-label="View photo {{ $index + 1 }} of {{ $gallery->images->count() }}">
                        <img src="{{ asset($image->image) }}" alt="{{ $gallery->title }} — photo {{ $index + 1 }}" loading="lazy">
                    </button>
                </div>
                @endforeach
            </div>
        @endif

        <div class="text-center mt-5 reveal">
            <a href="{{ route('gallery') }}" class="btn-agri-outline"><i class="bi bi-arrow-left"></i> Back to All Galleries</a>
        </div>
    </div>
</section>

<!-- More Galleries -->
@if($otherGalleries->isNotEmpty())
<section class="section-padding-sm bg-light-custom">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-badge">Explore More</span>
            <h2 class="section-title">Other Galleries</h2>
        </div>
        <div class="row g-4">
            @foreach($otherGalleries as $other)
            <div class="col-md-6 col-lg-4 reveal">
                @include('frontend.partials.gallery-card', ['gallery' => $other])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Lightbox -->
@if($gallery->images->isNotEmpty())
<div class="modal fade gallery-lightbox" id="galleryLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content position-relative">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div id="galleryLightboxCarousel" class="carousel slide">
                <div class="carousel-inner">
                    @foreach($gallery->images as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset($image->image) }}" alt="{{ $gallery->title }} — photo {{ $index + 1 }}">
                    </div>
                    @endforeach
                </div>
                @if($gallery->images->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#galleryLightboxCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galleryLightboxCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection

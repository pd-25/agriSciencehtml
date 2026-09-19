<a href="{{ route('gallery.show', $gallery->id) }}" class="gallery-card">
    <div class="gallery-card-media">
        @if($gallery->feature_image)
            <img src="{{ asset($gallery->feature_image) }}" alt="{{ $gallery->title }}" loading="lazy">
        @else
            <div class="gallery-card-empty"><i class="bi bi-images"></i></div>
        @endif
    </div>

    <span class="gallery-card-count">
        <i class="bi bi-camera"></i> {{ $gallery->images_count }}
    </span>

    <div class="gallery-card-body">
        <h5>{{ $gallery->title }}</h5>
        @if($gallery->created_at)
            <span class="gallery-card-date"><i class="bi bi-calendar3 me-1"></i>{{ $gallery->created_at->format('M d, Y') }}</span>
        @endif
        <span class="gallery-card-cta">View Gallery <i class="bi bi-arrow-right"></i></span>
    </div>
</a>

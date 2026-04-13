@extends('frontend.layout.main')
@section('title', $blog->title)
@section('content')
@php
    $catMeta = [
        'farming' => ['label' => 'Farming Practices', 'style' => 'background:rgba(45,106,79,.1);color:var(--primary);'],
        'technology' => ['label' => 'AgriTech', 'style' => 'background:rgba(33,150,243,.1);color:#2196f3;'],
        'community' => ['label' => 'Community Stories', 'style' => 'background:rgba(212,163,115,.12);color:#b07d3d;'],
        'policy' => ['label' => 'Policy & Advocacy', 'style' => 'background:rgba(156,39,176,.08);color:#9c27b0;'],
    ];
@endphp

<!-- Page Header (Minimal for Details) -->
<section class="page-header" style="padding: 60px 0;">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-3">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('articles') }}">Blog</a></li>
          <li class="breadcrumb-item active">{{ $blog->category }}</li>
        </ol>
      </nav>
      <h1 style="font-size: 2.5rem; line-height: 1.2;">{{ $blog->title }}</h1>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <!-- Featured Image -->
                    <div class="mb-5" style="border-radius: var(--radius-lg); overflow: hidden; height: 450px; background: #eee;">
                        @if($blog->image)
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-light)); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-image text-white" style="font-size: 5rem;"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Meta & Author -->
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-4 mb-5 pb-4 border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            @if($blog->author_image && strlen($blog->author_image) <= 2)
                                <div class="author-avatar" style="width:50px;height:50px;font-size:1rem;background:linear-gradient(135deg,var(--primary),var(--primary-light));">{{ $blog->author_image }}</div>
                            @else
                                <div class="author-avatar" style="width:50px;height:50px;"><img src="{{ asset($blog->author_image) }}" alt="" style="width: 100%; height: 100%; border-radius: 50%;"></div>
                            @endif
                            <div>
                                <strong class="db mb-1" style="display: block;">{{ $blog->author_name }}</strong>
                                <span class="text-muted small">{{ $blog->date->format('M d, Y') }} &middot; {{ $blog->read_time }}</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                             <span class="card-tag m-0" style="{{ $catMeta[$blog->category]['style'] ?? '' }}">{{ $catMeta[$blog->category]['label'] ?? ucfirst($blog->category) }}</span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="article-body reveal" style="font-size: 1.1rem; line-height: 1.8; color: var(--gray-700);">
                        {!! $blog->content !!}
                        
                        {{-- If content is empty, show a sample placeholder --}}
                        @if(!$blog->content || $blog->content == 'Full article content here...')
                            <p class="mb-4">Sustainable agriculture is at the heart of our mission. As the climate continues to change, the necessity for innovative farming techniques becomes ever more apparent. In this article, we explore the deep connection between soil health and long-term crop resilience.</p>
                            
                            <h3 class="mt-5 mb-3" style="color: var(--primary);">The Foundation of Growth</h3>
                            <p class="mb-4">Healthy soil is more than just dirt; it's a living ecosystem. By practicing minimal tillage and incorporating cover crops, farmers can significantly increase the organic matter in their soil. This leads to better water retention and nutrient availability, even during drought periods.</p>
                            
                            <blockquote class="p-4 mb-4 border-start border-4 border-primary bg-light" style="font-style: italic; font-size: 1.2rem;">
                                "Agriculture is our wisest pursuit, because it will in the end contribute most to real wealth, good morals, and happiness."
                            </blockquote>
                            
                            <p>Moving forward, AgriScience remains committed to providing the data and tools necessary for farmers worldwide to thrive. Our research into drought-resistant varieties is already showing promising results in field studies across Sub-Saharan Africa.</p>
                        @endif
                    </div>

                    
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <!-- Categories Widget -->
                    <div class="card border-0 shadow-sm mb-4 p-4" style="border-radius: var(--radius-lg);">
                        <h5 class="mb-4" style="color: var(--primary);">Categories</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach($catMeta as $key => $meta)
                                <li class="mb-2 pb-2 border-bottom last-child-0">
                                    <a href="#" class="text-decoration-none text-dark d-flex justify-content-between align-items-center">
                                        <span>{{ $meta['label'] }}</span>
                                        <i class="bi bi-chevron-right small text-muted"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="card border-0 shadow-sm p-4" style="border-radius: var(--radius-lg);">
                        <h5 class="mb-4" style="color: var(--primary);">Recent Articles</h5>
                        <div class="d-flex flex-column gap-4">
                            @foreach($recentBlogs as $recent)
                                <a href="{{ route('blogs.show', $recent->slug) }}" class="text-decoration-none text-dark d-flex gap-3">
                                    <div style="width: 80px; height: 60px; border-radius: var(--radius-sm); overflow: hidden; flex-shrink: 0; background: #eee;">
                                        @if($recent->image)
                                            <img src="{{ asset($recent->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-light));"></div>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-1" style="font-size: .95rem; line-height: 1.4;">{{ Str::limit($recent->title, 45) }}</h6>
                                        <span class="text-muted" style="font-size: .8rem;">{{ $recent->date->format('M d, Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- CTA Widget -->
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles Carousel (Optional) -->
<section class="section-padding bg-light-custom">
    <div class="container">
        <h3 class="mb-5 text-center">You Might Also Like</h3>
        <div class="row g-4">
            @foreach($recentBlogs as $related)
                <div class="col-md-4">
                    <div class="blog-card bg-white shadow-sm h-100">
                        <div class="card-img-top" style="height: 200px; background: #eee;">
                            @if($related->image)
                                <img src="{{ asset($related->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-light));"></div>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <span class="card-tag" style="{{ $catMeta[$related->category]['style'] ?? '' }}">{{ $catMeta[$related->category]['label'] ?? ucfirst($related->category) }}</span>
                            <h5 class="card-title">{{ Str::limit($related->title, 50) }}</h5>
                            <a href="{{ route('blogs.show', $related->slug) }}" class="read-more mt-3 d-inline-block">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

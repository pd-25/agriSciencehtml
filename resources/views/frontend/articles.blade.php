@extends('frontend.layout.main')
@section('title', 'Articles & Blog')
@section('content')
<!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Articles & Blog</h1>
      <p>Stories from the field, expert insights, and the latest in sustainable agriculture.</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.html">Home</a></li>
          <li class="breadcrumb-item active">Blog</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Featured Post -->
  <section class="section-padding">
    <div class="container">
      @if($featuredBlog)
      <div class="row align-items-center g-5 mb-5 reveal">
        <div class="col-lg-6">
          <div class="img-placeholder" style="height:360px;border-radius:var(--radius-lg); overflow: hidden;">
            @if($featuredBlog->image)
              <img src="{{ asset($featuredBlog->image) }}" alt="{{ $featuredBlog->title }}" style="width:100%; height:100%; object-fit:cover;">
            @else
              <i class="bi bi-image"></i>
            @endif
          </div>
        </div>
        <div class="col-lg-6">
          <span class="section-badge">Featured Article</span>
          <h2 class="section-title" style="font-size:1.8rem;">{{ $featuredBlog->title }}</h2>
          <p class="text-muted mb-3">{{ $featuredBlog->excerpt }}</p>
          <div class="d-flex align-items-center gap-3 mb-4">
            @if($featuredBlog->author_image && strlen($featuredBlog->author_image) <= 2)
              <div class="author-avatar" style="width:40px;height:40px;font-size:.85rem;background:linear-gradient(135deg,var(--primary),var(--primary-light));">{{ $featuredBlog->author_image }}</div>
            @else
              <div class="author-avatar" style="width:40px;height:40px;"><img src="{{ asset($featuredBlog->author_image) }}" alt=""></div>
            @endif
            <div>
              <strong style="font-size:.9rem;">{{ $featuredBlog->author_name }}</strong>
              <div style="font-size:.8rem;color:var(--gray-600);">{{ $featuredBlog->date->format('M d, Y') }} &middot; {{ $featuredBlog->read_time }}</div>
            </div>
          </div>
          <a href="" class="btn-agri"><i class="bi bi-arrow-right"></i> Read Full Article</a>
        </div>
      </div>
      @endif

      <!-- Filter Tabs -->
      <div class="filter-tabs reveal">
        <button class="filter-tab active" data-filter="all">All Posts</button>
        <button class="filter-tab" data-filter="farming">Farming Practices</button>
        <button class="filter-tab" data-filter="technology">AgriTech</button>
        <button class="filter-tab" data-filter="community">Community Stories</button>
        <button class="filter-tab" data-filter="policy">Policy & Advocacy</button>
      </div>

      <!-- Blog Grid -->
      <div class="row g-4">
        @php
            $catMeta = [
                'farming' => ['label' => 'Farming Practices', 'style' => ''],
                'technology' => ['label' => 'AgriTech', 'style' => 'background:rgba(33,150,243,.1);color:#2196f3;'],
                'community' => ['label' => 'Community Stories', 'style' => 'background:rgba(212,163,115,.12);color:#b07d3d;'],
                'policy' => ['label' => 'Policy & Advocacy', 'style' => 'background:rgba(156,39,176,.08);color:#9c27b0;'],
            ];
        @endphp

        @foreach($blogs as $blog)
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="{{ $blog->category }}">
          <div class="blog-card">
            <div class="card-img-top" style="overflow: hidden; background: #eee;">
              @if($blog->image)
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width:100%; height:100%; object-fit:cover;">
              @else
                <div style="width:100%; height:100%; background:linear-gradient(135deg,var(--primary),var(--primary-light)); opacity: 0.8;"></div>
              @endif
            </div>
            <div class="card-body">
              <span class="card-tag" style="{{ $catMeta[$blog->category]['style'] ?? '' }}">{{ $catMeta[$blog->category]['label'] ?? ucfirst($blog->category) }}</span>
              <h5 class="card-title">{{ $blog->title }}</h5>
              <p class="card-text">{{ Str::limit($blog->excerpt, 120) }}</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> {{ $blog->date->format('M d, Y') }}</span>
                <a href="{{ route('blogs.show', $blog->slug) }}" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Load More -->
      <div class="text-center mt-5 reveal">
        <button class="btn-agri-outline"><i class="bi bi-arrow-clockwise"></i> Load More Articles</button>
      </div>
    </div>
  </section>

  <!-- Newsletter CTA -->
  <section class="cta-section section-padding-sm">
    <div class="container position-relative text-center" style="z-index:1;">
      <div class="row justify-content-center reveal">
        <div class="col-lg-7">
          <h2 class="section-title" style="font-size:2rem;">Never Miss a Story</h2>
          <p class="mb-4 opacity-75">Subscribe to our newsletter for weekly articles, research updates, and field stories.</p>
          <div class="newsletter-form mx-auto">
            <input type="email" placeholder="Your email address">
            <button class="btn-agri-white" style="padding:12px 24px;">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
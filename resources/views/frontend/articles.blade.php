@extends('frontend.layout.main')
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
      <div class="row align-items-center g-5 mb-5 reveal">
        <div class="col-lg-6">
          <div class="img-placeholder" style="height:360px;border-radius:var(--radius-lg);"><i class="bi bi-image"></i></div>
        </div>
        <div class="col-lg-6">
          <span class="section-badge">Featured Article</span>
          <h2 class="section-title" style="font-size:1.8rem;">How Climate-Smart Agriculture Is Transforming Smallholder Farming in Sub-Saharan Africa</h2>
          <p class="text-muted mb-3">An in-depth look at how AgriScience's climate adaptation programs have helped 12,000 farmers in Kenya, Tanzania, and Uganda build resilience against increasingly unpredictable weather patterns.</p>
          <div class="d-flex align-items-center gap-3 mb-4">
            <div class="author-avatar" style="width:40px;height:40px;font-size:.85rem;background:linear-gradient(135deg,var(--primary),var(--primary-light));">LO</div>
            <div>
              <strong style="font-size:.9rem;">Dr. Lena Ochieng</strong>
              <div style="font-size:.8rem;color:var(--gray-600);">March 15, 2026 &middot; 8 min read</div>
            </div>
          </div>
          <a href="#" class="btn-agri"><i class="bi bi-arrow-right"></i> Read Full Article</a>
        </div>
      </div>

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
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="farming">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#74c69d,#2d6a4f);"></div>
            <div class="card-body">
              <span class="card-tag">Farming Practices</span>
              <h5 class="card-title">5 Organic Pest Control Methods Every Farmer Should Know</h5>
              <p class="card-text">Discover natural and effective ways to protect your crops without relying on harmful chemical pesticides. From neem oil to companion planting.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Mar 10, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="technology">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#52b788,#40916c);"></div>
            <div class="card-body">
              <span class="card-tag" style="background:rgba(33,150,243,.1);color:#2196f3;">AgriTech</span>
              <h5 class="card-title">Satellite Imaging: The Future of Precision Agriculture</h5>
              <p class="card-text">How AgriScience is using satellite data to provide farmers with actionable insights about soil moisture, crop health, and optimal planting times.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Mar 5, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="community">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#d4a373,#b07d3d);"></div>
            <div class="card-body">
              <span class="card-tag" style="background:rgba(212,163,115,.12);color:#b07d3d;">Community Stories</span>
              <h5 class="card-title">Meet Priya: From Struggling Farmer to Cooperative Leader</h5>
              <p class="card-text">The inspiring journey of a woman in rural Maharashtra who transformed her community through AgriScience's cooperative farming training.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Feb 28, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="policy">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#95d5b2,#52b788);"></div>
            <div class="card-body">
              <span class="card-tag" style="background:rgba(156,39,176,.08);color:#9c27b0;">Policy & Advocacy</span>
              <h5 class="card-title">Why Governments Must Invest in Soil Health Legislation</h5>
              <p class="card-text">A policy brief on the economic and environmental case for national soil protection laws, drawing on AgriScience's 10-year longitudinal data.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Feb 20, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="farming">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#b7e4c7,#74c69d);"></div>
            <div class="card-body">
              <span class="card-tag">Farming Practices</span>
              <h5 class="card-title">Agroforestry 101: Integrating Trees Into Your Farm</h5>
              <p class="card-text">Learn how combining forestry with agriculture can improve soil fertility, increase biodiversity, and create additional income streams for farmers.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Feb 14, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="technology">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#1b4332,#2d6a4f);"></div>
            <div class="card-body">
              <span class="card-tag" style="background:rgba(33,150,243,.1);color:#2196f3;">AgriTech</span>
              <h5 class="card-title">Mobile Apps That Are Revolutionizing Farm Management</h5>
              <p class="card-text">A review of the top digital tools transforming how smallholder farmers track crops, access markets, and receive weather advisories.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Feb 8, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="community">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#e9c46a,#d4a373);"></div>
            <div class="card-body">
              <span class="card-tag" style="background:rgba(212,163,115,.12);color:#b07d3d;">Community Stories</span>
              <h5 class="card-title">Youth in Agriculture: Breaking the Rural Exodus Cycle</h5>
              <p class="card-text">How AgriScience's youth programs are making farming attractive to the next generation and reversing the trend of rural-to-urban migration.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Jan 30, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="farming">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#40916c,#52b788);"></div>
            <div class="card-body">
              <span class="card-tag">Farming Practices</span>
              <h5 class="card-title">Cover Crops: Your Soil's Best Friend During Off-Season</h5>
              <p class="card-text">Understanding the science behind cover cropping and how it can dramatically improve soil health, reduce erosion, and suppress weeds naturally.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Jan 22, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal filterable-card" data-category="policy">
          <div class="blog-card">
            <div class="card-img-top" style="background:linear-gradient(135deg,#2d6a4f,#1b4332);"></div>
            <div class="card-body">
              <span class="card-tag" style="background:rgba(156,39,176,.08);color:#9c27b0;">Policy & Advocacy</span>
              <h5 class="card-title">Fair Trade 2.0: Reimagining Global Agricultural Commerce</h5>
              <p class="card-text">Our vision for a more equitable global food trade system that puts smallholder farmers at the center of value chains.</p>
              <div class="card-meta">
                <span><i class="bi bi-calendar3 me-1"></i> Jan 15, 2026</span>
                <a href="#" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
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
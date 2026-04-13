@extends('frontend.layout.main')
@section('content')
<!-- Section 1: Hero -->
  <section class="hero-section">
    <!-- Decorative shapes -->
    <div class="hero-shape hero-shape-1"></div>
    <div class="hero-shape hero-shape-2"></div>
    <div class="hero-shape hero-shape-3"></div>
    <div class="hero-grain"></div>

    <div class="container position-relative" style="z-index:2;">
      <div class="row align-items-center g-5">
        <!-- Left Column — Text -->
        <div class="col-lg-6 hero-content">
          <div class="hero-badge">
            <span class="hero-badge-dot"></span>
            Non-Profit Organization
            <i class="bi bi-arrow-up-right"></i>
          </div>
          <h1 class="hero-title">Cultivating a <span class="highlight">Sustainable</span> Future for Agriculture</h1>
          <p class="hero-text">AgriScience partners with farming communities worldwide to advance scientific research, promote sustainable practices, and build resilient food systems for future generations.</p>
          <div class="hero-buttons">
            <a href="aboutus.html" class="btn-agri"><i class="bi bi-play-circle"></i> Discover Our Mission</a>
            <a href="services.html" class="btn-agri-outline"><i class="bi bi-grid-3x3-gap"></i> Our Programs</a>
          </div>
          <div class="hero-stats">
            <div class="stat">
              <h3 data-count="12" data-suffix="+">0</h3>
              <p>Years of Impact</p>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
              <h3 data-count="50000" data-suffix="+">0</h3>
              <p>Farmers Supported</p>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
              <h3 data-count="28">0</h3>
              <p>Countries Reached</p>
            </div>
          </div>
        </div>

        <!-- Right Column — Visual -->
        <div class="col-lg-6">
          <div class="hero-image-wrapper">
            <div class="hero-img-grid">
              <div class="hero-img-main img-placeholder"><i class="bi bi-image"></i></div>
              <div class="hero-img-secondary img-placeholder"><i class="bi bi-image"></i></div>
            </div>
            <div class="hero-float-card card-1">
              <div class="icon-box green"><i class="bi bi-leaf"></i></div>
              <div>
                <h6>Eco Farming</h6>
                <p>100% Organic Methods</p>
              </div>
            </div>
            <div class="hero-float-card card-2">
              <div class="icon-box orange"><i class="bi bi-graph-up-arrow"></i></div>
              <div>
                <h6>40% Yield Boost</h6>
                <p>Through Smart Practices</p>
              </div>
            </div>
            <div class="hero-float-card card-3">
              <div class="icon-box-round">
                <i class="bi bi-people-fill"></i>
              </div>
              <div>
                <h6>50K+ Farmers</h6>
                <p>Trained Worldwide</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom wave -->
    <div class="hero-wave">
      <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <path d="M0 40C240 80 480 100 720 80C960 60 1200 20 1440 40V100H0V40Z" fill="#ffffff"/>
      </svg>
    </div>
  </section>

  <!-- Section 2: What We Do -->
  <section class="section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">What We Do</span>
        <h2 class="section-title">Transforming Agriculture<br>Through Innovation</h2>
        <p class="section-subtitle mx-auto">We bridge the gap between cutting-edge agricultural research and the communities that need it most.</p>
      </div>
      <div class="row g-4">
        @foreach ($whatWeDo as $item)
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle {{ $item->color }}"><i class="{{ $item->icon }}"></i></div>
            <h5>{{ $item->title }}</h5>
            <p>{{ $item->description }}</p>
          </div>
        </div>
        @endforeach
        <!-- <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle orange"><i class="bi bi-mortarboard"></i></div>
            <h5>Farmer Education</h5>
            <p>Training programs and workshops that empower smallholder farmers with modern agricultural knowledge.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle teal"><i class="bi bi-search"></i></div>
            <h5>Applied Research</h5>
            <p>Conducting field studies to develop practical, science-backed solutions for real farming challenges.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle blue"><i class="bi bi-droplet"></i></div>
            <h5>Water Management</h5>
            <p>Innovative irrigation and water conservation strategies for drought-prone agricultural regions.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle purple"><i class="bi bi-people"></i></div>
            <h5>Community Development</h5>
            <p>Building stronger rural communities through cooperative farming models and market access initiatives.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle red"><i class="bi bi-shield-check"></i></div>
            <h5>Food Security</h5>
            <p>Working to ensure reliable access to nutritious, affordable food across underserved populations.</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Section 3: Impact Numbers -->
  <section class="impact-section section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge" style="background:rgba(255,255,255,.12);color:#fff;">Our Impact</span>
        <h2 class="section-title" style="color:#fff;">Numbers That Tell Our Story</h2>
      </div>
      <div class="row g-4">
        <div class="col-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="{{ $impact->farmers_empowered }}" data-suffix="+">0</h2>
            <p>Farmers Empowered</p>
          </div>
        </div>
        <div class="col-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="{{ $impact->research_projects }}" data-suffix="+">0</h2>
            <p>Research Projects</p>
          </div>
        </div>
        <div class="col-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="{{ $impact->countries_active }}">0</h2>
            <p>Countries Active</p>
          </div>
        </div>
        <div class="col-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="{{ $impact->partner_organizations }}" data-suffix="+">0</h2>
            <p>Partner Organizations</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 4: About Snippet -->
  <section class="section-padding bg-light-custom">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 reveal">
          <div class="about-visual">
            <div class="main-img img-placeholder" style="height:380px;"><img src="{{ asset($about->image) }}" alt=""></div>
            <div class="experience-badge">
              <h3>{{ $about->experience_years }}+</h3>
              <p>Years of Service</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 reveal">
          <span class="section-badge">About AgriScience</span>
          <h2 class="section-title">{{ $about->title }}</h2>
          <p class="text-muted mb-4">{{ $about -> description }}</p>
          <ul class="about-list">
            @foreach ($about->list_items as $item)
            <li><i class="bi bi-check2"></i> {{ $item }}</li>
            @endforeach
          </ul>
          <a href="{{ route('about') }}" class="btn-agri mt-3"><i class="bi bi-arrow-right"></i> Learn More About Us</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 5: Testimonials -->
  <section class="section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Voices from the Field</span>
        <h2 class="section-title">What Our Community Says</h2>
      </div>
      <div class="row g-4">
        @foreach ($testimonials as $testimonial)
        <div class="col-md-6 col-lg-4 reveal">
          <div class="testimonial-card">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <p>{{ $testimonial->feedback }}</p>
            <div class="author">
              <div class="author-avatar"><img src="{{ asset($testimonial->image) }}" alt=""></div>
              <div>
                <h6>{{ $testimonial->name }}</h6>
                <span>{{ $testimonial->designation }}</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- <div class="col-md-6 col-lg-4 reveal">
          <div class="testimonial-card">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <p>"The water management solutions introduced by AgriScience saved our village during the worst drought in decades. Their approach is truly life-changing."</p>
            <div class="author">
              <div class="author-avatar" style="background:linear-gradient(135deg,var(--accent),#b07d3d);">AM</div>
              <div>
                <h6>Amina Mwangi</h6>
                <span>Community Leader, Kenya</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="testimonial-card">
            <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
            <p>"As a research partner, I've seen firsthand how AgriScience translates lab findings into practical tools that farmers can actually use. Remarkable work."</p>
            <div class="author">
              <div class="author-avatar" style="background:linear-gradient(135deg,#2196f3,#1565c0);">DS</div>
              <div>
                <h6>Dr. Sarah Chen</h6>
                <span>Agricultural Scientist, Australia</span>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Section 6: CTA -->
  <section class="cta-section section-padding">
    <div class="container position-relative" style="z-index:1;">
      <div class="row justify-content-center reveal">
        <div class="col-lg-8">
          <h2 class="section-title">Join Us in Building a<br>Sustainable Food Future</h2>
          <p class="mb-4 opacity-75" style="font-size:1.1rem;">Whether you're a farmer, researcher, donor, or volunteer — there's a place for you in the AgriScience community.</p>
          <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="{{ route('contactus') }}" class="btn-agri-white"><i class="bi bi-envelope"></i> Contact Us</a>
            <a href="{{ route('services') }}" class="btn-agri-outline" style="color:#fff;border-color:rgba(255,255,255,.4);"><i class="bi bi-arrow-right"></i> View Programs</a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

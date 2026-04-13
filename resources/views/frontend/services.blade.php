@extends('frontend.layout.main')
@section('title', 'Our Services & Programs')
@section('content')
<!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Our Services & Programs</h1>
      <p>Comprehensive agricultural solutions designed to create lasting impact at every level.</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.html">Home</a></li>
          <li class="breadcrumb-item active">Services</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Section 1: Core Services Overview -->
  <section class="section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">What We Offer</span>
        <h2 class="section-title">Our Core Programs</h2>
        <p class="section-subtitle mx-auto">From field-level training to policy advocacy, our programs address the full spectrum of agricultural development needs.</p>
      </div>
      <div class="row g-4">
        @foreach($services as $service)
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle {{ $service->color }}"><i class="{{ $service->icon }}"></i></div>
            <h5>{{ $service->title }}</h5>
            <p>{{ $service->description }}</p>
          </div>
        </div>
        @endforeach
        <!-- <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle orange"><i class="bi bi-mortarboard"></i></div>
            <h5>Farmer Training Academy</h5>
            <p>Our flagship education program delivers hands-on training in modern farming methods, business skills, and digital tools. Over 15,000 graduates have completed our certified programs since 2016.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle teal"><i class="bi bi-droplet-half"></i></div>
            <h5>Water & Irrigation Solutions</h5>
            <p>From drip irrigation to rainwater harvesting, we design and implement water management systems tailored to local conditions, helping farmers optimize water use and build drought resilience.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle blue"><i class="bi bi-cpu"></i></div>
            <h5>AgriTech & Digital Advisory</h5>
            <p>Our mobile platform provides real-time weather alerts, soil analysis, market prices, and personalized crop recommendations powered by satellite data and machine learning models.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle purple"><i class="bi bi-graph-up"></i></div>
            <h5>Market Access & Value Chains</h5>
            <p>We connect smallholder farmers to fair-trade markets, help establish cooperatives, and provide post-harvest processing training to reduce food waste and increase farmer income by up to 45%.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle red"><i class="bi bi-clipboard-data"></i></div>
            <h5>Policy Research & Advocacy</h5>
            <p>We produce evidence-based policy briefs, engage with governments and multilateral bodies, and advocate for agricultural policies that prioritize smallholder welfare and environmental sustainability.</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Section 2: Featured Program Deep Dive -->
  <section class="section-padding bg-light-custom">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 reveal">
          <span class="section-badge">Featured Program</span>
          <h2 class="section-title">Farmer Training Academy</h2>
          <p class="text-muted mb-4">Our most impactful initiative — a 12-week intensive program that equips farmers with the knowledge and practical skills to transform their agricultural output and livelihoods.</p>
          <div class="row g-3 mb-4">
            <div class="col-6">
              <div class="p-3 bg-white rounded-3 shadow-sm text-center">
                <h4 class="text-primary-custom mb-1" style="font-family:'Inter',sans-serif;font-weight:800;">15,000+</h4>
                <small class="text-muted">Graduates</small>
              </div>
            </div>
            <div class="col-6">
              <div class="p-3 bg-white rounded-3 shadow-sm text-center">
                <h4 class="text-accent mb-1" style="font-family:'Inter',sans-serif;font-weight:800;">92%</h4>
                <small class="text-muted">Report Higher Income</small>
              </div>
            </div>
          </div>
          <ul class="about-list">
            <li><i class="bi bi-check2"></i> Soil science & crop management fundamentals</li>
            <li><i class="bi bi-check2"></i> Financial literacy & farm business planning</li>
            <li><i class="bi bi-check2"></i> Digital tools for precision agriculture</li>
            <li><i class="bi bi-check2"></i> Post-harvest handling & storage techniques</li>
            <li><i class="bi bi-check2"></i> Mentorship from experienced agricultural scientists</li>
          </ul>
          <a href="contactus.html" class="btn-agri mt-3"><i class="bi bi-arrow-right"></i> Enroll Your Community</a>
        </div>
        <div class="col-lg-6 reveal">
          <div class="img-placeholder" style="height:450px;border-radius:var(--radius-lg);"><i class="bi bi-image"></i></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 3: How We Work / Process -->
  <section class="section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Our Approach</span>
        <h2 class="section-title">How We Deliver Impact</h2>
        <p class="section-subtitle mx-auto">A systematic, community-centered process that ensures lasting results.</p>
      </div>
      <div class="row g-4">
        @foreach($approaches as $approach)
        <div class="col-md-6 col-lg-3 reveal">
          <div class="icon-card" style="border-top:4px solid {{$approach->color_var}};">
            <div style="font-family:'Inter',sans-serif;font-size:2.5rem;font-weight:800;color:{{$approach->color_var}};opacity:.2;margin-bottom:10px;">0{{ $loop->iteration }}</div>
            <h5>{{ $approach->title }}</h5>
            <p>{{ $approach->description }}</p>
          </div>
        </div>
        @endforeach
        <!-- <div class="col-md-6 col-lg-3 reveal">
          <div class="icon-card" style="border-top:4px solid var(--primary-light);">
            <div style="font-family:'Inter',sans-serif;font-size:2.5rem;font-weight:800;color:var(--primary-light);opacity:.2;margin-bottom:10px;">02</div>
            <h5>Research & Design</h5>
            <p>Our scientists develop tailored solutions backed by data, local conditions, and the latest agricultural research findings.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="icon-card" style="border-top:4px solid var(--accent);">
            <div style="font-family:'Inter',sans-serif;font-size:2.5rem;font-weight:800;color:var(--accent);opacity:.2;margin-bottom:10px;">03</div>
            <h5>Implement & Train</h5>
            <p>On-the-ground teams work alongside communities to implement solutions, providing hands-on training and ongoing support.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="icon-card" style="border-top:4px solid #2196f3;">
            <div style="font-family:'Inter',sans-serif;font-size:2.5rem;font-weight:800;color:#2196f3;opacity:.2;margin-bottom:10px;">04</div>
            <h5>Measure & Scale</h5>
            <p>Rigorous M&E ensures accountability. Successful interventions are documented and scaled to reach more communities.</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Section 4: Impact Stats -->
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

  <!-- Section 5: Testimonial -->
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
    <div class="container position-relative text-center" style="z-index:1;">
      <div class="row justify-content-center reveal">
        <div class="col-lg-7">
          <h2 class="section-title">Ready to Transform Your Community?</h2>
          <p class="mb-4 opacity-75">Let's discuss how AgriScience programs can be tailored to your region's unique agricultural challenges.</p>
          <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="{{ route('contactus') }}" class="btn-agri-white"><i class="bi bi-envelope"></i> Contact Us</a>
            <a href="{{ route('researches') }}" class="btn-agri-outline" style="color:#fff;border-color:rgba(255,255,255,.4);"><i class="bi bi-journal-text"></i> View Research</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
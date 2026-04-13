@extends('frontend.layout.main')
@section('content')
<!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Research & Insights</h1>
      <p>Peer-reviewed papers, field reports, and data-driven insights powering agricultural transformation.</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.html">Home</a></li>
          <li class="breadcrumb-item active">Research & Insights</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Research Overview Stats -->
  <section class="section-padding-sm">
    <div class="container">
      <div class="row g-4 reveal">
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle green mx-auto"><i class="bi bi-journal-richtext"></i></div>
            <h6>Published Papers</h6>
            <p style="font-size:1.8rem;font-weight:800;color:var(--primary);font-family:'Inter',sans-serif;">{{ $numbers->published_papers }}+</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle orange mx-auto"><i class="bi bi-people"></i></div>
            <h6>Research Partners</h6>
            <p style="font-size:1.8rem;font-weight:800;color:var(--accent);font-family:'Inter',sans-serif;">{{ $numbers->research_partners }}</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle teal mx-auto"><i class="bi bi-globe2"></i></div>
            <h6>Field Studies</h6>
            <p style="font-size:1.8rem;font-weight:800;color:#009688;font-family:'Inter',sans-serif;">{{ $numbers->field_studies }}+</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle blue mx-auto"><i class="bi bi-download"></i></div>
            <h6>Open Access Downloads</h6>
            <p style="font-size:1.8rem;font-weight:800;color:#2196f3;font-family:'Inter',sans-serif;">{{ $numbers->open_access_downloads }}+</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Research Focus Areas -->
  <section class="section-padding bg-light-custom">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Focus Areas</span>
        <h2 class="section-title">Our Research Pillars</h2>
        <p class="section-subtitle mx-auto">AgriScience research spans five critical domains that together address the full complexity of agricultural sustainability.</p>
      </div>
      <div class="row g-4">
        @foreach($researches as $item)
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
            <div class="icon-circle orange"><i class="bi bi-thermometer-sun"></i></div>
            <h5>Climate Adaptation</h5>
            <p>Developing drought-tolerant crop varieties, heat-resistant farming systems, and early warning tools for climate-vulnerable agricultural communities.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle teal"><i class="bi bi-droplet"></i></div>
            <h5>Water-Smart Agriculture</h5>
            <p>Researching efficient irrigation technologies, groundwater management, and rainwater harvesting systems optimized for smallholder farm contexts.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle blue"><i class="bi bi-cpu"></i></div>
            <h5>Digital Agriculture</h5>
            <p>Applying machine learning, remote sensing, and IoT to build affordable precision agriculture tools accessible to resource-constrained farmers.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle purple"><i class="bi bi-basket2"></i></div>
            <h5>Food Systems & Nutrition</h5>
            <p>Studying the intersection of crop diversity, post-harvest loss, and nutritional outcomes to build more equitable and resilient food supply chains.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle red"><i class="bi bi-bar-chart-line"></i></div>
            <h5>Agricultural Economics</h5>
            <p>Analyzing market structures, policy impacts, and livelihood data to advocate for evidence-based agricultural reform and fair trade practices.</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Latest Publications -->
  <section class="section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Publications</span>
        <h2 class="section-title">Latest Research Papers & Reports</h2>
      </div>

      <!-- Filter Tabs -->
      <div class="filter-tabs reveal">
        <button class="filter-tab active" data-filter="all">All</button>
        <button class="filter-tab" data-filter="paper">Papers</button>
        <button class="filter-tab" data-filter="report">Reports</button>
        <button class="filter-tab" data-filter="study">Field Studies</button>
      </div>

      <div class="row g-4">
        @foreach($publications as $pub)
        <div class="col-md-6 reveal filterable-card" data-category="{{ $pub->category }}">
          <div class="research-card">
            <span class="research-type {{ $pub->category }}">{{ $pub->type_label }}</span>
            <h5>{{ $pub->title }}</h5>
            <p>{{ $pub->description }}</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> {{ $pub->author }}</span>
              <span><i class="bi bi-calendar3"></i> {{ $pub->date }}</span>
              <span><i class="{{ $pub->source_icon }}"></i> {{ $pub->source_info }}</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="text-center mt-5 reveal">
        <button class="btn-agri-outline"><i class="bi bi-collection"></i> Browse Full Publication Archive</button>
      </div>
    </div>
  </section>

  <!-- Data / Key Insights -->
  <section class="impact-section section-padding">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge" style="background:rgba(255,255,255,.12);color:#fff;">Key Findings</span>
        <h2 class="section-title" style="color:#fff;">Data That Drives Our Work</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="40" data-suffix="%">0</h2>
            <p>Yield increase with organic pest management</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="60" data-suffix="%">0</h2>
            <p>Water savings with drip irrigation systems</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="3" data-suffix="x">0</h2>
            <p>ROI on farmer training programs</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="stat-box">
            <h2 data-count="25" data-suffix="%">0</h2>
            <p>Reduction in post-harvest food loss</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Research Partners -->
  <section class="section-padding">
    <div class="container text-center reveal">
      <span class="section-badge">Collaborations</span>
      <h2 class="section-title mb-5">Our Research Partners</h2>
      <div class="partners-row">
        <div class="partner-logo">ICRISAT</div>
        <div class="partner-logo">CIMMYT</div>
        <div class="partner-logo">MIT AgLab</div>
        <div class="partner-logo">Wageningen U.</div>
        <div class="partner-logo">IITA</div>
        <div class="partner-logo">UC Davis</div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section section-padding-sm">
    <div class="container position-relative text-center" style="z-index:1;">
      <div class="row justify-content-center reveal">
        <div class="col-lg-7">
          <h2 class="section-title" style="font-size:2rem;">Collaborate With Us</h2>
          <p class="mb-4 opacity-75">We welcome research partnerships, data sharing, and collaborative fieldwork with institutions committed to agricultural sustainability.</p>
          <a href="{{ route('contactus') }}" class="btn-agri-white"><i class="bi bi-envelope"></i> Propose a Collaboration</a>
        </div>
      </div>
    </div>
  </section>
@endsection
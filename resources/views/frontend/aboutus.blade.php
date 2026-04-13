@extends('frontend.layout.main')
@section('content')
 <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>About AgriScience</h1>
      <p>Our story, mission, and the people driving agricultural change worldwide.</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.html">Home</a></li>
          <li class="breadcrumb-item active">About Us</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Section 1: Our Story -->
  <section class="section-padding">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 reveal">
          <div class="about-visual">
            <div class="main-img img-placeholder" style="height:400px;"><img src="{{ asset($about->image) }}" alt=""></div>
            <div class="experience-badge">
              <h3>{{ $about->experience_years }}+</h3>
              <p>Years of Impact</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 reveal">
          <span class="section-badge">Our Story</span>
          <h2 class="section-title">From a Small Idea to a Global Movement</h2>
          <p class="text-muted mb-3">AgriScience was founded in 2014 by a group of agricultural scientists and community organizers who believed that the gap between lab research and farm reality could be closed. What started as a pilot project in rural India — training 200 farmers on soil health management — has grown into a global organization operating across 28 countries.</p>
          <p class="text-muted mb-4">Today, we work at the intersection of science, technology, and traditional farming wisdom. We believe that sustainable agriculture isn't just about feeding people — it's about building resilient communities, protecting biodiversity, and creating economic opportunity for the world's most vulnerable populations.</p>
          <div class="row g-3">
            <div class="col-6">
              <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background:rgba(45,106,79,.06);">
                <i class="bi bi-globe2 fs-4 text-primary-custom"></i>
                <div>
                  <h6 class="mb-0" style="font-family:'Inter',sans-serif;font-size:.9rem;">28 Countries</h6>
                  <small class="text-muted">Global Reach</small>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex align-items-center gap-3 p-3 rounded-3" style="background:rgba(212,163,115,.08);">
                <i class="bi bi-people-fill fs-4 text-accent"></i>
                <div>
                  <h6 class="mb-0" style="font-family:'Inter',sans-serif;font-size:.9rem;">200+ Staff</h6>
                  <small class="text-muted">Worldwide Team</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 2: Mission, Vision, Values -->
  <section class="section-padding bg-light-custom">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Our Purpose</span>
        <h2 class="section-title">Mission, Vision & Values</h2>
      </div>
      <div class="row g-4">
        @foreach ($purposes as $purpose)
        <div class="col-md-4 reveal">
          <div class="icon-card">
            <div class="icon-circle {{ $purpose->color }}"><i class="{{ $purpose->icon }}"></i></div>
            <h5>{{ $purpose->title }}</h5>
            <p>{{ $purpose->description }}</p>
          </div>
        </div>
        @endforeach
        <!-- <div class="col-md-4 reveal">
          <div class="icon-card">
            <div class="icon-circle orange"><i class="bi bi-eye"></i></div>
            <h5>Our Vision</h5>
            <p>A world where every farmer has access to science-based tools and knowledge, where food systems are equitable, and where agriculture regenerates rather than depletes the earth.</p>
          </div>
        </div>
        <div class="col-md-4 reveal">
          <div class="icon-card">
            <div class="icon-circle teal"><i class="bi bi-heart"></i></div>
            <h5>Our Values</h5>
            <p>Integrity in research, respect for indigenous knowledge, commitment to community ownership, environmental stewardship, and transparency in everything we do.</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Section 3: Timeline / Milestones -->
  <section class="section-padding">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-5 reveal">
          <span class="section-badge">Our Journey</span>
          <h2 class="section-title">Key Milestones</h2>
          <p class="text-muted">A decade of growth, learning, and impact across the agricultural landscape.</p>
        </div>
        <div class="col-lg-7 reveal">
          <div class="timeline">
            @foreach ($journeys as $journey)
            <div class="timeline-item">
              <span class="year">{{ $journey->year }}</span>
              <h5>{{ $journey->title }}</h5>
              <p>{{ $journey->description }}</p>
            </div>
            @endforeach
            <!-- <div class="timeline-item">
              <span class="year">2016</span>
              <h5>Expanded to East Africa</h5>
              <p>Opened offices in Kenya and Tanzania, introducing drought-resistant crop varieties to 3,000 farmers.</p>
            </div>
            <div class="timeline-item">
              <span class="year">2018</span>
              <h5>Research Lab Established</h5>
              <p>Inaugurated our applied research laboratory in Bangalore, partnering with 12 universities globally.</p>
            </div>
            <div class="timeline-item">
              <span class="year">2021</span>
              <h5>Digital Agriculture Initiative</h5>
              <p>Launched mobile-based advisory platform serving 25,000+ farmers with real-time crop management data.</p>
            </div>
            <div class="timeline-item">
              <span class="year">2024</span>
              <h5>Global Recognition</h5>
              <p>Received the UN Food Systems Champion Award. Now active across 28 countries with 200+ staff members.</p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section 4: Team -->
  <section class="section-padding bg-light-custom">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Leadership</span>
        <h2 class="section-title">Meet Our Team</h2>
        <p class="section-subtitle mx-auto">Passionate experts united by a common goal — transforming agriculture through science and community.</p>
      </div>
      <div class="row g-4 justify-content-center">
        @foreach ($teams as $team)
        <div class="col-sm-6 col-lg-3 reveal">
          <div class="team-card">
            @if($team->image)
              <div class="team-avatar" style="background-image: url('{{ asset($team->image) }}'); background-size: cover; background-position: center; border: none;"></div>
            @else
              <div class="team-avatar" style="background:linear-gradient(135deg,var(--primary),var(--primary-light));">
                {{ collect(explode(' ', $team->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->take(2)->implode('') }}
              </div>
            @endif
            <h5>{{ $team->name }}</h5>
            <div class="role">{{ $team->designation }}</div>
            <p>{{ $team->description }}</p>
            <div class="team-social">
              @if($team->social_link && count($team->social_link) > 0)
                @foreach($team->social_link as $linkIndex => $link)
                  @if($link)
                    <a href="{{ $link }}" target="_blank"><i class="{{ $team->social_icon[$linkIndex] ?? 'bi bi-link-45deg' }}"></i></a>
                  @endif
                @endforeach
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Section 5: Partners -->
  <section class="section-padding">
    <div class="container text-center reveal">
      <span class="section-badge">Our Partners</span>
      <h2 class="section-title mb-5">Trusted By Leading Organizations</h2>
      <div class="partners-row">
        <div class="partner-logo">UN FAO</div>
        <div class="partner-logo">World Bank</div>
        <div class="partner-logo">CGIAR</div>
        <div class="partner-logo">USAID</div>
        <div class="partner-logo">GIZ</div>
        <div class="partner-logo">Gates Foundation</div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section section-padding">
    <div class="container position-relative text-center" style="z-index:1;">
      <div class="row justify-content-center reveal">
        <div class="col-lg-7">
          <h2 class="section-title">Want to Be Part of the Change?</h2>
          <p class="mb-4 opacity-75">Join our team of researchers, volunteers, and advocates working toward a food-secure future.</p>
          <a href="contactus.html" class="btn-agri-white"><i class="bi bi-envelope"></i> Get in Touch</a>
        </div>
      </div>
    </div>
  </section>
@endsection
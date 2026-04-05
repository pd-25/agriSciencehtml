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
            <p style="font-size:1.8rem;font-weight:800;color:var(--primary);font-family:'Inter',sans-serif;">120+</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle orange mx-auto"><i class="bi bi-people"></i></div>
            <h6>Research Partners</h6>
            <p style="font-size:1.8rem;font-weight:800;color:var(--accent);font-family:'Inter',sans-serif;">45</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle teal mx-auto"><i class="bi bi-globe2"></i></div>
            <h6>Field Studies</h6>
            <p style="font-size:1.8rem;font-weight:800;color:#009688;font-family:'Inter',sans-serif;">85+</p>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="contact-card">
            <div class="icon-circle blue mx-auto"><i class="bi bi-download"></i></div>
            <h6>Open Access Downloads</h6>
            <p style="font-size:1.8rem;font-weight:800;color:#2196f3;font-family:'Inter',sans-serif;">500K+</p>
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
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card">
            <div class="icon-circle green"><i class="bi bi-moisture"></i></div>
            <h5>Soil Health & Regeneration</h5>
            <p>Investigating microbiome dynamics, carbon sequestration, and regenerative practices to restore degraded agricultural soils across tropical and arid regions.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
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
        </div>
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
        <div class="col-md-6 reveal filterable-card" data-category="paper">
          <div class="research-card">
            <span class="research-type paper">Peer-Reviewed Paper</span>
            <h5>Impact of Biochar Amendment on Soil Carbon Sequestration in Semi-Arid Tropical Farmlands</h5>
            <p>A 3-year longitudinal study measuring the effects of biochar application on soil organic carbon across 120 farm plots in Rajasthan, India.</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> Dr. V. Patel, Dr. L. Ochieng et al.</span>
              <span><i class="bi bi-calendar3"></i> March 2026</span>
              <span><i class="bi bi-journal"></i> Nature Sustainability</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 reveal filterable-card" data-category="report">
          <div class="research-card">
            <span class="research-type report">Annual Report</span>
            <h5>State of Smallholder Agriculture 2025: Challenges, Innovations, and the Path Forward</h5>
            <p>Our comprehensive annual report analyzing trends, challenges, and opportunities across smallholder farming systems in 28 countries.</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> AgriScience Research Team</span>
              <span><i class="bi bi-calendar3"></i> February 2026</span>
              <span><i class="bi bi-file-earmark-pdf"></i> 84 pages</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 reveal filterable-card" data-category="study">
          <div class="research-card">
            <span class="research-type study">Field Study</span>
            <h5>Evaluating Drip Irrigation Adoption Rates and Yield Outcomes Among Women Farmers in East Africa</h5>
            <p>A mixed-methods study examining the socioeconomic factors influencing irrigation technology adoption and its impact on women-led farms.</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> A. Siddiqui, M. Chen</span>
              <span><i class="bi bi-calendar3"></i> January 2026</span>
              <span><i class="bi bi-geo-alt"></i> Kenya, Tanzania</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 reveal filterable-card" data-category="paper">
          <div class="research-card">
            <span class="research-type paper">Peer-Reviewed Paper</span>
            <h5>Machine Learning Models for Early Detection of Crop Disease Using Low-Cost Smartphone Imaging</h5>
            <p>Developing accessible AI-powered diagnostic tools that enable farmers to identify plant diseases using only a smartphone camera.</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> Dr. R. Gupta, Dr. T. Nakamura</span>
              <span><i class="bi bi-calendar3"></i> December 2025</span>
              <span><i class="bi bi-journal"></i> Computers & Electronics in Ag.</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 reveal filterable-card" data-category="report">
          <div class="research-card">
            <span class="research-type report">Policy Brief</span>
            <h5>Financing the Future: A Framework for Climate-Responsive Agricultural Investment in LMICs</h5>
            <p>Policy recommendations for multilateral development banks and national governments on directing climate finance toward smallholder adaptation.</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> Dr. V. Patel, M. Chen</span>
              <span><i class="bi bi-calendar3"></i> November 2025</span>
              <span><i class="bi bi-file-earmark-pdf"></i> 32 pages</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 reveal filterable-card" data-category="study">
          <div class="research-card">
            <span class="research-type study">Field Study</span>
            <h5>Comparative Analysis of Traditional vs. Scientific Composting Methods in Vietnamese Rice Paddies</h5>
            <p>A controlled study comparing nutrient profiles, microbial activity, and crop yields between indigenous composting practices and modern techniques.</p>
            <div class="meta-row">
              <span><i class="bi bi-person"></i> Dr. P. Tran, Dr. L. Ochieng</span>
              <span><i class="bi bi-calendar3"></i> October 2025</span>
              <span><i class="bi bi-geo-alt"></i> Vietnam</span>
            </div>
          </div>
        </div>
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
          <a href="contactus.html" class="btn-agri-white"><i class="bi bi-envelope"></i> Propose a Collaboration</a>
        </div>
      </div>
    </div>
  </section>
@endsection
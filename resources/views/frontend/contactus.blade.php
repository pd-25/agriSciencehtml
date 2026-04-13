@extends('frontend.layout.main')
@section('title', 'Contact Us')
@section('content')
<!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Contact Us</h1>
      <p>We'd love to hear from you — whether you're a farmer, researcher, donor, or volunteer.</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.html">Home</a></li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Contact Info Cards -->
  <section class="section-padding">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3 reveal">
          <div class="contact-card">
            <div class="icon-circle green mx-auto"><i class="bi bi-geo-alt"></i></div>
            <h6>Our Office</h6>
            <p>42 Green Avenue, Sector 15<br>New Delhi, India 110001</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="contact-card">
            <div class="icon-circle orange mx-auto"><i class="bi bi-envelope"></i></div>
            <h6>Email Us</h6>
            <p>info@agriscience.org<br>partnerships@agriscience.org</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="contact-card">
            <div class="icon-circle teal mx-auto"><i class="bi bi-telephone"></i></div>
            <h6>Call Us</h6>
            <p>+91 11 2345 6789<br>+91 98765 43210</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="contact-card">
            <div class="icon-circle blue mx-auto"><i class="bi bi-clock"></i></div>
            <h6>Working Hours</h6>
            <p>Mon – Fri: 9:00 AM – 6:00 PM<br>Sat: 10:00 AM – 2:00 PM</p>
          </div>
        </div>
      </div>

      <!-- Contact Form + Map -->
      <div class="row g-5">
        <div class="col-lg-7 reveal">
          <h3 class="mb-2">Send Us a Message</h3>
          <p class="text-muted mb-4">Fill out the form and our team will get back to you within 24 hours.</p>
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
              <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="{{ route('inquiry.store') }}" method="POST">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label fw-500">Full Name</label>
                <input type="text" name="name" class="form-control form-control-agri @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="John Doe">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-md-6">
                <label class="form-label fw-500">Email Address</label>
                <input type="email" name="email" class="form-control form-control-agri @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="john@example.com">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-md-6">
                <label class="form-label fw-500">Phone Number</label>
                <input type="number" name="phone" class="form-control form-control-agri @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="9876543210">
                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-md-6">
                <label class="form-label fw-500">Subject</label>
                <select name="subject" class="form-control form-control-agri @error('subject') is-invalid @enderror">
                  <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select a topic</option>
                  <option {{ old('subject') == 'Partnership Inquiry' ? 'selected' : '' }}>Partnership Inquiry</option>
                  <option {{ old('subject') == 'Volunteer Opportunity' ? 'selected' : '' }}>Volunteer Opportunity</option>
                  <option {{ old('subject') == 'Donation & Funding' ? 'selected' : '' }}>Donation & Funding</option>
                  <option {{ old('subject') == 'Training Programs' ? 'selected' : '' }}>Training Programs</option>
                  <option {{ old('subject') == 'Media & Press' ? 'selected' : '' }}>Media & Press</option>
                  <option {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                </select>
                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-12">
                <label class="form-label fw-500">Your Message</label>
                <textarea name="message" class="form-control form-control-agri @error('message') is-invalid @enderror" rows="5" placeholder="Tell us how we can help...">{{ old('message') }}</textarea>
                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="col-12">
                <button type="submit" class="btn-agri"><i class="bi bi-send"></i> Send Message</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-5 reveal">
          <div class="map-placeholder h-100" style="min-height:400px;">
            <i class="bi bi-geo-alt"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Regional Offices -->
  <section class="section-padding bg-light-custom">
    <div class="container">
      <div class="text-center mb-5 reveal">
        <span class="section-badge">Global Presence</span>
        <h2 class="section-title">Our Regional Offices</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card text-start">
            <h5><i class="bi bi-geo-alt-fill text-primary-custom me-2"></i>South Asia Hub</h5>
            <p class="mb-2">42 Green Avenue, Sector 15<br>New Delhi, India 110001</p>
            <small class="text-muted"><i class="bi bi-envelope me-1"></i> southasia@agriscience.org</small>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card text-start">
            <h5><i class="bi bi-geo-alt-fill text-accent me-2"></i>East Africa Hub</h5>
            <p class="mb-2">Kenyatta Avenue, Suite 305<br>Nairobi, Kenya 00100</p>
            <small class="text-muted"><i class="bi bi-envelope me-1"></i> eastafrica@agriscience.org</small>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="icon-card text-start">
            <h5><i class="bi bi-geo-alt-fill me-2" style="color:#2196f3;"></i>Southeast Asia Hub</h5>
            <p class="mb-2">88 Nguyen Hue Blvd, District 1<br>Ho Chi Minh City, Vietnam</p>
            <small class="text-muted"><i class="bi bi-envelope me-1"></i> seasia@agriscience.org</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 reveal">
          <div class="text-center mb-5">
            <span class="section-badge">FAQ</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
          </div>
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button fw-500" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">How can I volunteer with AgriScience?</button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">We welcome volunteers from all backgrounds. Fill out the contact form above selecting "Volunteer Opportunity" or email us at volunteer@agriscience.org. We offer both field and remote volunteer positions across our global offices.</div>
              </div>
            </div>
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-500" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">How can my organization partner with AgriScience?</button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">We partner with NGOs, universities, government agencies, and private companies. Reach out via partnerships@agriscience.org with details about your organization and proposed collaboration areas.</div>
              </div>
            </div>
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-500" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Do you accept donations?</button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">Yes! AgriScience is a registered non-profit. Donations are tax-deductible in most jurisdictions. You can contribute through our website or contact our fundraising team for corporate giving options.</div>
              </div>
            </div>
            <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-500" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">Can farmers directly request AgriScience's services?</button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">Absolutely. Individual farmers and farming cooperatives can reach out to our regional offices. We assess community needs and design programs accordingly. Our services are provided free of cost to qualifying communities.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

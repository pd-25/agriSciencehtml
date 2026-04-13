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
            <p>{!! nl2br(e($about->address)) !!}</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="contact-card">
            <div class="icon-circle orange mx-auto"><i class="bi bi-envelope"></i></div>
            <h6>Email Us</h6>
            <p>
              @if($about->email && count($about->email) > 0)
                @foreach($about->email as $email)
                  {{ $email }}@if(!$loop->last)<br>@endif
                @endforeach
              @else
                info@agriscience.org
              @endif
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 reveal">
          <div class="contact-card">
            <div class="icon-circle teal mx-auto"><i class="bi bi-telephone"></i></div>
            <h6>Call Us</h6>
            <p>
              @if($about->phone && count($about->phone) > 0)
                @foreach($about->phone as $phone)
                  {{ $phone }}@if(!$loop->last)<br>@endif
                @endforeach
              @else
                +91 11 2345 6789
              @endif
            </p>
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
        @if($about->regional_offices && count($about->regional_offices) > 0)
          @foreach($about->regional_offices as $office)
            <div class="col-md-6 col-lg-4 reveal">
              <div class="icon-card text-start">
                <h5><i class="bi bi-geo-alt-fill text-primary-custom me-2"></i>{{ $office['name'] }}</h5>
                <p class="mb-2">{!! nl2br(e($office['address'])) !!}</p>
                <small class="text-muted"><i class="bi bi-envelope me-1"></i> {{ $office['email'] }}</small>
              </div>
            </div>
          @endforeach
        @else
          <!-- Fallback or empty state -->
          <div class="col-12 text-center text-muted">No regional offices configured.</div>
        @endif
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
            @foreach($faqs as $faq)
              <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                <h2 class="accordion-header">
                  <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} fw-500" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                    {{ $faq->question }}
                  </button>
                </h2>
                <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                  <div class="accordion-body text-muted">
                    {{ $faq->answer }}
                  </div>
                </div>
              </div>
            @endforeach

            @if($faqs->isEmpty())
              <div class="text-center text-muted">No FAQs available at this time.</div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

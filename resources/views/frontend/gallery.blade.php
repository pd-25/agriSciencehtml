@extends('frontend.layout.main')
@section('title', 'Gallery')
@section('content')
<!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Our Gallery</h1>
      <p>A visual record of our work with farming communities, research teams, and partners.</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Gallery</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Gallery Grid -->
  <section class="section-padding">
    <div class="container">
      @if($galleries->isEmpty())
        <div class="text-center py-5 reveal">
          <i class="bi bi-images" style="font-size:3.5rem;color:var(--gray-400);"></i>
          <h4 class="mt-4">No galleries yet</h4>
          <p class="text-muted">Check back soon — we're busy capturing our work in the field.</p>
          <a href="{{ route('home') }}" class="btn-agri mt-3"><i class="bi bi-arrow-left"></i> Back to Home</a>
        </div>
      @else
        <div class="row g-4">
          @foreach($galleries as $gallery)
          <div class="col-md-6 col-lg-4 reveal">
            @include('frontend.partials.gallery-card', ['gallery' => $gallery])
          </div>
          @endforeach
        </div>

        @if($galleries->hasPages())
        <div class="d-flex justify-content-center mt-5 reveal">
          {{ $galleries->links('pagination::bootstrap-5') }}
        </div>
        @endif
      @endif
    </div>
  </section>
@endsection

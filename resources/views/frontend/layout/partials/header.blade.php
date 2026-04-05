<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-agri fixed-top">
    <div class="container">
      <a class="navbar-brand" href="home.html"><span class="brand-icon"><i class="bi bi-leaf"></i></span>Agri<span class="brand-text">Science</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link {{Route::is('home') ? 'active' : ''}}" href="{{route('home')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link {{Route::is('about') ? 'active' : ''}}" href="{{route('about')}}">About</a></li>
          <li class="nav-item"><a class="nav-link {{Route::is('services') ? 'active' : ''}}" href="{{route('services')}}">Services</a></li>
          <li class="nav-item"><a class="nav-link {{Route::is('researches') ? 'active' : ''}}" href="{{route('researches')}}">Research</a></li>
          <li class="nav-item"><a class="nav-link {{Route::is('articles') ? 'active' : ''}}" href="{{route('articles')}}">Blog</a></li>
          <li class="nav-item"><a class="nav-link {{Route::is('contactus') ? 'active' : ''}}" href="{{route('contactus')}}">Contact</a></li>
        </ul>
        <a href="{{route('contactus')}}" class="nav-cta"><i class="bi bi-arrow-right"></i> Get Involved</a>
      </div>
    </div>
  </nav>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'AgriScience — Empowering Agriculture Through Science')</title>
  <meta name="description" content="AgriScience is a global non-profit advancing sustainable agriculture through scientific research, farmer education, and community development across 28 countries.">
  <meta name="theme-color" content="#2d6a4f">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">

    
</head>

<body>

  @include('frontend.layout.partials.header')

    @yield('content')

    @include('frontend.layout.partials.footer')
    @include('frontend.layout.partials.footerScript')
  
    

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Medcity - Medical Healthcare HTML5 Template">
  <link href="{{ asset('assets/images/favicon/favicon.png') }}" rel="icon">
  <title>Medcity - Medical Healthcare HTML5 Template</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="{{ asset('assets/css/libraries.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    @include('template/header')    

    @yield('content')

    @if (Request::is('login') || Request::is('register'))
    
    @else
      @include('template/footer')
    @endif
    

    <div class="search-popup">
      <button type="button" class="search-popup__close"><i class="fas fa-times"></i></button>
      <form class="search-popup__form">
        <input type="text" class="search-popup__form__input" placeholder="Type Words Then Enter">
        <button class="search-popup__btn"><i class="icon-search"></i></button>
      </form>
    </div><!-- /. search-popup -->
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
  </div><!-- /.wrapper -->

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
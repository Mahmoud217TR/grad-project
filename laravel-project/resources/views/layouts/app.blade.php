<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',config('app.name', 'Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js" type="text/javascript" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('header')
    <style>
      .nav-image {
        background: url("{{ asset('images/nav.jpg') }}") ;
        background-size: cover;
        background-size: 100% 100% ;
      }
    </style>

    <!-- fav icon -->
    @include('components.favicon')
    
</head>
<body>
    <div id="app">
      {{--navbar--}}
        @include('layouts.nav')
      {{--end navbar--}}
      {{--content--}}


      <div class="container">

        <div class="row">
          <div class="col text-center pyt-1">
          <h1 class="orange-text pt-5">WE RECIEVE YOUR REPORT</h1>
          <h2 class="orange-text pt-5">THANK YOU DARLING</h2>
          </div>
        </div>
        <div class="row g-3 ">
          <div class="col-3 "></div>

          <div class="col-6 justify-content-center pt-5">
            <a href="{{ route('welcome') }}" class="unstyled-anchor">
              @include('components.SVG19',['width'=>80,'height'=>80])
            </a>
          </div>

          <div class="col-3"></div>
      
        </div>

        <div class="row g-3 ">
          <div class="col-4 "></div>

          <div class="col-4">
              <button type="submit" class="btnReport button-primary TB box">
                  {{ ('go to home page') }}
              </button>
          </div>

          <div class="col-4"></div>
      
        </div>
    


      </div>
        <main class="my-4">
            @yield('content')
        </main>
      
      {{--footer--}}
        @include('layouts.footer')
      {{--end footer--}}
    </div>
</body>
</html>

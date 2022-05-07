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
            <div class="col text-start pyt-1">
            <h1 class="orange-text pt-5">CREATE YOUR OWN CHEAT SHEET</h1>
            </div>
        </div>
        <div class="row my-2 my-md-4">
            <div class="codesubmit container  py-3 my-4 col-md-7 col-10 ps-3">
                    <form method="POST" action=" " class="ps-3">
                        <div class="row pt-2">
                            <div class=" col-2">
                            <label> title </label>
                            </div>
                            <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control  box" id="title-sheet" placeholder="enter title">
                            </div>
                        </div>
                        </div>
                        <div class="row pt-3">
                            <div class="form-group col-11">
                                <label for="editeSheet1">Ditails</label>
                                <textarea class="form-control" id="editeSheet1" rows="4"></textarea>
                              </div>
                        </div>
                        <div class="row justify-content-center  justify-content-md-end  mx-1 pt-4">
                            <div class="col-md-3 text-end col-5 mb-3">
                               <button type="submit" class="btn button-primary TB box ">
                                   {{ ('Save') }}
                               </button>
                            </div>
                            <div class="col-md-2 col-5">
                               <button type="submit" class="btn button-primary TB box  ">
                                   {{ ('Cancel') }}
                               </button>
                            </div>
                        </div>
                        </div>
                        <div>
                        </div>
                    </form>
                </div>
                <div class="row g-3 ">
                  <div class="col-4 ">
                    
                  </div>
                  <div class="py-3 col-4">
                    
                </div>
                <div class="col-4"style="margin-left: -10px;margin-top: -110px">
                  <a href="{{ route('welcome') }}" class="unstyled-anchor">
                    @include('components.svg10',['width'=>80,'height'=>80])
                </a>
                </div>
            </div>
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

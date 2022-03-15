<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js" type="text/javascript" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
      body{
        background: url("{{ asset('images/background.jpg') }}");
      }
    </style>

    <!-- fav icon -->
    @include('components.favicon')
</head>
<body  class="body-image">
  <div id="app">
    {{--start page--}}
     {{--navbar--}}
        <div class="navbar navbar-expand-md">
          <div class="container-fluid d-flex">
            <a href="/" class="unstyled-anchor">
                 @include('components.logo',['width'=>80,'height'=>80])
            </a>
            <a href="/" class="unstyled-anchor">
                <P class="page-title text-in-header ps-3">{{ config('app.name', 'Laravel') }}</P>
            </a>
            <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" data-bs-target="#main-menu">
              <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="main-menu">
              <ul class="navbar-nav ms-auto d-flex align-items-center justify-content-around">
               <li class="nav-item"><a href="/Services" class="TH unstyled-anchor px-5">services</a></li>
               <li class="nav-item"><a href="/AboutUs" class="TH unstyled-anchor px-5">about us</a></li>
               <li class="nav-item"><i class="bi bi-person mb-4 "></i></li> 
            </ul>
            </div>
          </div>
        </div>
     {{--end navbar--}}

      {{--text in welcom page--}}
          <div class="container text-center container1">
           <div class="pt-3">
             <p class="broad-title welcome">welcome to <span class="orange-text">{{ config('app.name', 'Laravel') }}</span></p> 
           </div>
           <div class="pt-3">
             <p class="base-line welcome">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium, iste doloribus veritatis excepturi, repudiandae voluptate rerum dignissimos quibusdam ex enim earum beatae sapiente delectus exercitationem assumenda fuga sunt. At, autem!</div>
           <div class="pt-3">
             <button class="btn button-primary TB mx-2" type="button">Rigester</button>
             <button class="btn button-secondary TB mx-2" type="button">View</button>
           </div>
          </div>
      {{--end text--}}

    {{--end page--}}
  </div>
</body>
</html>
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
        background-size: cover;
      }
    </style>

    <!-- fav icon -->
    @include('components.favicon')
</head>
<body>
  <div id="app">
    {{--start page--}}
       {{--start navbar--}}
       <div class="container-fluid">
        <div class="row d-flex align-items-center p-2">
          {{--Logo & NameProject--}}
           <div class="col-lg-7">
             <div class="row">
              <div class="col-lg-2 d-flex justify-content-center align-items-center">
                {{--start Logo--}}                  
               <a href="{{ route('welcome') }}" class="unstyled-anchor">
                   @include('components.logo',['width'=>80,'height'=>80])
               </a>
              {{--end logo--}} 
              </div>
 
              <div class="col d-flex justify-content-center justify-content-lg-start align-items-center">
                {{--Strat Name Project--}} 
                 <a href="/" class="unstyled-anchor page-title text-in-header">{{ config('app.name', 'Laravel') }}</a>
               {{--end Name--}}
              </div>
             </div>
           </div>
          {{----}}

          {{--Buttons in header--}}
           <div class="col-lg-5">
              <div class="row">
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end align-items-center">
                  <a href="{{ route('services') }}" class="TH unstyled-anchor">services</a>
                </div>
                <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end align-items-center">
                  <a href="{{ route('about') }}" class="TH unstyled-anchor">about us</a>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                  <a href="@guest {{ route('login') }} @else {{ route('home') }} @endguest" class="unstyled-anchor">
                    <i class="bi bi-person"></i>
                  </a>
                </div>
              </div>
            </div>
          {{----}}
       </div>
       </div>
    {{--end navbar--}}
    
    {{--text--}}
      <div class="container mt-5 pt-5">
        <div class="text-center pt-3 ">
          <h1 class="broad-title welcome">welcome to <span class="orange-text">{{ config('app.name', 'Laravel') }}</span></h1> 
        </div>
        <div class="text-center pt-3 ">
          <p class="base-line welcome">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium, iste doloribus veritatis excepturi, repudiandae voluptate rerum dignissimos quibusdam ex enim earum beatae sapiente delectus exercitationem assumenda fuga sunt. At, autem!</p>
        </div>
        @guest
          <div class="text-center pt-3">
            <a href="{{ route('register') }}" class="btn button-primary TB mx-2" type="button">Rigester</a>
            <a href="/logs" class="btn button-secondary TB mx-2" type="button">Login</a>
          </div>
        @endguest
      </div>
    {{----}}

    {{--end page--}}
  </div>

</body>
</html>
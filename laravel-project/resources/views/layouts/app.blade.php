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
      .container-fluid {
        background: url("{{ asset('/images/nav.jpg') }}") ;
        background-size: cover;
        background-size: 100% 100% ;
      }
    </style>

    <!-- fav icon -->
    @include('components.favicon')
    
</head>
<body>
    <div id="app">

       
        {{--start navbar--}}
       <div class="container-fluid">
        <div class="row d-flex align-items-center p-2 fixed-top " >
          {{--Logo & NameProject--}}
           <div class="col-lg-6">
             <div class="row">
              <div class="col-lg-2 d-flex justify-content-center align-items-center">
                {{--start Logo--}}                  
               <a href="{{ route('welcome') }}" class="unstyled-anchor">
                   @include('components.logo',['width'=>50,'height'=>50])
               </a>
              {{--end logo--}} 
              </div>
 
              <div class="col d-flex justify-content-center justify-content-lg-start align-items-center">
                {{--Strat Name Project--}} 
                 <a href="/" class="unstyled-anchor head-line text-in-header">{{ config('app.name', 'Laravel') }}</a>
               {{--end Name--}}
              </div>
             </div>
           </div>
          {{----}}

          {{--Buttons in header--}}
           <div class="col-lg-6">
              <div class="row justify-content-end">
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                  <a href="{{ route('home') }}" class="TH unstyled-anchor">Home</a>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <a href="{{ route('services') }}" class="TH unstyled-anchor">Services</a>
                  </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                  <a href="{{ route('about') }}" class="TH unstyled-anchor">About</a>
                </div>
                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <a href="{{ route('about') }}" class="TH unstyled-anchor">Contact</a>
                  </div>
                
              </div>
            </div>
          {{----}}
       </div>
       </div>
    {{--end navbar--}}
    
    

       
        <main class="my-4">
            @yield('content')
        </main>


        <div class="footer">
        <footer class=" text-dark text-center text-lg-start">
            <!-- Grid container -->
            <div class="container p-3">
              <!--Grid row-->
              <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 p-3">
                  <div class="row ">
              <div class="col-lg-2 d-flex justify-content-center align-items-center">
                {{--start Logo--}}                  
               <a href="{{ route('welcome') }}" class="unstyled-anchor">
                   @include('components.logofooter',['width'=>50,'height'=>50])
               </a>
              {{--end logo--}} 
              </div>
 
              <div class="col d-flex justify-content-center justify-content-lg-start align-items-center">
                {{--Strat Name Project--}} 
                 <a href="/" class="unstyled-anchor1 head-line text-in-header">{{ config('app.name', 'Laravel') }}</a>
               {{--end Name--}}
              </div>
             </div>   
          
                  <p class="justify-content-center">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                    molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                    aliquam voluptatem veniam, est atque cumque eum delectus sint!
                  </p>
                </div>
                <!--Grid column-->
          
                <!--Grid column-->
                <div class="col-md-4 mb-md-0 mb-4 p-3">
                  <h4 class="text-uppercase justify-content-center align-items-center py-3 ">links</h4>
                  <ul class="list-unstyled">
                    <li>
                      <a href="{{ route('home') }}" class="unstyled-anchor1 py-1.5">Home</a>
                    </li>
                    <li>
                      <a href="{{ route('services') }}" class="unstyled-anchor1 py-1.5">Services</a>
                    </li>
                    <li>
                      <a href="{{ route('about') }}" class="unstyled-anchor1 py-1.5">About</a>
                    </li>
                    <li>
                      <a href="{{ route('about') }}" class="unstyled-anchor1 py-1.5">Contact</a>
                    </li>
                  </ul>
                </div>
          
                  
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </div>
            <!-- Grid container -->
          
            
          </footer>
    </div>

    </div>
</body>
</html>

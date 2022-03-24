<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footer</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js" type="text/javascript" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <style>
        .container-fluid {
          background: url("{{ asset('/images/nav.jpg') }}") ;
          background-size: cover;
          background-size: 100% 100% ;
        }
      </style>
</head>
<body>
    {{-- Write your code here  --}}
    <div class="footer">
      <footer class=" text-dark text-center text-lg-start">
          <!-- Grid container -->
          <div class="container p-3">
            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-lg-4 p-2">
                <div class="row ">
            <div class="col-lg-2 d-flex justify-content-center align-items-center">
              {{--start Logo--}}                  
             <a href="{{ route('welcome') }}" class="unstyled-anchor">
                 @include('components.logofooter',['width'=>80,'height'=>80])
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
              <div class="col-md-4 mb-md-0 mb-4 ps-5 p-3">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navi</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js" type="text/javascript" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    {{-- Write your code here  --}}
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
    
    
  

</body>
</html>
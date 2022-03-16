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
<body  class="Body">
  <div id="app">
    {{--start page--}}

       {{--start navbar--}}
       <div class="container-fluid">
        <div class="row d-flex align-items-center p-2">
          {{--Logo & NameProject--}}
           <div class="col-md-8">
             <div class="row">
              <div class="col-sm-1 d-flex justify-content-center">
                {{--start Logo--}}                  
               <a href="{{ route('welcome') }}" class="unstyled-anchor">
                 <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-1 ps-3 ">
                   @include('components.logo',['width'=>80,'height'=>80])
                 </div>
               </a>
              {{--end logo--}} 
              </div>
 
              <div class="col d-flex justify-content-center justify-content-sm-start">
                {{--Strat Name Project--}} 
                 <a href="/" class="unstyled-anchor">
                   <div class="col-9 col-sm-3 col-md-5 col-lg-3 col-xl-3 pt-3 ps-2 ms-4">
                     <P class="h2" id="TextInHeader">{{ config('app.name', 'Laravel') }}</P>
                   </div>
                 </a>
               {{--end Name--}}
              </div>
             </div>
           </div>
          {{----}}

          {{--Buttons in header--}}
           <div class="col-md-4">
             <div class="row">
               <div class="col-md-4 d-flex align-items-center justify-content-center">
                <a href="{{ route('services') }}" class="TH unstyled-anchor">services</a>
               </div>
               <div class="col-md-4 d-flex align-items-center justify-content-center">
                <a href="{{ route('about') }}" class="TH unstyled-anchor">about us</a>
               </div>
               <div class="col-md-4 d-flex align-items-center justify-content-center">
                <div>
                  <i class="bi bi-person mb-4 "></i>
                </div>
               </div>
             </div>
            </div>
          {{----}}
       </div>
       </div>
    {{--end navbar--}}
    
    {{--text--}}
      <div class="container" id="ContentWelcome">
      <div class="text-center pt-3 ">
        <p class="h1" id="Welcome">welcome to <span id="OrangeText">{{ config('app.name', 'Laravel') }}</span></p> 
      </div>
      <div class="text-center pt-3 ">
        <p class="h4" id="Welcome">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, iusto illo, nostrum ab fugit est voluptate accusantium cumque at ipsa in. Magni minus libero debitis saepe iusto animi accusantium voluptates.</p> 
      </div>
      <div class="text-center pt-3">
        <button class="btn Rigester TB mx-2" type="button">Rigester</button>
        <button class="btn View TB mx-2" type="button">View</button>
      </div>
      </div>
    {{----}}

    {{--end page--}}
  </div>
</body>
</html>
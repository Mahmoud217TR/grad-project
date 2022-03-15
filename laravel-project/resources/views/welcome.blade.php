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
      main{
        background: url("{{ asset('images/background.jpg') }}");
        background-size:cover;
      }
    </style>

    <!-- fav icon -->
    @include('components.favicon')
</head>
<body  class="Body">
  <div id="app">
    {{--start page--}}

       <main>
        {{--start navbar--}}
        <div class="container-fluid">
          <div class="row d-flex align-items-center p-2">
            {{--Logo & NameProject--}}
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 d-flex pb-3">
              {{--start Logo--}}                  
                <a href="/" class="unstyled-anchor">
                  <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-1 ps-3 ">
                    @include('components.logo',['width'=>80,'height'=>80])
                  </div>
                </a>
              {{--end logo--}} 

              {{--Strat Name Project--}} 
                <a href="/" class="unstyled-anchor">
                  <div class="col-9 col-sm-3 col-md-5 col-lg-3 col-xl-3 pt-3 ps-2 ms-4">
                    <P class="h2" id="TextInHeader">{{ config('app.name', 'Laravel') }}</P>
                  </div>
                </a>
              {{--end Name--}}
            </div>
            {{----}}

            {{--Buttons in header--}}
            <div class="col-12 col-sm-5 col-md-4 col-lg-3 d-flex align-items-center justify-content-around">
              <a href="#" class="TH unstyled-anchor">services</a>
              <a href="#" class="TH unstyled-anchor">about us</a>
            </div>
            {{----}}

            {{--Person icon--}}
              <div class="col-12 col-sm-12 col-md-1 col-lg-1 d-flex align-items-center justify-content-around">
                <div>
                  <i class="bi bi-person mb-4 "></i>
                </div>
              </div>
            {{----}}
        </div>
        </div>
        {{--end navbar--}}
      
        {{--text--}}
        <div class="container ms-0 ps-5" id="ContentWelcome">
          <div class="row">
            <div class="col-8">
              <div class="text-start pt-3 mb-4">
                <p class="h1" id="Welcome">welcome to <span id="OrangeText">{{ config('app.name', 'Laravel') }}</span></p> 
              </div>
              <div class="text-start ps-3 pt-3 ">
                <p class="h4" id="Welcome">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, quae cupiditate nihil deleniti velit earum dolores dolore nam aut consequatur provident ducimus molestias ad iure officia inventore ipsam numquam quas esse praesentium rem. Itaque natus modi quis reprehenderit voluptate quas odio id quae nulla accusamus, aperiam dolor incidunt unde quidem.</p> 
              </div>
              <div class="text-start ps-2 pt-3">
                <a href="#" class="btn Rigester TB mx-2">Register</a>
                <a href="#" class="btn View TB mx-2">View</a>
              </div>
            </div>
          </div>
        </div>
        {{----}}
       </main>

    {{--end page--}}
  </div>
</body>
</html>
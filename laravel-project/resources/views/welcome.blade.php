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
</head>
<body  class="Body">
    {{-- Write your code here  --}}

    {{--start page--}}

       {{--start navbar--}}
           <div class="row align-items-center p-2">
               {{--Logo & NameProject--}}
                <div class="col-12 col-sm-12 col-md-7 col-lg-8 d-flex pb-3">
                  {{--start Logo--}}                  
                   <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-1 ps-3 ">
                      <svg width="80" height="80" viewBox="0 0 124 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M122 43.5133V29.1785L63.4207 3L2 29.1785V98.3603L63.4207 123L122 98.3603V64.7177" stroke="#FF2E00" stroke-width="5"/>
                       <path d="M82.8032 39.7162L61.5459 29.3998L28.8651 43.2625L61.5459 64.2048L92.3221 48.0839L98 52.9472V85.9996L61.5459 101.4L26 85.9996V69.068" stroke="#F0EFF0" stroke-width="5"/>
                      </svg>
                   </div> 
                  {{--end logo--}} 

                  {{--Strat Name Project--}} 
                   <div class="col-9 col-sm-3 col-md-5 col-lg-3 col-xl-3 pt-3 ps-2 ms-4">
                    <P class="h2" id="TextInHeader">geekdom</P>
                   </div>
                  {{--end Name--}}
                </div>
               {{----}}

               {{--Buttons in header--}}
                <div class="col-12 col-sm-5 col-md-4 col-lg-3 d-flex" style="justify-content:space-around">
                  <p class="TH">services</p>
                  <p class="TH">about as</p>
                </div>
               {{----}}

               {{--Person icon--}}
                 <div class="col-12 col-sm-12 col-md-1 col-lg-1 d-flex" style="justify-content: center">
                   <i class="bi bi-person mb-4 "></i>
                 </div>
               {{----}}
            </div>
       {{--end navbar--}}
       
       {{--text--}}
        <div class="container ps-5" id="ContentWelcome">
         <div class="offset-lg-1 offset-xl-2 pt-3 ">
          <p class="h1" id="Welcome">welcome to <span id="NameProject">geekdom</span></p> 
         </div>
         <div class="offset-lg-3 offset-xl-3 ps-3 pt-3 ">
          <p class="h4" id="Welcome">dsfsifhsdhfsuihfodjfooisdhfuosdhfuodshfufhus</p> 
         </div>
         <div class="offset-lg-4 offset-xl-5 ps-3 pt-3">
          <button class="btn Rigester TB" type="button">Rigester</button>
          <button class="btn View TB" type="button">View</button>
         </div>
        </div>
       {{----}}

    {{--end page--}}

    
</body>
</html>
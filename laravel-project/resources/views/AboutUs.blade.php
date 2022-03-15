<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubout Us</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js" type="text/javascript" charset="utf-8"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- fav icon -->
    @include('components.favicon')
</head>
<body  class="body-color">
  <div id="app">

    {{--text--}}
    <div class="container align-items-center">
        <div class="container container1">
          <div class="d-lg-flex my-5">
            <div class="">
             <p class="head-line orange-text">Few Words About Us:</p>
             <p class="base-line"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
               </p>
            </div>
              @include('components.SVG3')
          </div>
    </div>     
    {{----}}



  </div>
</body>
</html>
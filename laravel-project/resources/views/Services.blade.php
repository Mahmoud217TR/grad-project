<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>

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
    <div class="text-center pt-1">
      <p class="page-title pt-5 orange-text">services</p>
    </div> 
      <div class="container container1">
        <div class=" d-lg-flex my-5">
          <div class="">
           <p class="head-line orange-text">1- online ide with multiple languages</p>
           <p class="base-line"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
             </p>
          </div>
            @include('components.SVG1')
        </div>
        <div class="d-lg-flex my-5">
            @include('components.SVG2')
          <div>
            <p class="head-line orange-text">2- blogger for experienced devloper</p>
            <p class="base-line"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
        </div>
        <div class="d-lg-flex my-5">
          <div>
            <p class="head-line orange-text">3- providing codes or built-in function in different languages to ease search</p>
            <p class="base-line"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
            @include('components.SVG1')
        </div>
        <div class="d-lg-flex my-5">
            @include('components.SVG2')
          <div>
            <p class="head-line orange-text">4- making their own cheat sheets</p>
            <p class="base-line"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
        </div>
        <div class="d-lg-flex my-5">
          <div>
            <p class="head-line orange-text">5- taking mcq quests for different languages</p>
            <p class="base-line"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
            @include('components.SVG1')
        </div>
      </div>
  </div>
{{----}}

    {{--end page--}}

  </div>
</body>
</html>
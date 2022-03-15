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
<body  class="BodyColor">
  <div id="app">

{{--text--}}
  <div class="container">
    <div class="text-center pt-1">
      <p class="h2 pt-5" id="OrangeText">services</p>
    </div> 
      <div class="container" id="container">
        <div class="row">
          <div class="col-7">
           <p class="h3" id="OrangeText">1- online ide with multiple languages</p>
           <p class="h4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
             </p>
          </div>
          <div class="col-5">
            @include('components.SVG1')
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            @include('components.SVG2')
          </div>
          <div class="col-7">
            <p class="h3" id="OrangeText">2- blogger for experienced devloper</p>
            <p class="h4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <p class="h3" id="OrangeText">3- providing codes or built-in function in different languages to ease search</p>
            <p class="h4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
          <div class="col-5">
            @include('components.SVG1')
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            @include('components.SVG2')
          </div>
          <div class="col-7">
            <p class="h3" id="OrangeText">4- making their own cheat sheets</p>
            <p class="h4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <p class="h3" id="OrangeText">5- taking mcq quests for different languages</p>
            <p class="h4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit repudiandae itaque pariatur quae odio nulla quasi quis fugiat excepturi officia? Reiciendis alias, enim repellendus itaque odit vero error tempora possimus!
            </p>
          </div>
          <div class="col-5">
            @include('components.SVG1')
          </div>
        </div>
      </div>
  </div>
{{----}}

    {{--end page--}}

  </div>
</body>
</html>
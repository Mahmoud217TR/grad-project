{{--receiving message--}}
<div class="container">

    <div class="row">
      <div class="col text-center pyt-1">
      <h1 class="orange-text pt-5">WE RECIEVE YOUR REPORT</h1>
      <h2 class="orange-text pt-5">THANK YOU DARLING</h2>
      </div>
    </div>
    <div class="row g-3 ">
      <div class="col-3 "></div>

      <div class="col-6 justify-content-center pt-5">
        <a href="{{ route('welcome') }}" class="unstyled-anchor">
          @include('components.SVG19',['width'=>80,'height'=>80])
        </a>
      </div>

      <div class="col-3"></div>
  
    </div>

    <div class="row g-3 ">
      <div class="col-4 "></div>

      <div class="col-4">
          <button type="submit" class="btnReport button-primary TB box">
              {{ ('go to home page') }}
          </button>
      </div>

      <div class="col-4"></div>
  
    </div>



  </div>
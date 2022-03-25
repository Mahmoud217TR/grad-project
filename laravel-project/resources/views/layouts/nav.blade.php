
<div class="container-fluid">
  {{-- Write your code here  --}}
  {{--start navbar--}}
  
  <div class="row d-flex align-items-center p-2 nav-image" >
    {{--Logo & NameProject--}}
      <div class="col-lg-6">
        <div class="row">
        <div class="col-lg-2 d-flex justify-content-center align-items-center">
          {{--start Logo--}}                  
          <a href="{{ route('welcome') }}" class="unstyled-anchor">
              @include('components.logo',['width'=>60,'height'=>60])
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
            <a href="{{ route('editor') }}" class="TH unstyled-anchor">Editor</a>
          </div>
          <div class="col-lg-2 d-flex justify-content-center align-items-center">
            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="TH unstyled-anchor">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
              @csrf
            </form>
          </div>
        </div>
      </div>
    {{----}}
  </div>
  
{{--end navbar--}}
</div>
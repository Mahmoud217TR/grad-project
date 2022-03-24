
{{-- Write your code here  --}}
  {{--start navbar--}}
  
    <div class="row d-flex align-items-center p-2 fixed-top nav-image" >
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
    
{{--end navbar--}}
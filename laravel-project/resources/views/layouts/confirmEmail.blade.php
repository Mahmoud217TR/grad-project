{{--confirm report by email--}}
<div class="container">
    <div class="row">
      <div class="col text-start pyt-1">
      <h1 class="orange-text pt-5">CONFIRM YOUR REPORT BY EMAIL</h1>
      </div>
  </div>
  <div class="row my-2 my-md-4">
      <div class="codesubmit container  py-4 my-4 col-md-7 col-10 ps-3">
              <form method="POST" action=" " class="ps-3">
                <div class="row">
                  <label for="name" class="col-form-label text-start ">{{ __('Name :') }}</label>

                  <div class="col-10">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
                  <div class="row">
                    <label for="email" class="col-form-label text-start">{{ __('Email :') }}</label>

                    <div class="col-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                  <div class="row">
                    <label for="password" class="col-form-label text-start">{{ __('Password :') }}</label>

                    <div class="col-10">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                  
                  <div class="row justify-content-center  justify-content-md-end  mx-3 pt-5">
                      <div class="col-md-3 text-end col-4 mb-3">
                         <button type="confirm" class="btn button-pri-sheet TB box ">
                             {{ ('confirm') }}
                         </button>
                      </div>
                      <div class="col-md-2 col-4">
                         <button type="submit" class="btn button-pri-sheet TB box  ">
                             {{ ('Cancel') }}
                         </button>
                      </div>
                  </div>
                  </div>
                  <div>
                  </div>
              </form>
          </div>

        <div class="row g-3 ">
          <div class="col-4 ">
            
          </div>
          <div class="py-3 col-4">
            
        </div>
        <div class="col-4"style="margin-left: +800px ; margin-top: -470px">
          <a href="{{ route('welcome') }}" class="unstyled-anchor">
            @include('components.svg18',['width'=>80,'height'=>80])
        </a>
        </div>
    </div>
          
</div>
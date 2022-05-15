{{--create report--}}
<div class="container">
  <div class="row">
    <div class="col text-start pyt-1">
    <h1 class="orange-text pt-5">TELL US WHAT'S HAPPENING... ?</h1>
    </div>
</div>
<div class="row my-2 my-md-4">
    <div class="codesubmit container  py-3 my-4 col-md-7 col-10 ps-3">
            <form method="POST" action=" " class="ps-3">
              <div class="row pt-2 col-3">
                <label for="email" class="col-form-label text-start">{{ __('Your Email :') }}</label>
              </div>
              <div class="row">
                <div class="col-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            
                <div class="row pt-2">
                    <div class=" col-3">
                    <label> Report title :</label>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" class="form-control  box" id="title-sheet" placeholder="enter title">
                      </div>
                    </div>
                </div>
                <div class="row pt-2">
                  <div class=" col-3">
                    <label> Report type :</label>
                  </div>
                  <div class="row">
                    <div class="col-6">
                     <select class="form-select" aria-label="Default select example">
                      <option value="1" selected>One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                     </select>
                    </div>
                  </div>
                </div>
                <div class="row pt-3">
                    <div class="form-group col-11">
                        <label for="editeSheet1">Explain the problem</label>
                        <textarea class="form-control" id="editeSheet1" rows="4"></textarea>
                      </div>
                </div>
                <div class="row justify-content-center  justify-content-md-end  mx-1 pt-4">
                    <div class="col-md-3 text-end col-5 mb-3">
                       <button type="submit" class="btn button-pri-sheet TB box ">
                           {{ ('Submit') }}
                       </button>
                    </div>
                    <div class="col-md-2 col-5">
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
        <div class="col-4"style="margin-left: -110px;margin-top: -560px">
          <a href="{{ route('welcome') }}" class="unstyled-anchor">
            @include('components.svg17',['width'=>80,'height'=>80])
        </a>
        </div>
    </div>
  </div>

  
  </div>

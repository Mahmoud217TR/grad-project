@section('alert')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col">
            <div class="card registration-box">
                <div class="card-body">
                    <div class="border-bottom border-2">
                      <div class="text-start pb-2 head-line">{{ __('information') }}</div>
                    </div>
                </div>

                <div class="card-body">

                   <p class="base-line">
                       {{ __('Dear user,are you sure?') }}
                    </p>
                        <div class="row row-cols-auto mb-0 justify-content-center">
                                <div>
                                    <button type="submit" class="btn button-primary TB" >
                                        {{ __('confirm') }}
                                    </button>
                                </div>
                                <div>
                                    <button type="submit" class="btn button-secondary TB" >
                                        {{ __('cancel') }}
                                    </button>
                                </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

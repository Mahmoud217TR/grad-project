@extends('layouts.app')
@section('content')
<div class="container">
    {{--begin row--}}
    <div class="card my-4">
        <div class="card-header badge bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
             <p class="base-line text-primary">
                 Today
             </p>
        </div>
        <div class="card-body collapse" id="collapse1">
          {{--begin Table--}}
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fw-bold text-gray-600 gy-5" id="">
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <div class="badge bg-danger">500 ERR</div>
                            </td>
                            <td>
                                /invalid
                            </td>
                            <td class="pe-0 text-end w-25">
                                6:05 pm
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25">
                                <div class="badge bg-success">200 OK</div>
                            </td>
                            <td>
                                /ok
                            </td>
                            <td class="pe-0 text-end w-25">5:20 pm

                            </td>
                            </tr>
                    </tbody>
                </table>
            </div>
          {{--end Table --}}
        </div>
    </div>
    {{--end row--}}

    {{--begin row--}}
    <div class="card my-4">
        <div class="card-header badge backg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <p class="base-line text-primary">
                Yesterday
            </p>
        </div>
        <div class="card-body collapse" id="collapse2">
            {{--begin Table--}}
              <div class="table-responsive">
                  <table class="table align-middle table-row-dashed fw-bold text-gray-600 gy-5" id="">
                      <tbody>
                          <tr>
                              <td class="w-25">
                                  <div class="badge bg-warning">404 WRN</div>
                              </td>
                              <td>
                                  /not_found
                              </td>
                              <td class="pe-0 text-end w-25">
                                  6:05 pm
                              </td>
                          </tr>
                          <tr>
                              <td class="w-25">
                                  <div class="badge bg-success">200 OK</div>
                              </td>
                              <td>
                                  /ok
                              </td>
                              <td class="pe-0 text-end w-25">5:20 pm
  
                              </td>
                              </tr>
                      </tbody>
                  </table>
              </div>
            {{--end Table --}}
          </div>
    </div>
    {{--end row--}}
</div>
@endsection
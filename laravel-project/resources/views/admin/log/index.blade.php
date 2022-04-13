@extends('layouts.app')
@section('content')
<div class="container">
    @forelse ($log_chunks as $date=>$logs)
        {{--begin row--}}
        <div class="card my-4">
            <div class="card-header badge @if($loop->index%2) backg-primary @else bg-dark @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse1">
                <p class="base-line text-primary m-0 p-1">
                    {{ $date }}
                </p>
            </div>
            <div class="card-body collapse" id="collapse{{ $loop->index }}">
            {{--begin Table--}}
            @foreach ($logs as $log)
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fw-bold text-gray-600 gy-5" id="">
                        <tbody>
                            <tr>
                                <td class="w-25">
                                    <div class="badge @if($log->TypeValue() < 2) bg-info @elseif($log->TypeValue() < 4) bg-success @elseif($log->TypeValue() < 5) bg-danger @else bg-warning @endif">{{ $log->type }}</div>
                                </td>
                                <td>
                                    <a class="unstyled-anchor1" href="{{ route('log.show',$log) }}">{{ $log->title }}</a>
                                </td>
                                <td class="pe-0 text-end w-25">
                                    {{ $log->created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            @endforeach
            {{--end Table --}}
            </div>
        </div>
        {{--end row--}}
    @empty
        <div class="diplay-4">
            No Logs.
        </div>
    @endforelse
</div>
@endsection
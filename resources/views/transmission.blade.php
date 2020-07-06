@extends('index')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if(sizeOf($results) > 0)
            @foreach ($results as $index => $result)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$result['area_name']}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-400"><span class="{{$result['count_based'] == $result['count_trans'] ? "text-success" : "text-warning"}}">{{$result['count_trans']}}</span> of {{$result['count_based']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plane fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
@extends('index')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>List of not transmitted EAs</h3>
        </div>
        <div class="card-body">
            @if(sizeOf($result) > 0)
                <div class="row">
                @foreach ($result as $value)
                <div class="col-md-12">
                    <div class="input-group mt-2">
                        <label for="ea"><strong class="text-danger">{{$value->eacode}}</strong></label>
                    </div>
                </div>
                @endforeach
                </div>
                @else
                <label for="ea"><strong class="text-success">Area Completed</strong></label>
            @endif
        </div>
    </div>
</div>

@endsection
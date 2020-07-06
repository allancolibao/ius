@extends('index')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Please select the AREAs you want to export (multiple)</h3>
        </div>
        <div class="card-body">
            <div>
                <div class="input-group my-3">
                    <input style="width: 1.5em;  height: 1.5em;" class="mr-4" type="checkbox" id="check-all">
                    <label for="ea" class="text-warning"><strong>Select All Areas</strong></label>
                </div>
            </div>
            <form method="post" action="{{ route('data.export') }}">
                @csrf
                @if(sizeOf($areas) > 0)
                    <div class="row">
                    @foreach ($areas as $area)
                    <div class="col-md-3">
                        <div class="input-group mt-2">
                            <input style="width: 1.5em;  height: 1.5em;" class="mr-4" type="checkbox" name="ea[]" id="ea" value="{{$area->ea}}">
                            <label for="ea"><strong>{{$area->name}}</strong></label>
                        </div>
                    </div>
                    @endforeach
                    </div>
                @endif
                <div class="my-3">
                <button class="btn btn-warning" role="submit">Export IYCF Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
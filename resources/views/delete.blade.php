@extends('index')

@section('content')
<h3>Delete member using excel or csv file.</h3>
<div class="card bg-light my-4">
    <div class="card-header">
        Uploaded CSV Data <span class="text-danger">(Please double check the header before import the CSV)</span>
    </div>
    <div class="card-body">
        <form action="{{ route('import.to.delete') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control" required>
            <br>
            <button class="btn btn-success">Import Data</button>
        </form>
    </div>
</div>
<table id="dataTablesRem" class="table table-bordered" style="width:100%">
    <thead >
        <tr>
            <th colspan="6" class="fixed-columns">Preview</th>
        </tr>
        <tr>
            <th>EACODE</th>
            <th>HCN</th>
            <th>SHSN</th>
            <th>MEMBER NO</th>
        </tr>
    </thead>
    <tbody style="background-color: #fff">
    @if(sizeOf($toDelete) > 0)
        @foreach ($toDelete as $data)
            <tr>
                <td>{{$data->eacode}}</td>
                <td>{{$data->hcn}}</td>
                <td>{{$data->shsn}}</td>
                <td>{{$data->member_code}}</td>
            </tr>
        @endforeach
        <div>
            <a href="{{route('delete.indiv')}}">
                <button type="button" class="d-sm-inline-block btn  btn-warning shadow-sm">
                    Delete Individuals
                </button>
            </a>
            <a href="{{ route('delete.to.delete')}}">
                <button type="button" class="d-sm-inline-block btn  btn-danger shadow-sm">
                    Delete Uploaded Data
                </button>
            </a>
        </div>
    @else 
        <tr>
            <td colspan="6">
                <h5 class="text-warning text-bold">No data found, Please upload CSV data</h5>
            </td>
        </tr>
    @endif
    </tbody>
</table>
@endsection
@extends('index')

@section('content') 
<div class="table-responsive table-responsive-foodrecord">
    <table id="dataTables" class="table table-bordered">
        <thead>
            <tr>
                <th>Edit</th>
                <th>Eacode</th>
                <th>Hcn</th>
                <th>Shsn</th>
                <th>Member no.</th>
                <th>Full name</th>
                <th>Age</th>
                <th>Age(mos)</th>
                <th>Sex</th>
                <th>
                    @if(sizeOf($fields) > 0)
                        @foreach ($fields as $field)
                            <label for="{{$field->text}}">{{$field->text}}</label>
                        @endforeach
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
        @if(sizeOf($iycf) > 0)
            @foreach ($iycf as $data)
                <tr>
                    <td><button class="btn btn-primary btn-sm open-modal" data-path={{ route('edit', ['id'=> $data->id])}}><i class="fa fa-pen"></i></button></td>
                    <td>{{$data->eacode}}</td>
                    <td>{{$data->hcn}}</td>
                    <td>{{$data->shsn}}</td>
                    <td>{{$data->member_code}}</td>
                    <td>{{$data->surname_f11.', '.$data->givenname_f11}}</td>
                    <td>{{$data->age_f11}}</td>
                    <td>{{$data->agemos}}</td>
                    <td>{{$data->sex_f11}}</td>
                    <td>
                        @if(sizeOf($fields) > 0)
                            @foreach ($fields as $field)
                                <input class="form-control" type="text" name="{{$field->text}}" placeholder="{{$field->text}}" value="{{$iycf[$field->text]}}" autocomplete="true">
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        @else 
            <tr>
                <td colspan="9">
                    <h5 class="text-warning text-bold">No result found, Please re-enter EACODE!</h5>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection
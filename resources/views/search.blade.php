@extends('index')

@section('content') 
<form method="post" action="{{ action('MainController@bulkUpdate') }}">
    @csrf
    <table id="dataTables" class="table table-bordered" style="width:100%">
        <thead >
            <tr>
                <th class="fixed-columns">Edit</th>
                <th class="fixed-columns">Eacode</th>
                <th class="fixed-columns">Hcn</th>
                <th class="fixed-columns">Shsn</th>
                <th class="fixed-columns">Member no.</th>
                <th class="fixed-columns">Full name</th>
                <th class="fixed-columns">Age</th>
                <th class="fixed-columns">Age(mos)</th>
                <th class="fixed-columns">Sex</th>
                @if(sizeOf($iycf) > 0)
                    @if(sizeOf($fields) > 0)
                        @foreach ($fields as $field)
                        <th>
                            <label for="{{$field->text}}">{{$field->text}}</label>
                        </th>
                        @endforeach
                    @endif
                @endif
            </tr>
        </thead>
        <tbody style="background-color: #fff">
        @if(sizeOf($iycf) > 0)
            @foreach ($iycf as $data)
                <tr>
                    <td class="fixed-columns"><button class="btn btn-primary btn-sm open-modal" data-path={{ route('edit', ['id'=> $data->id])}}><i class="fa fa-pen"></i></button></td>
                    <td class="fixed-columns">{{$data->eacode}}</td>
                    <td class="fixed-columns">{{$data->hcn}}</td>
                    <td class="fixed-columns">{{$data->shsn}}</td>
                    <td class="fixed-columns">{{$data->member_code}}</td>
                    <td class="fixed-columns">{{$data->surname_f11.', '.$data->givenname_f11}}</td>
                    <td class="fixed-columns">{{$data->age_f11}}</td>
                    <td class="fixed-columns">{{$data->agemos}}</td>
                    <td class="fixed-columns">{{$data->sex_f11}}</td>
                    <input type="hidden" name="eacode" value="{{$data->eacode}}" />
                    <input type="hidden" name="id[]" value="{{$data->id}}" />
                    @if(sizeOf($fields) > 0)
                        @foreach ($fields as $field)
                        <td>
                            <input class="form-no-border" type="text" name="{{$field->text}}[]" placeholder="{{$field->text}}" value="{{$data[$field->text]}}" autocomplete="true">
                        </td>
                        @endforeach
                    @endif
                </tr>
            @endforeach
            <div style="position:fixed;z-index:999;">
                <button type="submit" class="autofocus d-sm-inline-block btn  btn-primary shadow-sm">
                    Update
                </button>
            </div>
        @else 
            <tr>
                <td colspan="205">
                    <h5 class="text-warning text-bold">No result found, Please re-enter EACODE!</h5>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</form>
@endsection
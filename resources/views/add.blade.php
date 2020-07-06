@extends('index')

@section('content') 
<div class="container">
    <h1 class="h4 mb-2 text-dark">Add IYCF Record</h1><hr/>
    <div class="mb-5">
        <form method="post" action="{{action('MainController@insert')}}">
            @csrf
            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="eacode">EACODE<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="eacode" placeholder="EACODE" value="{{ old('eacode')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="hcn">HCN<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="hcn" placeholder="HCN" value="{{ old('hcn')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="shsn">SHSN<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="shsn" placeholder="SHSN" value="{{ old('shsn')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="member_code">Member no.<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="member_code" placeholder="Member_code" value="{{ old('member_code')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="res_name">Res no.</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="res_name" placeholder="Res no" value="{{ old('res_name')}}" autocomplete="true">
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="surname_f11">Surname<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="surname_f11" placeholder="Surname" value="{{ old('surname_f11')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="givenname_f11">Givenname<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="givenname_f11" placeholder="Givenname" value="{{ old('givenname_f11')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="age_f11">Age<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="age_f11" placeholder="Age" value="{{ old('age_f11')}}" autocomplete="true" required>
                </div>
            </div>

            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="agemos">Age in mos</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="number" step="any" name="agemos" placeholder="Age in mos" value="{{ old('agemos')}}" autocomplete="true">
                </div>
            </div>


            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="sex_f11">Sex<strong><code>*</code></strong></label>
                </div>
                <div class="col-md-9">
                    <select type="text" class="form-control {{ $errors->has('sex_f11') ? 'has-error' : ''}}" name="sex_f11" id="sex_f11"  value="{{ old('sex_f11') }}" required>
                        <option value=''>Please select</option>
                        <option value='1' {{ (old("sex_f11") == '1' ? 'selected' : '') }} >1 - Male</option>
                        <option value='2' {{ (old("sex_f11") == '2' ? 'selected' : '') }} >2 - Female</option>
                    </select>  
                </div>
            </div>

            @if(sizeOf($fields) > 0)
                @foreach ($fields as $field)
                    <div class="input-group mt-2">
                        <div class="col-md-3">
                            <label for="{{$field->text}}">{{$field->text}}</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="{{$field->text}}" placeholder="{{$field->text}}" value="{{ old($field->text)}}" autocomplete="true">
                        </div>
                    </div>
                @endforeach
            @endif
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection

<div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
    <h1 class="h4 mb-2 text-dark">{{'Member '.$iycf->member_code.' '.$iycf->surname_f11.', '.$iycf->givenname_f11}}</h1><hr/>
    <div>
        <form method="post" action="{{ action('MainController@update', ['id' => $iycf->id, 'eacode' => $iycf->eacode]) }}">
            @csrf
            @if(sizeOf($fields) > 0)
                @foreach ($fields as $field)
                    <div class="input-group mt-2">
                        <div class="col-md-3">
                            <label for="{{$field->text}}">{{$field->text}}</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="{{$field->text}}" placeholder="{{$field->text}}" value="{{$iycf[$field->text]}}" autocomplete="true">
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="input-group mt-2">
                <div class="col-md-3">
                    <label for="remarks">Remarks</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" name="remarks" id="remarks" rows="4">{{$iycf['remarks']}}</textarea>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>

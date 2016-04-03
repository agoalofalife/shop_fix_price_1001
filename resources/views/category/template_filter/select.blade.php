<p>{{$attributs->parameter}}</p>

<select class="form-control" name="{{$attributs->id}}[]</p>">
    <option value="" selected></option>
@foreach(explode(',',$attributs->default) as $select_value)

        @if(isset($data_parameter))
            @if($data_parameter== $select_value)
            <option value="{{$data_parameter}}" selected>{{$data_parameter}}</option>
            @else
                <option value="{{$select_value}}">{{$select_value}}</option>
            @endif
            @else
            <option value="{{$select_value}}">{{$select_value}}</option>
        @endif
    @endforeach
</select><br>
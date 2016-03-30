<p>{{$value_parameter->parameter}}</p>

<select class="form-control" name="{{$value_parameter->parameter}}[]</p>">
@foreach(explode(',',$value_parameter->default) as $select_value)

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
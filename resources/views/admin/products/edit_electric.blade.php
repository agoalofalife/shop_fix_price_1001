 <p>Мощность</p>
 <textarea class="form-control" name="power" rows="5">{{ $attributes->power or ''}}</textarea><br>

 <p>Cрок гарантии </p>
 <input type="text" name="guarantee" value="{{$attributes->guarantee or ''}}" class="form-control"> <br>

 <p>Тип электроприборов</p>
 <select class="form-control " name="type_device">
     <option value="nothing"  ></option>
     @foreach($type_device as $device)
         @if($device==$attributes->type)
             <option value="{{$attributes->type}}"  selected>{{$attributes->type}}</option>
         @endif
         <option value="{{$device}}">{{$device}}</option>
     @endforeach
 </select><br>


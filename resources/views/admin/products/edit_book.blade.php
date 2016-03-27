<p>Автор</p>
<input type="text" name="author" value="{{$attributes->author or ''}}" class="form-control"> <br>

<p>Количество страниц</p>
<input type="text" name="pages" value="{{$attributes->number_pages or ''}}" class="form-control"> <br>

<p>Предмет изучения</p>
<select class="form-control input-lg " name="type_learning">
    <option value="nothing"></option>
    @foreach($type_learning as $subject)
    @if($subject==$attributes->genre)
    <option value="{{$attributes->genre}}"  selected>{{$attributes->genre}}</option>
        @endif
        <option value="{{$subject}}">{{$subject}}</option>
    @endforeach
</select><br>

<p>Тип мультиязычности</p>
<select class="form-control input-lg " name="type_mb">
    <option value="nothing"></option>
    @foreach($type_mb as $language)
        @if($language==$attributes->language)
            <option value="{{$attributes->language}}"  selected>{{$attributes->language}}</option>
        @endif
        <option value="{{$language}}">{{$language}}</option>
    @endforeach
</select><br>

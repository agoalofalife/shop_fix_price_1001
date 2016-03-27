@extends('layouts.default_admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="/admin/products/{{$attributes->id}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <p>Название</p>
            <input type="text" name="title" value="{{$attributes->title}}" class="form-control"> <br>
            <p>Бренд</p>
            <input type="text" name="mark" value="{{$attributes->mark}}" class="form-control"> <br>
            <p>Описание</p>
            <textarea class="form-control" name="description" rows="5">{{$attributes->description}}</textarea><br>
            <p>Рекомендовать товар</p>
            <label class="radio-inline">
            <input type="radio" name="recommend"  value="1" {{ $attributes->recommend==1 ? 'checked' : '' }}> Да
            </label>
            <label class="radio-inline">
            <input type="radio" name="recommend"  value="0" {{ $attributes->recommend==0 ? 'checked' : '' }}>Нет
            </label>

           <br><br>
            <select class="form-control input-lg " name="display">
                <option value="1" >Показывать</option>
                <option value="0" >Не показывать</option>
            </select><br>

            @include($template)
            <input  value="Обновить" class="btn btn-success" type="submit">
        </form>
        {{--{{dd($template)}}--}}
        @include('layouts.errors')
@include('layouts.errors')
    </div>
</div>
    @stop

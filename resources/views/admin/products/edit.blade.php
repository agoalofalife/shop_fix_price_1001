@extends('layouts.default_admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/admin/products/{{$product->id}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <p>Название</p>
                <input type="text" name="title" value="{{$product->title}}" class="form-control"> <br>
                <p>Бренд</p>
                <input type="text" name="mark" value="{{$product->mark}}" class="form-control"> <br>
                <p>Описание</p>
                <textarea class="form-control" name="description" rows="5">{{$product->description}}</textarea><br>
                <p>Рекомендовать товар</p>
                <label class="radio-inline">
                    <input type="radio" name="recommend" id="inlineRadio1" value="1"> Да
                </label>
                <label class="radio-inline">
                    <input type="radio" name="recommend" id="inlineRadio2" value="0" > Нет
                </label><br><br>
                <select class="form-control input-lg " name="display">
                    <option value="1" >Показывать</option>
                    <option value="0" >Не показывать</option>
                </select><br>
                <input  value="Обновить" class="btn btn-success" type="submit">
            </form>
            @forelse ($errors->all() as $error)
                <h4><p class="bg-danger ">{{$error}}</p></h4>
            @empty

            @endforelse
            @stop
        </div>
    </div>

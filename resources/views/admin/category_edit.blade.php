@extends('layouts.default_admin')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <p>Редактировать категорию № {{$category->id}}</p>
            <form action="/admin/category/{{$category->id}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <input type="text" name="title" value="{{$category->title}}" class="form-control"> <br>
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

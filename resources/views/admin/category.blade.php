@extends('layouts.default_admin')
@section('content')
    <div class="container col-md-6">
    <table class="table">
        <tr class="info">
            <td>№</td><td>Название категории</td><td>Статус категории</td>
        </tr>
                    @foreach($categories as $category_value)
            <tr>
                <td>{{ $counter ++}}</td>
                <td>{{$category_value->title}}</td>
                <td>
                    @if($category_value->status == 1)
                          {{  "В наличии" }}
                    @else {{  "Нет в наличии" }}
                    @endif
        <a href="/admin/category/edit/{{$category_value->id}}"
        rel="tooltip" title="Редактировать" style="float: right">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <a href="/admin/category/destroy/{{$category_value->id}}" style="float: right"  rel="tooltip" title="Удалить" >
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td> </tr>

                   @endforeach

    </table>
    </div>
    <div class="row">
        <div class="col-md-3">
            <form action="/admin/category/create" method="post">
                {{csrf_field()}}
                Добавить категорию:<input type="text" name="newCategory" class="form-control"> <br>
                <select class="form-control input-lg " name="display">
                    <option value="1" >Показывать</option>
                    <option value="0" >Не показывать</option>
                </select><br>
                <input type="submit" class="btn btn-success" value="Добавить">
            </form>
            @forelse ($errors->all() as $error)
                <h4><p class="bg-danger ">{{$error}}</p></h4>
            @empty

            @endforelse
            @stop
        </div>
    </div>


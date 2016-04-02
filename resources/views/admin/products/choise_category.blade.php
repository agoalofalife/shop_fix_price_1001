@extends('layouts.default_admin')
@section('content')
    <div class="col-md-6">
    <div class="container">
    <span class="label label-success">Выбрать категорию</span><br><br>
        <ul class="list-inline">
            @foreach($categories as $category)
                <h4><a href="{{$category->id}}"><li class="label label-primary">{{$category->title}}</li></a></h4>
            @endforeach
        </ul>
    </div>
    </div>
@stop
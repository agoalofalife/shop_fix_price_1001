@extends('layouts.default_admin')
@section('content')
    <div class="container col-md-6">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Таблица продуктов</div>
        <!-- Table -->
        <table class="table">
    <tr><td>№</td><td>Название</td><td>Марка</td><td>Название категории</td>
    <td>Остаток на складе</td></tr>
            @foreach($products as $product)
                <tr><td>{{$counter ++}}</td>
                <td>    {{$product->title_product}}</td>

                <td>    {{$product->mark}}</td>
                <td>  {{$product->title_category}}</td>
                <td>    {{$product->count}}</td></tr>
                @endforeach
        </table>
    </div>
    </div>
@stop
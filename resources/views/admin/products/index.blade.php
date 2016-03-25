@extends('layouts.default_admin')
@section('content')
    <div class="container col-md-6">
    <div class="panel panel-default">
        <!-- Default panel contents -->
  <div class="panel-heading ">Таблица продуктов</div>
        <!-- Table -->
        <table class="table">
            <tr><td>№</td><td>Название</td>
                <td>Марка</td>
                <td>Название категории</td>
                <td>Остаток на складе</td></tr>
            @foreach($products as $product)
                <tr><td>{{$counter ++}}             </td>
                <td>    {{$product->title_product}} </td>
                <td>    {{$product->mark}}          </td>
                <td>    {{$product->title_category}}</td>
                <td>    {{$product->count}}         </td>
                    {{--{{$product->number_product}}--}}
                <td><a href="/admin/products/edit/{{$product->id}}">
                <span class="glyphicon glyphicon-edit " title="Редактировать"></span></a>
                </td></tr>
                @endforeach
        </table>
    </div>
    </div>
    <form class="col-md-2" action="/admin/products/filter" method="post">
        {{csrf_field()}}
        {{--Максимальная цена до :--}}
        {{--<input type="text" name="max_price" class="form-control"> <br>--}}

        Количество на складе :
        <select class="form-control input-lg " name="quantity">
            <option value="10" >До 10 </option>
            <option value="50" >До 50</option>
            <option value="100" >До 100</option>
            <option value="500" selected >До 500</option>
        </select><br>
        Выбрать категорию :
        <select class="form-control input-lg " name="filter_category">
            <option value="10000000000" selected>Все</option>
            @foreach($category as $name_category)
                <option value="{{$name_category->id}}" >{{$name_category->title}}</option>
                @endforeach


        </select><br>
        <input  value="Обновить" class="btn btn-success" type="submit">
    </form>
    <div class="container col-md-12">
    @unless (!$products)
        <div style="text-align: center">{{  $products->render()}}</div>
    @endunless
    </div>
@stop

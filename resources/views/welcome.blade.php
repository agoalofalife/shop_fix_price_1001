@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 sidebar">
                        <ul class="nav nav-sidebar">
                            <li><a href="#" class="bg-primary">Категории</a></li>
                            @foreach($categories as $nameColumn)
                        <li>  <a href="category/{{ $nameColumn->id }}">{{  $nameColumn->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <h3>Рекомендованный товар</h3>
                    @foreach($recommend_list_products as $products_recommend)
                        <div class="col-md-2" >
                            <div class="thumbnail" >
                                <a href="/product/{{$products_recommend->id}}"><img src="{{unserialize($products_recommend->link_img)[0]}}" alt="product" ></a>
                                <div class="caption">
                                    <h3>{{$products_recommend->title}}</h3>
                                    <p style="text-align: center">Остаток на складе {{$products_recommend->count}}</p>
                                    <p><a href="#" class="btn btn-success pull-center" role="button">Заказать</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
        </div>
    </div>
</div>
</div>
</div>
    @stop


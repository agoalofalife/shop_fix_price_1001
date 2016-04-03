@extends('layouts.app')

@section('content')
    @if(session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
        {{Session::forget('info')}}
    @endif
    <div class="container ">

    <div class="row">
        <div class="row" >
            <div class="container-fluid">
                <div class="row">
                    @include('category.template')
                    <h3>Рекомендованный товар</h3>
                    @foreach($recommend_list_products as $products_recommend)
                        <div class="col-md-3" >
                            <div class="thumbnail" >
                                <a href="/product/{{$products_recommend->id}}"><img src="{{unserialize($products_recommend->link_img)[0]}}" alt="product" ></a>
                                <div class="caption">
                                    <h3>{{$products_recommend->title}}</h3>
                                    <p style="text-align: center">Остаток на складе {{$products_recommend->count}}</p>
                                    <p><a href="/cart/add/{{$products_recommend->id}}" class="btn btn-success pull-center" role="button">Заказать</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--Вывод пагинации--}}
                    @if(isset($recommend_list_products))
                        @unless (!$recommend_list_products)
                            <div style="text-align: center">{{  $recommend_list_products->render()}}</div>
                        @endunless
                    @endif

                </div>
        </div>
    </div>
</div>
</div>
</div>
    @stop


@extends('layouts.app')

@section('content')
    @include('category.template')
    <div class="col-md-6">

    <table class="table">
        <tr class="info"><td>Название</td><td>Цена</td><td>Количество</td></tr>
    @foreach($array_cart_for_pay as $goods)
        <tr><td><a href="/product/{{$goods['id']}}">{{$goods['name']}}</a></td>
            <td>{{$goods['price']}}</td>
            <td>{{$goods['quantity']}}</td>
        <td><a href="cart/destroy/{{$goods['id']}}"><span class=" glyphicon glyphicon-remove"></span></a></td>
            <td><a href="cart/correct/{{$goods['id']}}?action=plus"><span class="glyphicon glyphicon-plus"></span></a></td>
            <td><a href="cart/correct/{{$goods['id']}}?action=minus"><span class="glyphicon glyphicon-minus"></span></a></td>
        </tr>
        @endforeach
        <tr class="danger"><td>В  корзине всего {{Session::get('count')}} товаров</td><td>На общую сумму  {{Session::get('count')*1001}} </td></tr>
    </table>

            <button class="btn btn-primary btn-success" data-toggle="modal" data-target="#myModal">Заказать</button>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Список товаров</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr class="info"><td>Название</td><td>Цена</td><td>Количество</td></tr>
                        @foreach($array_cart_for_pay as $goods)
                            <tr><td><a href="/product/{{$goods['id']}}">{{$goods['name']}}</a></td>
                                <td>{{$goods['price']}}</td>
                                <td>{{$goods['quantity']}}</td>
                            </tr>
                        @endforeach
                        <tr class="danger"><td>В  корзине всего {{Session::get('count')}} товаров</td><td>На общую сумму  {{Session::get('count')*1001}} </td></tr>
                    </table>
                    <p>Вам будет отправленно уведомление на почту {{Auth::user()->email}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

                    <a href="/cart/create/order"><button type="button" class="btn btn-primary">Оформить заказ</button></a>

                </div>
            </div>
        </div>
    </div>
    @stop

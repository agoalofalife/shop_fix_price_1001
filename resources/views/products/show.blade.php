@extends('layouts.app')
    @section('content')
        {{--{{dd($parameters)}}--}}
        @for($i=0;$i<count(unserialize($product->link_img));$i++)
           {{--{{ dd(unserialize($product->link_img)[$i])}}--}}
           <div class="container">
               <div class="row">
                   <div class="row" >
            <div class=" col-md-2">
                    <img src=" {{unserialize($product->link_img)[$i]}}" alt="...">
            </div>
        @endfor
                   </div>
               </div>
               <dl class="dl-horizontal">
                   <dt>Название</dt>
                   <dd>{{$product->title}}</dd>
                   <dt>Бренд</dt>
                   <dd>{{$product->mark}}</dd>
                   <dt>Описание товара </dt>
                   <dd>{{$product->description}}</dd>
                   @for($i=0;$i<count($product);$i++)
                       <dt></dt>
                       <dd></dd>
                       @endfor

               </dl>
           </div>
@stop
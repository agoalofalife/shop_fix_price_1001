@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="row" >
        @for($i=0;$i<count(unserialize($product->link_img));$i++)

            <div class=" col-md-3">
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
                   @for($i=0;$i<count($list_head_attributes);$i++)
                       <dt>{{$list_head_attributes[$i]->parameter}}</dt>
                       <dd>{{$list_attributes[$i]->data}}</dd>
                       @endfor
               </dl>
           </div>
@stop

@foreach($products as $product)
    <div class="col-md-2" >
        <div class="thumbnail" >
            <a href="/product/{{$product->id}}"><img src="{{unserialize($product->link_img)['0']}}" width="130" height="130"
                                                     alt="product" ></a>
            <div class="caption">
                <h4>{{$product->title}}</h4>
                <p style="text-align: center">Остаток на складе {{$product->count}}</p>
                <p><a href="/cart/add/{{$product->id}}" class="btn btn-success pull-center" role="button">Заказать</a></p>
            </div>
        </div>
    </div>
@endforeach
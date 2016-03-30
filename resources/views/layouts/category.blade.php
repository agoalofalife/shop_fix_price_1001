<div class="container">
    <div class="row">
        <div class="row" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 sidebar">
                        <ul class="nav nav-sidebar">
                            <li><a href="{{url('/')}}" class="bg-primary">Категории</a></li>
                            @foreach($categories as $nameColumn)
                                <li>  <a href="{{$nameColumn->id}}">{{  $nameColumn->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    @foreach($products as $product)
                        <div class="col-md-2" >
                            <div class="thumbnail" >
                                <a href="/product/{{$product->id}}"><img src="{{unserialize($product->link_img)['0']}}" width="120" height="100"
                                     alt="product" ></a>
                                <div class="caption">
                                    <h4>{{$product->title}}</h4>
                                    <p style="text-align: center">Остаток на складе {{$product->count}}</p>
                                    <p><a href="#" class="btn btn-success pull-center" role="button">Заказать</a></p>
                                </div>
                        </div>
                    </div>
                            @endforeach

                </div>
            </div>

        </div>
        {{--Вывод пагинации--}}
        @unless (!$products)
            <div style="text-align: center">{{  $products->render()}}</div>
        @endunless

    </div>
</div>
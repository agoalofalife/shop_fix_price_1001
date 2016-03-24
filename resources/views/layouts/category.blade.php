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
                                <img src="../images/avatar0.jpg" alt="product" >
                                <div class="caption">
                                    <h3>{{$product->title}}</h3>
                                    <p>{{$product->description}}</p>
                                    <p style="text-align: center">Остаток на складе {{$product->count}}</p>
                                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                </div>
                        </div>
                    </div>
                            @endforeach

                </div>
            </div>

        </div>

        @unless (!$products)
            <div style="text-align: center">{{  $products->render()}}</div>
        @endunless

    </div>
</div>
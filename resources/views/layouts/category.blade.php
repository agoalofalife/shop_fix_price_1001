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

@if(isset($products))
@include('products.template_show')
@endif
                </div>
            </div>

        </div>
        {{--Вывод пагинации--}}
        @if(isset($products))
            @unless (!$products)
                <div style="text-align: center">{{  $products->render()}}</div>
            @endunless
        @endif


    </div>
</div>
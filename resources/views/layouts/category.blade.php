<div class="container">
    <div class="row">
        <div class="row" >
            <div class="container-fluid">
                <div class="row">
@include('category.template')

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
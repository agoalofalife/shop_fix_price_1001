<div class="col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="{{url('/')}}" class="bg-primary">Категории</a></li>
                        @foreach($categories as $nameColumn)
                            <li>  <a href="/category/{{$nameColumn->id}}">{{  $nameColumn->title }}</a></li>
                        @endforeach
                        @if(isset($field_attributs))
                        <form action="/category/filter" method="post">
                            {{csrf_field()}}
                        @foreach($field_attributs as $attributs)

                            @if($attributs->type=='number')
                                @include('category.template_filter.numer')
                                @elseif($attributs->type=='select')
                                    @include('category.template_filter.select')
                            @elseif($attributs->type=='text')
                                @include('category.template_filter.text')
                            @endif
                        @endforeach
                            <input  value="Отфильтровать" class="btn btn-success" type="submit">
                        </form>
                        @endif
                    </ul>
</div>
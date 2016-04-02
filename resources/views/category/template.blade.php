<div class="col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="{{url('/')}}" class="bg-primary">Категории</a></li>
                        @foreach($categories as $nameColumn)
                            <li>  <a href="/category/{{$nameColumn->id}}">{{  $nameColumn->title }}</a></li>
                        @endforeach
                    </ul>
</div>
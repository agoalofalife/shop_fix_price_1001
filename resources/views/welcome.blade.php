@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 sidebar">
                        <ul class="nav nav-sidebar">
                            <li><a href="#" class="bg-primary">Категории</a></li>
                            @foreach($categories as $nameColumn)
                        <li>  <a href="category/{{ $nameColumn->id }}">{{  $nameColumn->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

            <div class="col-md-2" >
                <div class="thumbnail" >
                    <img src="images/avatar0.jpg" alt="product" >
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.default_admin')
@section('content')
    <div class="row">
        <div class="col-md-6">

    <p>Название продукта*</p>
    <input type="text" name="title" class="form-control"> <br>

    <p>Марка*</p>
    <input type="text" name="mark"  class="form-control"> <br>

    <p>Количество на складе (в цифрах)</p>
    <input type="text" name="count"  class="form-control" value="0"> <br>

    <p>Описание</p>
     <textarea class="form-control" name="description" rows="5"></textarea><br>

    <p>Показывать на сайте</p>
    <select class="form-control input-lg" name="status">
    <option value="1"       selected>Да</option>
    <option value="0"               >Нет</option>

    </select><br>

    <p>Рекомендовать товар*</p>
    <label class="radio-inline">
    <input type="radio" name="recommend"  value="1"> Да
    </label>
    <label class="radio-inline">
     <input type="radio" name="recommend"  value="0" checked>Нет
     </label><br><br>

       <p>Выбрать категорию товара*</p>
       <select class="form-control " name="type_learning">
       <option value="nothing"></option>
       @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->title}}</option>
       @endforeach
       </select><br>

    <p>Загрузить картинки</p>
    <input type="file" name="file" multiple /><br>

        </div>
    </div>

@stop


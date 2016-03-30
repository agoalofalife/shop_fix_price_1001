@extends('layouts.default_admin')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <form action="/admin/products/store/{{$category}}" method="post"  enctype="multipart/form-data">
                {{csrf_field()}}
    <p>Название продукта*</p>
    <input type="text" name="title" class="form-control"> <br>

    <p>Марка*</p>
    <input type="text" name="mark"  class="form-control"> <br>

    <p>Количество на складе (в цифрах)</p>
    <input type="text" name="count"  class="form-control" value="0"> <br>

    <p>Описание</p>
     <textarea class="form-control" name="description" rows="5"></textarea><br>

    <p>Показывать на сайте</p>
    <select class="form-control" name="status">
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
        @foreach($parameters as $value_parameter)
                @if ($value_parameter->type     == 'text')
                    @include('admin.template_form.text')
                @elseif ($value_parameter->type == 'select')
                    @include('admin.template_form.select')
                @elseif ($value_parameter->type == 'texterea')
                    @include('admin.template_form.select')
                    @elseif ($value_parameter->type == 'number')
                        @include('admin.template_form.number')
                    @endif
            @endforeach

    <p>Загрузить картинки</p>
                <h6>С помощью Ctr можете загрузить несколько изображений</h6>
                <p><input type="file" name="photo[]" multiple accept="image/*,image/jpeg"><br>

                <input  value="Создать" class="btn btn-success" type="submit">
            </form>

            @include('layouts.errors')
        </div>
    </div>

@stop


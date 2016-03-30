@extends('layouts.default_admin')
@section('content')

    <div class="col-md-6">
        <form action="/admin/products/{{$attributes->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <p>Название</p>
            <input type="text" name="title" value="{{$attributes->title}}" class="form-control"> <br>
            <p>Бренд</p>
            <input type="text" name="mark" value="{{$attributes->mark}}" class="form-control"> <br>
            <p>Описание</p>
            <textarea class="form-control" name="description" rows="5">{{$attributes->description}}</textarea><br>
            <p>Количество на складе (в цифрах)</p>
            <input type="text" name="count"  class="form-control" value="{{$attributes->count}}"> <br>
            <p>Рекомендовать товар</p>
            <label class="radio-inline">
            <input type="radio" name="recommend"  value="1" {{ $attributes->recommend==1 ? 'checked' : '' }}> Да
            </label>
            <label class="radio-inline">
            <input type="radio" name="recommend"  value="0" {{ $attributes->recommend==0 ? 'checked' : '' }}>Нет
            </label>

           <br><br>
            <p>Показывать на сайте</p>
            <select class="form-control" name="status">
                <option value="1" >Показывать</option>
                <option value="0" >Не показывать</option>
            </select><br>

{{--{{dd($parameters)--}}
{{--}}--}}
                @foreach($parameters as $data_parameter=> $value_parameter)

                @if ($value_parameter->type     == 'text')
                    @include('admin.template_form.text')
                @elseif ($value_parameter->type == 'select')
                    @include('admin.template_form.select')
                @elseif ($value_parameter->type == 'texterea')
                    @include('admin.template_form.texterea')
                @elseif ($value_parameter->type == 'number')
                    @include('admin.template_form.number')
                @endif
            @endforeach

            <p>Загрузить новые картинки</p>
            <h6>С помощью Ctr можете загрузить несколько изображений</h6>
            <p><input type="file" name="photo[]" multiple accept="image/*,image/jpeg"><br>

<input  value="Обновить" class="btn btn-success" type="submit">
        </form>

        @include('layouts.errors')

    </div>
    <form action="/admin/products/destroy/image/{{$attributes->id}}">
    <div class="row">
        <div class="col-md-3">
            @if(!empty($img_link))
    @foreach($img_link as $img)
        <div class="thumbnail">
            <img src="{{$img}}" class="img-thumbnail" alt="Картинка товара">
            <div class="caption">
                <button class="btn btn-danger"
                        name="delete" value="{{$img}}"
                        type="submit">Удалить</button></p>
            </div>
        </div>
    @endforeach
    @endif
        </div>
    </div>
    </form>
    @stop

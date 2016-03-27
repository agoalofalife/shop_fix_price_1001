@extends('layouts.default_admin')
@section('content')
    <div class="container col-md-4">
    <table class="table">
        <tr class="info">
            <td>№</td><td>Название категории</td>
            <td>Статус категории</td>
        </tr>
                    @foreach($categories as $category_value)
            <tr>
                <td>{{ $counter ++}}</td>
                <td>{{$category_value->title}}</td>
                <td>
                    @if($category_value->status == 1)
                          {{  "В наличии" }}
                    @else {{  "Нет в наличии" }}
                    @endif
        <a href="/admin/category/edit/{{$category_value->id}}"
        rel="tooltip" title="Редактировать" style="float: right">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <a href="/admin/category/destroy/{{$category_value->id}}" style="float: right"  rel="tooltip" title="Удалить" >
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td> </tr>

                   @endforeach

    </table>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/admin/category/store" method="post">
                {{csrf_field()}}
                Добавить категорию:<input type="text" name="newCategory" class="form-control"> <br>
                <select class="form-control" name="display">
                    <option value="1" >Показывать</option>
                    <option value="0" >Не показывать</option>
                </select><br>
                <p>Добавить slug для параметров (на анг)*</p>
                <input type="text" name="slug_table" class="form-control"><br>

            <p>Добавить дополнительный параметр в категорию</p>

            {{--<input type="text" name="name" class="form-control col-md-3 ">--}}
            <table class="table ">
                <tr><td>Название</td><td>Тип формы</td><td>Слаг на анг*</td></tr>
                <tr>
                    <td><input type="text" name="name_text[]" class="form-control"></td>

                    <td><select class="form-control" name="type_form[]">
                            <option value="text"    >Маленький текст</option>
                            <option value="textarea">Большой текст</option>
                            <option value="" selected></option>
                     </select></td>
                    <td><input type="text" name="slug[]" class="form-control  "></td></tr>


                <tr>
                    <td><input type="text" name="name_text[]" class="form-control"></td>

                    <td><select class="form-control" name="type_form[]">
                            <option value="text"    >Маленький текст</option>
                            <option value="textarea">Большой текст</option>
                            <option value="" selected></option>
                        </select></td>
                    <td><input type="text" name="slug[]" class="form-control"></td></tr>

                <tr>
                    <td><input type="text" name="name_text[]" class="form-control"></td>

                    <td><select class="form-control" name="type_form[]">
                            <option value="text"    >Маленький текст</option>
                            <option value="textarea">Большой текст</option>
                            <option value="" selected></option>
                        </select></td>
                    <td><input type="text" name="slug[]" class="form-control "></td></tr>

            </table><br>

                <p>Добавить параметр - список в категорию</p>

                <table class="table ">
                    <tr><td>Название списка</td><td>Название параметра</td><td>Слаг на анг*</td></tr>
                    <tr>
                        <td><input type="text" name="name_select[]" class="form-control "></td>

                        <td><input type="text" name="name_attribut[]" class="form-control "></td>
                        <td><input type="text" name="name_slug[]" class="form-control "></td></tr>

                    <tr><td></td>
                        <td><input type="text" name="name_attribut[]" class="form-control "></td>
                        <td><input type="text" name="name_slug[]" class="form-control "></td>
                    </tr>

                    <tr><td></td>
                        <td><input type="text" name="name_attribut[]" class="form-control "></td>
                        <td><input type="text" name="name_slug[]" class="form-control "></td>
                    </tr>
                    <tr><td></td>
                        <td><input type="text" name="name_attribut[]" class="form-control "></td>
                        <td><input type="text" name="name_slug[]" class="form-control "></td>
                    </tr>

                </table><br>
                <input type="submit" class="btn btn-success" value="Добавить">
            </form>
        </div>
    </div>
    @include('layouts.errors')
@stop

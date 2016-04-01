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
                    <option value="1" >Показывать на сайте</option>
                    <option value="0" >Не показывать на сайте</option>
                </select><br>
                {{--Таблица для добавление парматров категорию--}}
            <p>Добавить дополнительный параметр в категорию</p>
                <table class="table">
                 <tr><td>Название параметра</td><td>Тип поля</td><td>Значения по умолчанию</td></tr>
                    @for ($i = 0; $i < 5; $i++)
                        <tr><td><input type="text" name="nameAttribut[]" class="form-control"> </td>
                            <td>
                                <select class="form-control" name="type_form[]">
                                    <option value="texterea" >   Большое поле</option>
                                    <option value="text"     >   Маленькое поле</option>
                                    <option value="select"   >   Выпадаюший список</option>
                                    <option value="number"   >   Числовое поле</option>


                                </select>
                            </td>
                            <td><input type="text" name="default[]" class="form-control"> </td></tr>
                    @endfor

                </table>



                <input type="submit" class="btn btn-success" value="Добавить">
            </form><br>

            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Справка заполнение параметров
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Название модали</h4>
                        </div>
                        <div class="modal-body">

                            <img src="/images/info_form.png" alt="">
                          1.В первой ячейки пишем название парметра.<br>
                          2.Во второй указываем какой тип поля нам нужен<br>
                          3.Если тип поля по умолчанию не подразумевает<br>
                          значения по умолчанию, то не указваем.<br>
                          4.5.В таком поле как выпадающий список указываем значения.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @include('layouts.errors')
@stop

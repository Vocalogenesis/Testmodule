@extends('testmodule::app')

@section('content')

<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Создание нового теста</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('testmoduleCreateTestSubmit')}}" method="post" role="form">
    <div class="card-body">
        <div class="form-group">
        <label for="name">Название теста</label>
        <input name="name" type="text" class="form-control" placeholder="Введите название">
        </div>
        <div class="form-group">
        <label for="description">Описание теста</label>
        <textarea rows="3" name="description" class="form-control" placeholder="Введите описание теста"></textarea>
        </div>
        <div class="form-group">
        <label for="objectID">Предмет теста</label>
        <select name="objectID" class="form-control">
        @foreach($objects as $object)
        <option value="{{$object['id']}}">{{$object['name']}}</option>
        @endforeach
        </select>
        </div>
        <div class="form-group qty-div">
        <label for="qty">Количество вопросов</label>
        <input id="qty" name="qty" type="text" class="form-control" placeholder="Введите количество вопросов">
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>
    </form>
</div>
@endsection
@extends('testmodule::app')

@section('content')

<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Создание нового предмета</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('testmoduleCreateObjectSubmit')}}" role="form" method="post">
    <div class="card-body">
        <div class="form-group">
        <label for="name">Название предмета</label>
        <input name="name" type="text" class="form-control" placeholder="Введите название">
        </div>
        <div class="form-group">
        <label for="kurs">Номер курса</label>
        <input name="kurs" type="text" class="form-control" placeholder="Номер курса (цифрой)">
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Создать</button>
    </div>
    </form>
</div>

@endsection
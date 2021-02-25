@extends('testmodule::app')

@section('content')

<div class="card">
    <div class="card-body">
    <h2 class="card-title">{{$test['name']}}</h2>

    <p class="card-text">
        {{$test['description']}}<br>
        Всего вопросов: {{$totalQ}}.
    </p>
    <form method="POST" action="{{route('testmoduleStart', ['id' => $test['id']])}}">
    @csrf
    <input type="submit" class="card-link btn btn-info" value="Начать тест"></button>
    <a href="{{route('testmoduleRemove', ['id' => $test['id']])}}" type="submit" class="card-link btn btn-danger">Удалить тест</a>
    </form>
    </div>

</div>

@endsection
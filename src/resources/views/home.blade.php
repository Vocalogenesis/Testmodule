@extends('testmodule::app')

@section('content')

@if(Route::is('testmoduleIndex'))
<div class="jumbotron">
    <h1>TestModule</h1>
    <h3>Модуль для тестирования</h3>
</div>
@endif
@if(!Route::is('testmoduleSorted'))
@foreach($tests as $test)
<div class="card">
    <div class="card-body">
    <h5 class="card-title">{{$test['name']}}</h5>

    <p class="card-text">
        {{$test['description']}}
    </p>

    <a href="{{route('testmodulePreview', ['id' => $test['id']])}}" class="card-link">Подробнее</a>
    </div>
</div>
@endforeach
@endif
@if(Route::is('testmoduleSorted'))
<div class="jumbotron">
    <h1>{{$object[0]['name']}}</h1>
    <h3>Предмет {{$object[0]['kurs']}}-ого курса</h3>
</div>
    <a href="{{route('testmoduleRemoveObj', ['id' => $object[0]['id']])}}" type="submit" class="card-link btn btn-danger mb-4">Удалить предмет</a>
@foreach($testsSort as $test)
<div class="card">
    <div class="card-body">
    <h5 class="card-title">{{$test['name']}}</h5>

    <p class="card-text">
        {{$test['description']}}
    </p>

    <a href="{{route('testmodulePreview', ['id' => $test['id']])}}" class="card-link">Подробнее</a>
    </div>
</div>
@endforeach
@endif
@endsection
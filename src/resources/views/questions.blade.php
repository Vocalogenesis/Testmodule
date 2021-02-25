@extends('testmodule::app')

@section('content')

<form action="" method="post" role="form">
@csrf
@foreach($questions as $qkey => $question)
<div class="card">
    <div class="card-header">
    <h3 class="card-title">{{$qkey + 1}} вопрос</h3>
    </div>
    <div class="card-body">
    <p class="card-text">{{$question['name']}}</p>
        <div class="form-group">
            <p class="card-text">Ответ:</p>
            <select name="useranswers[{{$question['id']}}]" class="form-control">
                @foreach($question['answers'] as $akey => $answer)
                <option value="{{$akey}}">{{$answer}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@endforeach
<button class="btn btn-success my-4" type="submit">Завершить тест</button>
</form>
@endsection
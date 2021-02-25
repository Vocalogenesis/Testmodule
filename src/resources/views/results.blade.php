@extends('testmodule::app')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="text">

      <h3 class="card-title">{{$test[0]['name']}}</h3><br>
      <h5 class="card-subtitle text-muted my-0">{{$test[0]['description']}}</h5>
    </div>
<div class="info-box bg-blue my-2">
  <span class="info-box-icon"><i class="fas fa-comments"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Ответы</span>
    <span class="info-box-number">{{count($useranswers)}} из {{$countq}}</span>
    <!-- The progress section is optional -->
    <div class="progress">
      <div class="progress-bar" style="width: {{( intval(count($useranswers)) / intval($countq) ) * 100}}%"></div>
    </div>
  </div>
  <!-- /.info-box-content -->
</div>
<div class="info-box bg-green">
  <span class="info-box-icon"><i class="fas fa-check"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Оценка</span>
    <span class="info-box-number">{{$rightanswer}} из {{$countq}} ({{( intval($rightanswer) / intval($countq) ) * 100}}%)</span>
    <!-- The progress section is optional -->
    <div class="progress">
      <div class="progress-bar" style="width: {{( intval($rightanswer) / intval($countq) ) * 100}}%"></div>
    </div>
  </div>
  <!-- /.info-box-content -->
</div>
  </div>
</div>
@endsection
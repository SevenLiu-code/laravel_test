@extends('common/layouts')

@section('content')
  @include('common/validate')
  <div class="panel panel-default">
        <div class="panel-heading">修改学生</div>
        <div class="panel-body">
            @include('student._from')
        </div>
  </div>
@stop

@extends('layouts')
@section('header')
  @parent
  header
  <p><a href="{{url('url')}}">url()</a></p>
  <p><a href="{{action('StudentController@urlTest')}}">action()</a></p>
  <p><a href="{{route('url')}}">route()</a></p>
@stop
@section('sidebar')
  @parent
  sidebar
  <!--流程控制-->
  @if ($name == 'liubin')
      <p>I'm liubin</p>
  @else
      <p>who am I?</p>
  @endif
  @if (in_array($name, $arr))
    <p>true</p>
  @else
    <p>false</p>
  @endif
@stop
@section('content')
  我是一块内容
  <!--1.模板中输出PHP变量-->
  <p>{{$name}}</p>
  <!--2.模板中调用PHP变量-->
  <p>{{time()}}</p>
  <!--3.原样输出-->
  <p>@{{$name}}</p>
  {{--4.模板中的注释，在代码中看不到--}}
  <!--5.引入子视图 include-->
  @include('student.common',['message'=>'我是子模板'])
@stop

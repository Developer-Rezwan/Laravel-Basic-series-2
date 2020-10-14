@extends('me.layout.app')
@section('Title','My about page')

@section('sidebar')
   @parent 
  <h2>Left sitebar</h2>
@stop

@section('content')
<h2>I am from about section</h2>
@stop
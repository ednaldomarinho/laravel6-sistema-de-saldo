@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Welcome!!!</h1>
@stop

@section('content')
    <h3><strong>{{$name}}</strong> , you are logged in!</h3>
@stop

@extends('adminlte::page')

@section('title', 'Novo Saque')

@section('content_header')
    <h1>Efetuar Saque</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Sacar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Efetuar Saque</h3>
        </div>
        <div class="box-body">

            @include('admin.includes.alerts')

            <form action="{{route('withdrawn.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor Saque" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sacar</button>
                </div>
            </form>
            
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Novo Depósito')

@section('content_header')
    <h1>Fazer depósito</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Depósito</h3>
        </div>
        <div class="box-body">

            @include('admin.includes.alerts')

            <form action="{{route('deposit.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor Depósito" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Depositar</button>
                </div>
            </form>
            
        </div>
    </div>
@stop

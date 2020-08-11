@extends('adminlte::page')

@section('title', 'Transferência')

@section('content_header')
    <h1>Efetuar Transferência</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Sacar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h4>{{$name}}, favor informar o destino</h4>
        </div>
        <div class="box-body">

            @include('admin.includes.alerts')

            <form action="{{route('confirm.transfer')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="sender" placeholder="Informação do destino" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            </form>
            
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Histórico')

@section('content_header')
    <h1>Saldo</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Histórico</a></li>
    </ol>
@stop

@section('content')
<h4>{{$name}}</h4>
  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Destino</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($historics as $historic)                    
                    <tr>
                        <td>{{$historic->id}}</td>
                        <td>{{number_format($historic->amount, 2, ',', '')}}</td>
                        @switch($historic->type)
                            @case('O')
                            <td>Saque</td>
                            <td>--</td> 
                                @break
                            @case('I')
                            <td>Depósito</td> 
                            <td>--</td>  
                                @break
                            @case('T')
                            <td>Transferência</td>  
                            <td>{{$historic->user_id_transaction}}</td> 
                                @break
                            @default                                
                        @endswitch
                        
                        
                    </tr>  
                @empty                  
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
  </div>
@stop

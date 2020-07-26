@extends('layouts.app')

@section('contenido')
	<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-5">
                <a href="{{route ('create_partidas')}}" class="btn btn-outline-primary rounded-pill float-left">Registro Nueva Partida</a>
            </div>
            <div class="col-md-6">
                <h3 class="card-title">Unidades Medidas</h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Numero Partida</th>
                        <th>Creacion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($partidas as $partida)
                            <tr>
                            	<td>{{$partida->COD_PARTIDA}}</td>
                             	<td>{{$partida->NOM_PARTIDA}}</td>
                              	<td>{{$partida->NRO_PARTIDA}}</td>
                                <td>{{$partida->created_at}}</td>
                                <td>{{$partida->VALOR}}</td>
                                <td>
                                   <a href="#" class="btn btn-outline-success rounded-pill">Editar</a>
                                    <a href="#" class="btn btn-outline-danger rounded-pill" onclick="eliminar(event);">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table> 
        </div>
    </div>
</div>

@endsection
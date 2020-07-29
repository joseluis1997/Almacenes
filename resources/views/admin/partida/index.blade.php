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
                <h3 class="card-title">Lista de Partidas</h3> 
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
                                <td>
                                    <form action="{{route('destroy_partida', $partida->COD_PARTIDA)}}" onsubmit="submitForm(event, {{$partida->VALOR}}, this)" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        @if($partida->VALOR)
                                          <button type="submit" class="btn-sm btn btn-outline-danger w-100">
                                            Deshabilitar
                                          </button>
                                        @else
                                          <button type="submit" class="btn-sm btn btn-outline-primary w-100">
                                            Habilitar
                                          </button>

                                        @endif
                                    </form>
                                </td> 
                                <td>
                                   <a href="{{ route ('edit_partidas', $partida->COD_PARTIDA)}}" class="btn btn-outline-success rounded-pill">Editar</a>
                                    <a href="{{ route ('destroy_partidas', $partida->COD_PARTIDA)}}" class="btn btn-outline-danger rounded-pill" onclick="eliminar(event);">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table> 
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
   function eliminar(event) {
  
    var r = confirm("Acepta elminar la Partida Seleccionada?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection
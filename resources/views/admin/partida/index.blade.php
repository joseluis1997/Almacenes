@extends('layouts.app')

@section('contenido')
	<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title"><b>Gestionar Partidas</b></h3> 
                </div>
                <div class="col-md-2">
                <a href="{{route ('create_partidas')}}" class="btn btn-primary"><b>Nueva Partida</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Numero Partida</th>
                        <th>Creacion</th>
                        <th>Estado</th>
                        <th>Ver Partida</th>
                        <th>Modificar Partida</th>
                        <th>Desabilitar Partida</th>
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
                                    @if($partida->VALOR)
                                        <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                    @else
                                         <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('show_partida',$partida->COD_PARTIDA)}}" class="fas fa-eye fa-2x"></a>
                                </td>
                                <td>
                                   <a href="{{ route ('edit_partidas', $partida->COD_PARTIDA)}}" class="fas fa-edit fa-2x"></a>
                                </td>
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
                                {{-- <td>
                                    <a href="{{ route ('destroy_partidas', $partida->COD_PARTIDA)}}" class="fas fa-trash-alt fa-2x" style="color:red;" onclick="eliminar(event);"></a>
                                </td> --}}
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

    function submitForm(event, estado,form) { 
        event.preventDefault();
        var r = null;
        if(estado == 1){
          r = confirm("Acepta Desabilitar la partida Seleccionada");
        }else{
          r = confirm("Acepta habilitar la partida Seleccionada");
        }
        if (r == true) {
          form.submit();
        }
    }


   function eliminar(event) {
    var r = confirm("Acepta elminar la Partida Seleccionada?");
    if (r == true) {

    } 
    else{
         event.preventDefault();
     }
}
    </script>
@endsection
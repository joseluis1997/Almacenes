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
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-partida-activos-tab" data-toggle="tab" href="#nav-partida-activos" role="tab" aria-controls="nav-partida-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                    <a class="nav-item nav-link" id="nav-partida-bajas-tab" data-toggle="tab" href="#nav-partida-bajas" role="tab" aria-controls="nav-partida-bajas" aria-selected="false">Bajas</a>
                </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table unidades de medidas habilitados --}}
                <div class="tab-pane fade show active" id="nav-partida-activos" role="tabpanel" aria-labelledby=" nav-partida-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Numero Partida</th>
                                <th>Estado</th>
                                <th>Ver</th>
                                <th>Modificar</th>
                                <th>Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partidas as $partida)
                                @if($partida->ESTADO_PARTIDA == 1)
                                    <tr>
                                        <td>{{$partida->COD_PARTIDA}}</td>
                                        <td>{{$partida->NOM_PARTIDA}}</td>
                                        <td>{{$partida->NRO_PARTIDA}}</td>
                                        <td>
                                            @if($partida->ESTADO_PARTIDA)
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
                                            <form action="{{route('destroy_partida', $partida->COD_PARTIDA)}}" onsubmit="submitForm(event, {{$partida->ESTADO_PARTIDA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($partida->ESTADO_PARTIDA)
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
                                @endif
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                {{-- data table unidades de medidas desabilitado --}}
                <div class="tab-pane fade" id="nav-partida-bajas" role="tabpanel" aria-labelledby="nav-partida-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Numero Partida</th>
                                <th>Estado</th>
                                <th>Ver</th>
                                <th>Modificar</th>
                                <th>Habilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partidas as $partida)
                                @if($partida->ESTADO_PARTIDA == 0)
                                    <tr>
                                        <td>{{$partida->COD_PARTIDA}}</td>
                                        <td>{{$partida->NOM_PARTIDA}}</td>
                                        <td>{{$partida->NRO_PARTIDA}}</td>
                                        <td>
                                            @if($partida->ESTADO_PARTIDA)
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
                                            <form action="{{route('destroy_partida', $partida->COD_PARTIDA)}}" onsubmit="submitForm(event, {{$partida->ESTADO_PARTIDA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($partida->ESTADO_PARTIDA)
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
                                @endif
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataAltas').dataTable( {
            "scrollCollapse":true,
            "language": {
                "url": "/jsons/Spanish.json"
            },
        });
        $('#dataBajas').dataTable( {
            "scrollCollapse":true,
            "language": {
                "url": "/jsons/Spanish.json"
            },
        });
    } );

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
@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-9">
                <h3 class="card-title"><b>Gestion Unidades de Medidas</b></h3> 
            </div>
            <div class="col-md-2">
                <a href="{{route('create_medidas')}}" class="btn btn-primary rounded-pill float-left"><b>Nuevo Unidad de Medida</b></a>
            </div>
            </div>
        </div>
        <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-medida-activos-tab" data-toggle="tab" href="#nav-medida-activos" role="tab" aria-controls="nav-medida-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-medida-bajas-tab" data-toggle="tab" href="#nav-medida-bajas" role="tab" aria-controls="nav-medida-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table unidades de medidas habilitados --}}
                <div class="tab-pane fade show active" id="nav-medida-activos" role="tabpanel" aria-labelledby=" nav-medida-activos-tab" style="padding-top: 15px;">
                    <table id="dataBajas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Ver Unidad de Medida</th>
                                <th>Modificar Unidad de Medida</th>
                                <th>Desabilitar Unidad de Medida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medidas as $medida)
                                @if($medida->ESTADO_MEDIDA == 1)
                                  <tr>
                                    <td>{{ $medida->COD_MEDIDA  }}</td>
                                    <td>{{ $medida->NOM_MEDIDA  }}</td>
                                    <td>{{ $medida->DESC_MEDIDA }}</td>
                                    <td>
                                        @if($medida->ESTADO_MEDIDA)
                                            <button type="button" class="btn bottA navbar-btn">Activo</button>
                                        @else
                                             <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('show_UnidadaDeMedida',$medida->COD_MEDIDA)}}" class="fas fa-eye fa-2x"></a>
                                    </td>
                                    <td>
                                       <a href="{{route ('edit_medidas',$medida->COD_MEDIDA)}}" class="fas fa-edit fa-2x"></a>
                                    </td>
                                    <td> 
                                        <form action="{{route('destroy_medida', $medida->COD_MEDIDA)}}" onsubmit="submitForm(event, {{$medida->ESTADO_MEDIDA}}, this)" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            @if($medida->ESTADO_MEDIDA)
                                              <button type="submit" class="btn-sm btn btn-outline-danger w-60">
                                                Deshabilitar
                                              </button>
                                            @else
                                              <button type="submit" class="btn-sm btn btn-outline-primary w-60">
                                                Habilitar
                                              </button>

                                            @endif
                                        </form>
                                    </td> 
                                  </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                {{-- data table unidades de medidas desabilitado --}}
                <div class="tab-pane fade" id="nav-medida-bajas" role="tabpanel" aria-labelledby="nav-medida-bajas-tab" style="padding-top: 15px">
                     <table id="dataBajas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Ver Unidad de Medida</th>
                                <th>Modificar Unidad de Medida</th>
                                <th>Desabilitar Unidad de Medida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medidas as $medida)
                                @if($medida->ESTADO_MEDIDA == 0)
                                  <tr>
                                    <td>{{ $medida->COD_MEDIDA  }}</td>
                                    <td>{{ $medida->NOM_MEDIDA  }}</td>
                                    <td>{{ $medida->DESC_MEDIDA }}</td>
                                    <td>
                                        @if($medida->ESTADO_MEDIDA)
                                            <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                        @else
                                             <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('show_UnidadaDeMedida',$medida->COD_MEDIDA)}}" class="fas fa-eye fa-2x"></a>
                                    </td>
                                    <td>
                                       <a href="{{route ('edit_medidas',$medida->COD_MEDIDA)}}" class="fas fa-edit fa-2x"></a>
                                    </td>
                                    <td> 
                                        <form action="{{route('destroy_medida', $medida->COD_MEDIDA)}}" onsubmit="submitForm(event, {{$medida->ESTADO_MEDIDA}}, this)" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            @if($medida->ESTADO_MEDIDA)
                                              <button type="submit" class="btn-sm btn btn-outline-danger w-60">
                                                Deshabilitar
                                              </button>
                                            @else
                                              <button type="submit" class="btn-sm btn btn-outline-primary w-60">
                                                Habilitar
                                              </button>

                                            @endif
                                        </form>
                                    </td> 
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
  
@endsection('contenido')

@section('scripts')

<!-- CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

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
              r = confirm("Acepta Desabilitar la Unidad medida Seleccionada");
            }else{
              r = confirm("Acepta habilitar la Unidad de Medida Seleccionada");
            }
            if (r == true) {
              form.submit();
            }
        }

        function eliminar(event) {
          
            var r = confirm("Acepta elminar la Unidad de Medida Seleccionado?");
            if (r == true) {

            } 
            else {
                 event.preventDefault();
             }
        }
    </script>
@endsection
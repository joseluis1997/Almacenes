@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestion Areas</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_areas')}}" class="btn btn-primary rounded-pill float-right"><b>Nueva Area</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-user-activos-tab" data-toggle="tab" href="#nav-user-activos" role="tab" aria-controls="nav-user-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-user-bajas-tab" data-toggle="tab" href="#nav-user-bajas" role="tab" aria-controls="nav-user-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-user-activos" role="tabpanel" aria-labelledby="nav-user-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Padre</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Modificar</th>
                            <th>Deshabilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $area)
                            @if($area->ESTADO_AREA == 1)
                            <tr>
                                <td>{{ $area->COD_AREA }}</td>
                                <td>{{ $area->NOM_AREA }}</td>
                                <td>{{ $area->AREA_PADRE }}</td>
                                <td>
                                    @if($area->ESTADO_AREA)
                                        <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                    @else
                                         <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('show_areas',$area->COD_AREA)}}" class="fas fa-eye fa-2x"></a>
                                    </td>
                                <td>
                                    @can('Modificar_areas')
                                    <a href="{{route ('edit_areas',$area->COD_AREA)}}" class="fas fa-edit fa-2x"></a>
                                    @endcan
                                </td>
                                <td> 
                                    <form action="{{route('destroy_areas', $area->COD_AREA)}}" onsubmit="submitForm(event, {{$area->ESTADO_AREA}}, this)" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        @if($area->ESTADO_AREA)
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
              <div class="tab-pane fade" id="nav-user-bajas" role="tabpanel" aria-labelledby="nav-user-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Modificar</th>
                            <th>Habilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $area)
                            @if($area->ESTADO_AREA == 0)
                            <tr>
                                <td>{{ $area->NUM_AREA}}</td>
                                <td>{{ $area->NOM_AREA}}</td>
                                <td>{{ $area->DESC_AREA}}</td>
                                 <td>
                                        @if($area->ESTADO_AREA)
                                            <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                        @else
                                             <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                        @endif
                                </td>
                                <td>
                                    <a href="{{route('show_areas',$area->COD_AREA)}}" class="fas fa-eye fa-2x"></a>
                                    </td>
                                <td>
                                    @can('Modificar_areas')
                                    <a href="{{route ('edit_areas',$area->COD_AREA)}}" class="fas fa-edit fa-2x"></a>
                                    @endcan
                                </td>
                                <td> 
                                    <form action="{{route('destroy_areas', $area->COD_AREA)}}" onsubmit="submitForm(event, {{$area->ESTADO_AREA}}, this)" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        @if($area->ESTADO_AREA)
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
              r = confirm("Acepta Desabilitar el Area Seleccionado");
            }else{
              r = confirm("Acepta habilitar el Area Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

        // function eliminar(event) {
      
        // var r = confirm("Acepta elminar el Area Seleccionado?");
        // if (r == true) {

        // } 
        // else {
        //      event.preventDefault();
        //  }
        // }
    </script>
@endsection

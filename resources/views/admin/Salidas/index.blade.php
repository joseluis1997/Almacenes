@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestionar Salidas</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_salidas')}}" class="btn btn-primary rounded-pill float-right"><b>Nueva Salida</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">   
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-salida-activos-tab" data-toggle="tab" href="#nav-salida-activos" role="tab" aria-controls="nav-salida-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-salida-bajas-tab" data-toggle="tab" href="#nav-salida-bajas" role="tab" aria-controls="nav-salida-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav>  
            <div class="tab-content" id="nav-tabContent">
                {{-- data table salida habilitados --}}
                <div class="tab-pane fade show active" id="nav-salida-activos" role="tabpanel" aria-labelledby=" nav-salida-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th># Salida</th>
                                <th># Pedido</th>
                                <th>Fecha</th>
                                <th>Area Solicitante</th>
                                <th>Estado</th>
                                <th>Imprimir Salida</th>
                                <th>Deshabilitar Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Salidas as $salida)
                                @if($salida->ESTADO_SALIDA==1)
                                    <tr>
                                        <td>{{ $salida->COD_SALIDA }}</td>
                                        <td>{{ $salida->COD_PEDIDO }}</td>
                                        <td>{{ $salida->FECHA }}</td>
                                        <td>{{ $salida->area->NOM_AREA }}</td>
                                        <td>{{ $salida->ESTADO_SALIDA }}</td>
                                        <td>@can ('eliminar_usuarios')
                                            <a href="#" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                {{-- data table salida desabilitado --}}
                <div class="tab-pane fade" id="nav-salida-bajas" role="tabpanel" aria-labelledby="nav-salida-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Numero Salida</th>
                                <th>Numero Pedido</th>
                                <th>Fecha Salida</th>
                                <th>Estado</th>
                                <th>Area Solicitante</th>
                                <th>Imprimir Salida</th>
                                <th>Eliminar Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach()
                                @if() --}}
                                    <tr>
                                        <td>abs</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>@can ('eliminar_usuarios')
                                            <a href="#" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                            @endcan
                                        </td>
                                    </tr>
                           {{--      @endif
                            @endforeach --}}
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
        });

        function submitForm(event, estado,form) { 
            event.preventDefault();
            var r = null;
            if(estado == 1){
              r = confirm("Acepta Desabilitar el pedido Seleccionado");
            }else{
              r = confirm("Acepta habilitar el pedido Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

        function eliminar(event) {
          
            var r = confirm("Acepta elminar la Salida Seleccionada?");
            if (r == true) {

            } 
            else {
                 event.preventDefault();
             }
        }
    </script>
@endsection

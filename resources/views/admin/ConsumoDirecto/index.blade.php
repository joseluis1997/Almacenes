@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestionar Consumo Directos</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_consumodirecto')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Consumo Directo</b></a><br/><br/>
                     <a href="{{route('create_consumodirecto')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Consumo Directo Automatico</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-consumoD-activos-tab" data-toggle="tab" href="#nav-consumoD-activos" role="tab" aria-controls="nav-consumoD-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-consumoD-bajas-tab" data-toggle="tab" href="#nav-consumoD-bajas" role="tab" aria-controls="nav-consumoD-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table unidades de medidas habilitados --}}
                <div class="tab-pane fade show active" id="nav-consumoD-activos" role="tabpanel" aria-labelledby=" nav-consumoD-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>fecha</th>
                            <th>Numero Preventivo</th>
                            <th>Numero Orden Compra</th>
                            <th>Unidad Solicitante</th>
                            <th>Imprimir</th>
                            <th>Modificar Consumo D.</th>
                            <th>Eliminar Consumo D.</th>
                        </tr>
                        </thead>
                        <tbody>
                           {{--  @foreach($ as $)
                                @if($->) --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="#" class="fas fa-print fa-2x"></a>
                                        </td>
                                        <td>
                                            @can('modificar_usuarios')
                                            <a href="{{ route ('edit_consumodirecto')}}" class="fas fa-edit fa-2x"></a>
                                            @endcan
                                        </td>
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
                    {{-- data table unidades de medidas desabilitado --}}
                <div class="tab-pane fade" id="nav-consumoD-bajas" role="tabpanel" aria-labelledby="nav-consumoD-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>fecha</th>
                            <th>Numero Preventivo</th>
                            <th>Numero Orden Compra</th>
                            <th>Unidad Solicitante</th>
                            <th>Imprimir</th>
                            <th>Modificar Consumo D.</th>
                            <th>Eliminar Consumo D.</th>
                        </tr>
                        </thead>
                        <tbody>
                           {{--  @foreach($ as $)
                                @if($->) --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="#" class="fas fa-print fa-2x"></a>
                                        </td>
                                        <td>
                                            @can('modificar_usuarios')
                                            <a href="{{ route ('edit_consumodirecto')}}" class="fas fa-edit fa-2x"></a>
                                            @endcan
                                        </td>
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
              r = confirm("Acepta Desabilitar el Consumo Directo Seleccionado");
            }else{
              r = confirm("Acepta habilitar el Consumo Directo Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

        function eliminar(event) {
          
           var r = confirm("Acepta elminar el Consumo Directo Seleccionado?");
           if (r == true) {
           } 
           
           else {
                 event.preventDefault();
           }
        }
    </script>
@endsection

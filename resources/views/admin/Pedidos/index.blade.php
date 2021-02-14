@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-le"><b>Gestionar Pedidos</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_pedidos')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Pedido</b></a>
                </div>
            </div>
        </div>
        <div class="card-body"> 
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-pedido-activos-tab" data-toggle="tab" href="#nav-pedido-activos" role="tab" aria-controls="nav-pedido-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-pedido-bajas-tab" data-toggle="tab" href="#nav-pedido-bajas" role="tab" aria-controls="nav-pedido-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table pedidos habilitados --}}
                <div class="tab-pane fade show active" id="nav-pedido-activos" role="tabpanel" aria-labelledby=" nav-pedido-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Area Solicitante</th>
                                <th>Fecha Registro</th>
                                <th>Estado</th>
                                <th>Imprimir Pedido</th>
                                <th>Deshabilitar Pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach()
                                @if() --}}
                                    <tr>
                                        <td>gg</td>
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
                {{-- data table pedidos desabilitado --}}
                <div class="tab-pane fade" id="nav-pedido-bajas" role="tabpanel" aria-labelledby="nav-pedido-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Area Solicitante</th>
                                <th>Fecha Registro</th>
                                <th>Estado</th>
                                <th>Imprimir Pedido</th>
                                <th>Eliminar Area</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach()
                                @if() --}}
                                    <tr>
                                        <td>jj</td>
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
            var r = confirm("Acepta elminar el pedido Seleccionado?");
            if (r == true) {

            } 
            else {
                 event.preventDefault();
             }
        }
    </script>
@endsection

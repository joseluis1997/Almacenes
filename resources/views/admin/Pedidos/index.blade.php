@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-le"><b>Gestion Pedidos</b></h3>
                </div>
                <div class="col-md-5">
                    @can('Crear_pedidos')
                    <a href="{{route('create_pedidos')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Pedido</b></a>
                    @endcan
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
                                <th>Area Solicitante</th>
                                <th>Fecha Registro</th>
                                <th>Condicion</th>
                                <th>Estado</th>
                                <th>Ver Detalle</th>
                                <th>Modificar</th>
                                <th>Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                @if($pedido->ESTADO_PEDIDO == 1)
                                    <tr>
                                        <td>{{ $pedido->Area->NOM_AREA }}</td>
                                        <td>{{date('d-m-Y', strtotime($pedido->FECHA))}}</td>
                                        @if($pedido->VALIDADO == 1)
                                            <td><span class="badge badge-success">Entregado</span></td>
                                        @else
                                            <td><span class="badge badge-info">Pendiente</span></td>
                                        @endif
                                        <td>
                                            @if($pedido->ESTADO_PEDIDO)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                        <td>
                                            @can('VerDetalle_pedidos')
                                            <a href="{{route('show_pedidos',$pedido->COD_PEDIDO)}}" ><button class="btn btn-primary">Detalles</button></a>
                                            @endcan
                                        </td>
                                        <td>
                                            @if($pedido->VALIDADO == 0)
                                                @can('Modificar_pedidos')
                                                    <a href="{{route ('edit_pedidos',$pedido->COD_PEDIDO)}}" class="fas fa-edit fa-2x"></a>
                                                @endcan
                                            @else
                                                @can('Modificar_pedidos')
                                                    <a href="{{route ('edit_pedidos',$pedido->COD_PEDIDO)}}" class="fas fa-edit fa-2x disabled" ></a>
                                                @endcan
                                            @endif
                                        </td>
                                        <td>
                                        @can('Deshabilitar_pedidos')
                                            <form action="{{ route('destroy_pedidos', $pedido->COD_PEDIDO) }}" onsubmit="submitForm(event, {{ $pedido->ESTADO_PEDIDO }}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                    <button type="submit" class="btn-sm btn btn-outline-danger w-60">
                                                    Deshabilitar
                                                    </button>
                                            </form>
                                        @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- data table pedidos desabilitado --}}
                <div class="tab-pane fade" id="nav-pedido-bajas" role="tabpanel" aria-labelledby="nav-pedido-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Area Solicitante</th>
                                <th>Fecha Registro</th>
                                <th>Condicion</th>
                                <th>Estado</th>
                                <th>Ver Detalle</th>
                                <th>Modificar</th>
                                <th>Habilitar</th>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach($pedidos as $pedido)
                                @if($pedido->ESTADO_PEDIDO == 0)
                                    <tr>
                                        {{-- <td>{{ $pedido->COD_PEDIDO  }}</td> --}}
                                        <td>{{ $pedido->Area->NOM_AREA }}</td>
                                        <td>{{date('d-m-Y', strtotime($pedido->FECHA))}}</td>
                                        @if($pedido->VALIDADO == 1)
                                            <td><span class="badge badge-success">Entregado</span></td>

                                        @else
                                            <td><span class="badge badge-info">Pendiente</span></td>
                                        @endif
                                        <td>
                                           {{--  @if($pedido->ESTADO_PEDIDO)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else --}}
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            {{-- @endif --}}
                                        </td>
                                        <td>
                                            @can('VerDetalle_pedidos')
                                            <a href="{{route('show_pedidos',$pedido->COD_PEDIDO)}}" ><button class="btn btn-primary">Detalles</button></a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('Modificar_pedidos')
                                                @if($pedido->VALIDADO == 0)
                                                    <a href="{{route ('edit_pedidos',$pedido->COD_PEDIDO)}}" class="fas fa-edit fa-2x"></a>
                                                @endcan
                                                @else
                                                    @can('Modificar_pedidos')
                                                    <a href="{{route ('edit_pedidos',$pedido->COD_PEDIDO)}}" class="fas fa-edit fa-2x disabled" ></a>
                                                @endif
                                            @endcan
                                        </td>
                                        <td>
                                        @can('Habilitar_pedidos')
                                            <form action="{{ route('destroy_pedidos', $pedido->COD_PEDIDO) }}" onsubmit="submitForm(event, {{ $pedido->ESTADO_PEDIDO }}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                    <button type="submit" class="btn-sm btn btn-outline-primary w-60">
                                                    Habilitar
                                                    </button>
                                            </form>
                                        @endcan
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
        });

        function submitForm(event, estado,form){
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
    </script>
@endsection

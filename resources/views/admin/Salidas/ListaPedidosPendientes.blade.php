@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="card-le"><b>Pedidos Pendiente</b></h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
                {{-- data table pedidos habilitados --}}
                <div class="tab-pane fade show active" id="nav-salidas-activos" role="tabpanel" aria-labelledby="nav-salidas-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Area Solicitante</th>
                                <th>Fecha Registro</th>
                                <th>Condicion</th>
                                <th>Validar Pedido</th>
                                <th>Ver Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                @if($pedido->ESTADO_PEDIDO == 1)
                                    @if($pedido->VALIDADO == 0)
                                       <tr>
                                        <td>{{$pedido->COD_PEDIDO}}</td>
                                        <td>{{$pedido->Area->NOM_AREA}}</td>
                                        <td>{{ $pedido->FECHA }}</td>
                                        {{-- @if($pedido->VALIDADO == 1) --}}
                                            {{-- <td><span class="badge badge-success">Entregado</span></td> --}}
                                        {{-- @else --}}
                                            <td><span class="badge badge-info">Pendiente</span></td>
                                        {{-- @endif --}}
                                        <td>
                                        @can('Validar_Salida_Pedido')
                                            <a href="{{ route('Validar_Pedido',$pedido->COD_PEDIDO) }}" ><button class="btn btn-success">Validar Pedido</button></a>
                                        @endcan
                                        </td>
                                        <td>
                                        @can('VerDetalle_pedidos_Pendientes')
                                            <a href="{{route('mostrar_pedidosPendientes',$pedido->COD_PEDIDO)}}" ><button class="btn btn-primary">Ver Detalles</button></a>
                                        @endcan
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br>
   <!-- Grupo: Volver atras-->
    <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_salidas')}}" class="btn formulario__btn2">Volver Atras</a>
    </div>

@endsection('contenido')

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function(){

            $('#dataAltas').dataTable({
                "scrollCollapse":true,
                "language": {
                    "url": "/jsons/Spanish.json"
                },
            });

        });
    </script>
@endsection

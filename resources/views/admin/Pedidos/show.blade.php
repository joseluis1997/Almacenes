@extends("layouts.app")

@section('contenido')
    <div class="title">
        <h1 align="center"><b>Detalle Del Pedido</b></h1>
    </div>
    <div class="row">
        <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
            	<b>Estado del Pedido a Validar su Salida</b><br>
            	@if($pedido->VALIDADO == 0)
            		<span class="badge badge-warning">Pedido Pendiente</span>
            	@else
            		<span class="badge badge-success">Pedido Atendido</span>
            	@endif
            </div>
        </div>
        <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Area Solicitante</b></label>
                <p>{{ $pedido->Area->NOM_AREA}}</p>
            </div>
        </div>
       <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Estado Pedido</b></label><br>
            	@if($pedido->ESTADO_PEDIDO == 1)
            		<span class="badge badge-success">Pedido Habilitado</span>
            	@else
            		<span class="badge badge-danger">Pedido Deshabilitado</span>
            	@endif
            </div>
        </div>
         <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Fecha Registro</b></label>
                <p>{{date('d-m-Y', strtotime($pedido->FECHA))}}</p>
            </div>
        </div>
        <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Detalle Pedido</b></label>
                <p>{{ $pedido->DETALLE_PEDIDO}}</p>
            </div>
        </div>
        {{-- Grupo:Tabla --}}
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color: #A9D0F5">
                    <th>Articulo</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach($detallesPedido as $detalle)
                        <tr>
                            <td>{{ $detalle->NOM_ARTICULO}}</td>
                            <td>{{ $detalle->CANTIDAD }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="formulario__grupo formulario__btn-guardar text-center" style="margin-left: 500px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{route('list_pedidos')}}" class="btn formulario__btn2" style="width:200px;">Volver Atras</a>
        </div>
    </div>
@endsection

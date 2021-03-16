@php
    $total =  0;
@endphp

@extends("layouts.app")

@section('contenido')
    <div class="title">
        <h1 align="center"><b>Detalle Compra Stock Almacen</b></h1>
    </div>
    <div class="row">
        <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="preveedor">Proveedor</label>
                {{-- <p>{{ $comprita }}</p> --}}
            </div>
        </div>

        <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Area Solicitante</b></label>
                <p>{{ $comprita->Area->NOM_AREA}}</p>
            </div>
        </div>
         <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Numero de Compra</b></label>
                <p>{{ $comprita->NRO_ORD_COMPRA}}</p>
            </div>
        </div>
       <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Numero de Compra</b></label>
                <p>{{ $comprita->NRO_PREVENTIVO}}</p>
            </div>
        </div>
         <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Fecha Compra</b></label>
                <p>{{ $comprita->FECHA}}</p>
            </div>
        </div>
        <div class=" col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Comprobante de  Compra</b></label>
                <p>{{ $comprita->FACTURA}}</p>
            </div>
        </div>
         <div class=" col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="preveedor"><b>Detalle Compra</b></label>
                <p>{{ $comprita->DETALLE_COMPRA}}</p>
            </div>
        </div>
        {{-- Grupo:Tabla --}}
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color: #A9D0F5">
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>SubTotal</th>
                </thead>
                <tbody>
                    @foreach($detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->NOM_ARTICULO}}</td>
                            <td>{{ $detalle->CANTIDAD }}</td>
                            <td>{{ $detalle->PRECIO_UNITARIO }}</td>
                            <td>{{ $detalle->CANTIDAD*$detalle->PRECIO_UNITARIO }} Bs</td>
                            @php
                                $total += $detalle->CANTIDAD*$detalle->PRECIO_UNITARIO; 
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th><h4 id="total">{{ $total }} Bs</h4></th>
                </tfoot>
            </table>
        </div>
        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{route('list_almacen')}}" class="btn formulario__btn2">Volver Atras</a>
        </div>
    </div>
@endsection
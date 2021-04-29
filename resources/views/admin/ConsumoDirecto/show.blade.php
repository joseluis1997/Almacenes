@php
    $total =  0;
@endphp
@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Detalle Consumos Directos</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">

                <label class="formulario__label">Area Solicitante:<span class="badge badge-info">{{ $consumoD->area->NOM_AREA }}</span></label>

                <label class="formulario__label">Proveedor:<span class="badge badge-info">{{ $consumoD->proveedor->NOM_PROVEEDOR }}</span></label>

                <label class="formulario__label">Numero Preventivo:<span class="badge badge-info">{{ $consumoD->NRO_PREVENTIVO}}</span></label>

                <label class="formulario__label">Numero de Nota Ingreso:<span class="badge badge-info">{{ $consumoD->NOTA_INGRESO}}</span></label>

                <label class="formulario__label">Fecha Registro:<span class="badge badge-info">{{date('d-m-Y', strtotime($consumoD->FECHA))}}</span></label>

                @if($consumoD->ESTADO_COMPRA)
                    <label class="formulario__label">Estado Consumo:<span class="badge badge-success">Habilitado</span></label>
                @else
                    <label class="formulario__label">Estado Consumo:<span class="badge badge-danger">Deshabilitado</span></label>
                @endif

                <label class="formulario__label">Detalle Consumo Directo:</label>
                    <textarea class="form-control formulario__input" rows="2">{{ $consumoD->DETALLE_CONSUMO}}</textarea>
        </div>
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color: #A9D0F5">
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>SubTotal</th>
                </thead>
                <tbody>
                    @foreach($detalleConsumoD as $detalle)
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

        <div class="formulario__grupo formulario__btn-guardar text-center">
            <a href="{{ route('list_consumodirecto') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection
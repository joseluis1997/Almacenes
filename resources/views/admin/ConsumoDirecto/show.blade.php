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
                <div class="form-group">
                    <b>Area Solicitante</b><br>
                        <p class="badge badge-light">{{ $consumoD->area->NOM_AREA }}</p>
                </div>
                <div class="form-group">
                    <b>Proveedor:</b><br>
                        <p class="badge badge-light">{{ $consumoD->proveedor->NOM_PROVEEDOR }}</p>
                </div>
                <div class="form-group">
                   
                </div>
                <div class="form-group">
                    <b>Numero Preventivo</b><br>
                        <p class="badge badge-light">{{ $consumoD->NRO_PREVENTIVO}}</p>
                </div>
                <div class="form-group">
                    <b>Numero de Nota Ingreso</b><br>
                        <p class="badge badge-light">{{ $consumoD->NOTA_INGRESO}}</p>
                </div>
                <div class="form-group">
                    <b>Fecha Registro</b><br>
                        <p class="badge badge-light">{{ $consumoD->FECHA}}</p>
                </div>
                <div class="form-group">
                    <b>Detalle Consumo Directo</b><br>
                        <p class="badge badge-light">{{ $consumoD->DETALLE_CONSUMO}}</p>
                </div>
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
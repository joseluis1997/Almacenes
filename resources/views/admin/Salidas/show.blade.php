@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Detalle Salida</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
                <div class="form-group">
                    <b>Estado Salida</b><br>
                    @if($salida->ESTADO_SALIDA == 1)
                        <span class="badge badge-success">Entregado</span>
                    @elseif($salida->ESTADO_SALIDA == 0)
                        <span class="badge badge-success">Pedido Atendido</span>
                    @endif
                </div>
                <div class="form-group">
                    <b>Area Solicitante</b><br>
                        <p class="badge badge-light">{{ $salida->area->NOM_AREA }}</p>
                </div>
                <div class="form-group">
                    <b>Fecha</b><br>
                        <p class="badge badge-light">{{date('d-m-Y', strtotime($salida->FECHA))}}</p>
                </div>
                <div class="form-group">
                    <b>Detalle Salida</b><br>
                        <p class="badge badge-light">{{ $salida->DETALLE_SALIDA}}</p>
                </div>
        </div>
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color: #A9D0F5">
                    <th>Articulo</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach($detalleSalida as $detalle)
                        <tr>
                            <td>{{ $detalle->NOM_ARTICULO}}</td>
                            <td>{{ $detalle->CANTIDAD }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_salidas') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection
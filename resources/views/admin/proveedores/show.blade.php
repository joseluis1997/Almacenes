@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Ver Proveedor</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="panel-body">
                <strong>codigo Proveedor:</strong>                                       
                    <span class="badge badge-info">{{ $show_proveedor->COD_PROVEEDOR }}</span><br>
                <strong>Nit Proveedor:</strong> 
                    <span class="badge badge-info">{{ $show_proveedor->NIT }}</span><br>
                <strong>Nombre Proveedor:</strong> 
                    <span class="badge badge-info">{{ $show_proveedor->NOM_PROVEEDOR }}</span><br>
                <strong>Telefono Proveedor:</strong> 
                    <span class="badge badge-info">{{ $show_proveedor->TELEF_PROVEEDOR }}</span><br>
                <strong>Estado Proveedor:</strong>
                    <span class="badge badge-info">{{ $show_proveedor->ESTADO_PROVEEDOR }}</span><br>
            </div><br>
        </div>

        <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_proveedores') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection
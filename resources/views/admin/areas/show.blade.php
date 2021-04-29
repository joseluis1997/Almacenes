@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Ver Area</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="panel-body">

                <label class="formulario__label">codigo Area:<span class="badge badge-info">{{ $show->COD_AREA }}</span></label>
                <label class="formulario__label">Nombre area:<span class="badge badge-info">{{ $show->NOM_AREA }}</span></label>
                <label class="formulario__label">Area Padre:<span class="badge badge-info">{{ $show->AREA_PADRE }}</span></label>
                @if($show->ESTADO_AREA)
                        <label class="formulario__label">Estado Area:<span class="badge badge-success">Habilitado</span></label>
                @else
                        <label class="formulario__label">Estado Area:<span class="badge badge-danger">Deshabilitado</span></label>
                @endif
                <label class="formulario__label">Ubicacion area:<span class="badge badge-info">{{ $show->UBICACION_AREA }}</span></label>
                <label class="formulario__label">hora y fecha de creacion:<span class="badge badge-info">{{ $show->created_at }}</span></label>
                <label class="formulario__label">Descripcion:</label>
                    <textarea class="form-control formulario__input" rows="5">{{ $show->DESC_AREA }}</textarea>
            </div><br>
        </div>
        <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_areas') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection
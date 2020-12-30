@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Ver Area</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="panel-body">
                <strong>codigo Area:</strong>                                       
                    <span class="badge badge-info">{{ $show->COD_AREA }}</span><br>
                <strong>Nombre area:</strong> 
                    <span class="badge badge-info">{{ $show->NOM_AREA }}</span><br>
                <strong>Area Padre:</strong> 
                    <span class="badge badge-info">{{ $show->NOM_AREA }}</span><br>
                <strong>Ubicacion area:</strong> 
                    <span class="badge badge-info">{{ $show->UBICACION_AREA }}</span><br>
                <strong>Descripcion:</strong> 
                    <span class="badge badge-info">{{ $show->DESC_AREA }}</span><br>
                <strong>Estado Area:</strong>
                    <span class="badge badge-info">{{ $show->ESTADO_AREA }}</span><br>
                <strong>hora y fecha de creacion:</strong> 
                    <span class="badge badge-info">{{ $show->created_at }}</span><br>
                <strong>hora y fecha de Modifacion:</strong> 
                    <span class="badge badge-info">{{ $show->updated_at }}</span><br>
            </div><br>
        </div>

        <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_areas') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection
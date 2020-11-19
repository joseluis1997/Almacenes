@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Datos del Area</b></h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form id="form-general" class="formulario">
                <!-- Grupo: Identificador de Area -->
                <div class="formulario__grupo" id="grupo__identificador">
                    <label for="identificador" class="formulario__label">Numero de Identificador de Area</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" id="identificador" value="{{$area->NUM_AREA}}" disabled="disabled">
                    </div>
                </div>

                <!-- Grupo: Nombre de Area -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre de Area</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" id="nombre" value="{{$area->NOM_AREA}}">
                    </div>
                </div>
            
                <!-- Grupo: Descripcion -->
                <div class="formulario__grupo" id="grupo__descripcion">
                    <label for="descripcion" class="formulario__label">Descripcion de Area</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" id="descripcion" value="{{$area->DESC_AREA}}" disabled="disabled">
                    </div>
                </div>

                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_areas')}}" class="btn formulario__btn2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
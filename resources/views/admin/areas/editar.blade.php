@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Modificar Area</b></h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form action="{{route('update_areas', ['area' => $area->COD_AREA])}}" id="form-general" class="formulario" method="POST" >
                @csrf @method("put")
                <!-- Grupo: Identificador de Area -->
                <div class="formulario__grupo" id="grupo__identificador">
                    <label for="identificador" class="formulario__label">Numero de Identificador de Area</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="NUM_AREA" id="identificador" value="{{$area->NUM_AREA}}" placeholder="numero de Identificador de Area">
                        <i class="formulario__validacion-estado far fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">
                        El area tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                    </p>
                </div>

                <!-- Grupo: Nombre de Area -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre de Area</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="NOM_AREA" id="nombre" value="{{$area->NOM_AREA}}" placeholder="nombre de nuevo usuario">
                        <i class="formulario__validacion-estado far fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">
                        El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                    </p>
                </div>
            
                <!-- Grupo: Descripcion -->
                <div class="formulario__grupo" id="grupo__descripcion">
                    <label for="descripcion" class="formulario__label">Descripcion de Area</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="DESC_AREA" id="descripcion" value="{{$area->DESC_AREA}}" placeholder="Descripcion de una nueva area">
                        <i class="formulario__validacion-estado far fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">
                        El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                    </p>
                </div>

                <!-- Grupo: Mensaje -->
                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p>
                        <i class="fas fa-exclamation-triangle"></i>
                        <b>Error:</b>
                        Por favor rellene el formulario correctamente.
                    </p>
                </div>
                <!-- Grupo: Guardar y Cancelar -->
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_areas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
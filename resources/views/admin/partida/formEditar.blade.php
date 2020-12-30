{{ $errors }}
<!-- Grupo: Nombre de Partida Padre -->
    <div class="formulario__grupo" id="grupo__PartidaPadre">
        <label for="PartidaPadre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Selecciona Partida Padre&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Area Padre" data-content="Solo puede contener letras por Ej:Direccion de Recursos Humanos">?</a>
        </label>
        <div class="formulario__grupo-input">
               <select name="PARTIDA_PADRE" class="form-control" id="PartidaPadre" >
                @if($partida->PARTIDA_PADRE)
                  @foreach ($partidas as $partid)
                    @if($partid->COD_PARTIDA == $partida->PARTIDA_PADRE)
                      <option value="{{ $partid->COD_PARTIDA }}" selected="">{{$partid->NRO_PARTIDA}} | {{$partid->NOM_PARTIDA}}</option>
                    @else
                      <option value="{{ $partid->COD_PARTIDA }}">{{$partid->NRO_PARTIDA}} | {{$partid->NOM_PARTIDA}}</option>
                    @endif
                  @endforeach
                @endif 
              </select>

            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Solo puede contener letras por Ej:Direccion de Recursos Humanos...
        </p>
    </div> 

 {{-- Grupo: Numero partida --}}
	<div class="formulario__grupo" id="grupo__numeroP">
        <label for="numeroP" class="formulario__label"><b class="colorAste">*</b>Numero de Partida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero Partida" data-content="Solo puede contener numeros enteros positivos..">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input disabled="" type="text" class="formulario__input" name="NRO_PARTIDA"  id="numeroP" value="{{$partida->NRO_PARTIDA}}" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El numero de la nueva partida solo puede contener numero enteros positivos...
        </p>
    </div>

 {{-- Grupo: Nombre partida --}}
    <div class="formulario__grupo" id="grupo__nombreP">
        <label for="nombreP" class="formulario__label"><b class="colorAste">*</b>Nombre Unidada de Medida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre Unidad de Medida" data-content="Solo puede contener letras por Ej:kilogramos, litros">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOM_PARTIDA" id="nombreP" value="{{$partida->NOM_PARTIDA}}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre de la nueva partida solo puede contener letras...
        </p>
    </div>

{{-- Grupo: Boton Cancelar y Modificar --}}
	<div class="formulario__grupo formulario__btn-guardar text-center">
		<a href="{{route('list_partidas')}}" class="btn formulario__btn2">Cancelar</a>
		<button type="submit" class="formulario__btn1">Modificar</button>
	</div>
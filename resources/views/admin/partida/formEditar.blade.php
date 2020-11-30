 {{-- Grupo: Nombre partida --}}
    <div class="formulario__grupo" id="grupo__nombreP">
        <label for="nombreP" class="formulario__label"><b class="colorAste">*</b>Nombre Unidada de Medida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre Unidad de Medida" data-content="Solo puede contener letras por Ej:kilogramos, litros">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOM_PARTIDA" id="nombreP" value="{{old('NOM_PARTIDA')}}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre de la nueva partida solo puede contener letras...
        </p>
    </div>
 {{-- Grupo: Numero partida --}}
	<div class="formulario__grupo" id="grupo__numeroP">
	    <label for="numeroP" class="formulario__label"><b class="colorAste">*</b>Nombre Unidada de Medida
	        <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero Partida" data-content="Solo puede contener numeros enteros positivos..">?</a>
	    </label>
	    <div class="formulario__grupo-input">
	        <input type="text" class="formulario__input" name="NRO_PARTIDA"  id="numeroP">
	        <i class="formulario__validacion-estado far fa-times-circle"></i>
	    </div>
	    <p class="formulario__input-error">
	        El numero de la nueva partida solo puede contener numero enteros positivos...
	    </p>
	</div>

<!-- Grupo: Nombre de Partida Padre -->
    <div class="formulario__grupo" id="grupo__PartidaPadre">
        <label for="PartidaPadre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Selecciona Partida Padre&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Partida Padre" data-content="Debe seleccionar un partida padre a la cual va pertenecer su nueva partida">?</a>
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
            El 
        </p>
    </div> 

 {{-- Grupo: Numero partida --}}
	<div class="formulario__grupo" id="grupo__numeroP">
        <label for="numeroP" class="formulario__label"><b class="colorAste">*</b>Numero de Partida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero Partida" data-content="Solo puede contener numeros enteros positivos..">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input  type="text" class="formulario__input" name="NRO_PARTIDA"  id="numeroP" value="{{$partida->NRO_PARTIDA}}" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El numero de la partida no es Correcto.
        </p>
    </div>

 {{-- Grupo: Nombre partida --}}
    <div class="formulario__grupo" id="grupo__nombreP">
        <label for="nombreP" class="formulario__label"><b class="colorAste">*</b>Nombre Partida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre Partida" data-content="Solo puede contener letras">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOM_PARTIDA" id="nombreP" value="{{$partida->NOM_PARTIDA}}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
             El nombre no es Correcto.
        </p>
    </div>
{{-- descripcion --}}

<div class="formulario__grupo" id="grupo__DescripcionP">
    <label for="DescripcionP" class="formulario__label">Descripcion
        <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Descripcion Partida" data-content="Solo puede contener letras,Descripcion de la partida ">?</a>
    </label>
    <div class="input-group">
        <textarea class="form-control formulario__input" id="DescripcionP" name="DESCRIPCION" rows="3">{{ $partida->DESCRIPCION}}</textarea>
        <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">
        La descripcion no es correcta.
    </p>
</div>

{{-- Grupo: Boton Cancelar y Modificar --}}
	<div class="formulario__grupo formulario__btn-guardar text-center">
		<a href="{{route('list_partidas')}}" class="btn formulario__btn2">Cancelar</a>
		<button type="submit" class="formulario__btn1">Modificar</button>
	</div>
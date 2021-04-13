<!-- Grupo: Nombre de Partida Padre-->
<div class="formulario__grupo" id="grupo__PartidaPadre">
    <label for="Partida" class="formulario__label"><b class="colorAste">*</b>&nbsp;Selecciona Partida
    </label>
    <div class="formulario__grupo-input">
          <select name="partida" class="form-control" id="Partida" required>
            <option value="0">Todas las partidas</option>
            @foreach ($partidas as $partida)
              <option value="{{ $partida->COD_PARTIDA }}">{{$partida->NRO_PARTIDA}} | {{$partida->NOM_PARTIDA}}</option>
            @endforeach
          </select>

        <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">
        Solo puede contener letras por Ej:Direccion de Recursos Humanos...
    </p>
</div>
{{-- Grupo: Option --}}
<div class="formulario__grupo" id="grupo__partidaPresupuestaria">
    <label for="Consumo" class="formulario__label"><b class="colorAste">*</b>&nbsp;Seleccione: Imprimir o Consultar</label>
    <div class="formulario__grupo-input">
      <select name="option" class="form-control" id="Consumo" required>
        <option value="0">Seleccione una Opcion</option>
        <option value="1">Imprimir</option>
        <option value="2">Consultar</option>
      </select>
      <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
</div> 
<!-- Grupo: Imprimir y Cancelar -->
    <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_reportes')}}" class="btn formulario__btn2">Cancelar</a>
        <button type="submit" class="formulario__btn1">Imprimir</button>
    </div>
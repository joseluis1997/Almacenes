 <!-- Grupo: Partida Presupuestaria -->
<div class="formulario__grupo" id="grupo__partidaPresupuestaria">
    <label for="Partida" class="formulario__label"><b class="colorAste">*</b>&nbsp;Seleccione la Area</label>
    <div class="formulario__grupo-input">
      <select name="area" class="form-control" id="Partida" required>
        <option value="0">Todas las areas</option>
        @foreach ($areas as $area)
          <option value="{{ $area->COD_AREA }}">{{$area->NOM_AREA}}</option>
        @endforeach
      </select>
      <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
</div>

 <!-- Grupo: Egresos y Salidas -->
<div class="formulario__grupo" id="grupo__partidaPresupuestaria">
    <label for="Consumo" class="formulario__label"><b class="colorAste">*</b>&nbsp;Egresos o Salidas</label>
    <div class="formulario__grupo-input">
      <select name="consumo" class="form-control" id="Consumo" required>
        <option value=" ">Seleccione una Opcion</option>
        <option value="1">Consumos directos</option>
        <option value="2">Salidas</option>
      </select>
      <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
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

<!-- Grupo: fecha Final -->
            <div class="formulario__grupo" id="grupo__fechafinal">
                <label for="fechafinal" class="formulario__label">Fecha Inicio</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fecha_inicio" id="fechafinal">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: fecha Inicio -->
            <div class="formulario__grupo" id="grupo__fechaInicio">
                <label for="fechaInicio" class="formulario__label">Fecha Fin</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fecha_fin" id="fechaInicio">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Imprimir y Cancelar -->
            <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{route('list_reportes')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Aceptar</button>
            </div>

<!-- Grupo: Nombre de Partida Padre-->
    <div class="formulario__grupo col-12" id="grupo__PartidaPadre">
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
<!-- Grupo: fecha Inicio -->
            <div class="formulario__grupo col-6" id="grupo__fechaInicio">
                <label for="fechaInicio" class="formulario__label">Fecha Inicio</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fecha_inicio" id="fechaInicio">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: fecha Final -->
            <div class="formulario__grupo col-6" id="grupo__fechafinal">
                <label for="fechafinal" class="formulario__label">Fecha Final</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fecha_fin" id="fechafinal">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Imprimir y Cancelar -->
            <div class="col-12 formulario__grupo formulario__btn-guardar text-center">
                <a href="{{route('list_reportes')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Imprimir</button>
            </div>
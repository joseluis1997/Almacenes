<!-- Grupo: Nombre de Area Padre -->
    <div class="formulario__grupo" id="grupo__AreaPadre">
        <label for="AreaPadre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Selecciona Area Padre&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Area Padre" data-content="Solo puede contener letras por Ej:Direccion de Recursos Humanos">?</a>
        </label>
        <div class="formulario__grupo-input">
               <select name="AREA_PADRE" class="form-control" id="AreaPadre" >
                @if($area->AREA_PADRE)
                  @foreach ($areas as $ar)
                    @if($ar->COD_AREA == $area->AREA_PADRE)
                      <option value="{{ $ar->COD_AREA }}" selected="">{{$ar->NOM_AREA}}</option>
                    @else
                      <option value="{{ $ar->COD_AREA }}">{{$ar->NOM_AREA}}</option>
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

<!-- Grupo: Nombre de Area -->
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="nombre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Nombre de Area&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Area" data-content="Solo puede contener letras por Ej:Direccion de Recursos Humanos">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input  type="text" class="formulario__input" name="NOM_AREA" value="{{$area->NOM_AREA}}" id="nombre" placeholder="Nombre Area">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre no es Correcto.
        </p>
    </div>
<!-- Grupo: Ubicacion de Area -->
    <div class="formulario__grupo" id="grupo__ubicacion">
        <label for="ubicacion" class="formulario__label"><b class="colorAste">*</b>&nbsp;Ubicacion de Area&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Ubicacion de Area" data-content="Solo puede contener letras por Ej:B/Constructor...">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="UBICACION_AREA" id="ubicacion" placeholder="Direccion de la Area" value="{{$area->UBICACION_AREA}}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            La ubicacion no es Correcta.
        </p>
    </div>
            
<!-- Grupo: Descripcion -->
    <div class="formulario__grupo" id="grupo__descripcion">
        <label for="descripcion" class="formulario__label"><b class="colorAste">*</b>&nbsp;Descripcion de Area&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Descripcion de Area" data-content="Solo puede contener letras por Ej:Nueva area Direcion de Recursos Humanos..">?</a>
        </label>
        <div class="formulario__grupo-input ">
            
            <textarea class="formulario__input " name="DESC_AREA" id="descripcion" style="margin-top: 0px; margin-bottom: 0px; height: 93px;" >
                {{$area->DESC_AREA}}
            </textarea>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            La descripcion no es correcta.
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
<!-- Grupo: Identificador de Area -->
    <div class="formulario__grupo" id="grupo__identificador">
        <label for="identificador" class="formulario__label"><b class="colorAste">*</b>&nbsp;Numero de Identificador de Area&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Identificador de Area" data-content="Solo puede contener numeros enteros positivos por Ej:9014586527">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NUM_AREA" id="identificador" placeholder="numero de Identificador de Area">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Solo puede contener numeros enteros positivos por Ej:9014586527...
        </p>
    </div>

<!-- Grupo: Nombre de Area -->
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="nombre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Nombre de Area&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Area" data-content="Solo puede contener letras por Ej:Direccion de Recursos Humanos">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOM_AREA" id="nombre" placeholder="Nombre Area">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Solo puede contener letras por Ej:Direccion de Recursos Humanos...
        </p>
    </div>
            
<!-- Grupo: Descripcion -->
    <div class="formulario__grupo" id="grupo__descripcion">
        <label for="descripcion" class="formulario__label"><b class="colorAste">*</b>&nbsp;Descripcion de Area&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Descripcion de Area" data-content="Solo puede contener letras por Ej:Nueva area Direcion de Recursos Humanos..">?</a>
        </label>
        <div class="formulario__grupo-input ">
            
            <textarea class="formulario__input " name="DESC_AREA" id="descripcion" style="margin-top: 0px; margin-bottom: 0px; height: 93px;">
                
            </textarea>
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
        <button type="submit" class="formulario__btn1">Guardar</button>
    </div>
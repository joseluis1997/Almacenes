 {{-- Grupo: Nombre medida --}}
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="nombre" class="formulario__label"><b class="colorAste">*</b>Nombre Unidada de Medida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre Unidad de Medida" data-content="Solo puede contener letras por Ej:kilogramos, litros">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOM_MEDIDA" id="nombre" placeholder="nombre de nueva Unidad de Medida">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre de la unidad de medidad solo puede contener letras...
        </p>
    </div>
{{-- Grupo: Descripcion Unidad de Medida --}}
{{--     <div class="formulario__grupo" id="grupo__DescripcionUnidadMedida">
        <label for="DescripcionUnidadMedida" class="formulario__label">Descripcion</label>
        <div class="input-group">
            <textarea class="form-control formulario__input" id="DescripcionUnidadMedida" name="DESC_MEDIDA" rows="3"  >
                
            </textarea>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre de la unidad de medidad solo puede contener letras...
        </p>
    </div> --}}
    <div class="formulario__grupo" id="grupo__DescripcionUnidadMedida">
        <label for="DescripcionUnidadMedida" class="formulario__label">Descripcion
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Descripcion Unidad de Medida" data-content="Solo puede contener letras,Descripcion del nombre de la unidad de medida ">?</a>
        </label>
        <div class="input-group">
            <textarea class="form-control formulario__input" id="DescripcionUnidadMedida" name="DESC_MEDIDA" rows="3"  >
                
            </textarea>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre de la unidad de medidad solo puede contener letras...
        </p>
    </div>

{{-- Grupo: Botones, Guardar y Cancelar --}}
   <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_medidas')}}" class="btn formulario__btn2">Cancelar</a>
        <button type="submit" class="formulario__btn1">Guardar</button>
    </div>






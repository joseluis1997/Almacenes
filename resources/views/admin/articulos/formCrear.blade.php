<!-- Grupo: Nombre Articulo-->
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="nombre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Nombre de Articulo&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Articulo" data-content="Solo puede contener letras por Ej:Tonners, Pilfrus y cada nombre debe empezar con mayuscula">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOM_ARTICULO" id="nombre" placeholder="Escriba el nombre del Articulo" value="{{ old('NOM_ARTICULO') }}" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre no es Correcto.
        </p>
    </div>

<!-- Grupo: Unidad de Medida del Articulo-->
    <div class="formulario__grupo" id="grupo__MedidaArticulo">
        <label for="MedidaArticulo" class="formulario__label"><b class="colorAste">*</b>&nbsp;Unidad de Medida del Articulo&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Undidad de Medida" data-content="Seleccione la unidad de medida a la cual pertenece el Articulo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <select class="form-control" name="FK_COD_MEDIDA"  id="MedidaArticulo">
                @foreach ($unidadMedidas as $medida)
                <option value="{{ $medida->COD_MEDIDA }}">{{ $medida->NOM_MEDIDA }}</option>
                @endforeach

            </select>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Seleccione la partidad a la cual pertenece el Articulo...
        </p>
    </div>

<!-- Grupo: Partida Articulo-->
    <div class="formulario__grupo" id="grupo__partidaArticulo">
        <label for="partidaArticulo" class="formulario__label"><b class="colorAste">*</b>&nbsp;Partida Articulo&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Partida de Articulo" data-content="Seleccione la partidad a la cual pertenece el Articulo, la partida es la forma de categorizar los Articulos">?</a>
        </label>
        <div class="formulario__grupo-input">
            <select
                class="js-example-basic-multiple form-control" name="FK_COD_PARTIDA" id="partidaArticulo">
                @foreach ($partidas as $partida)
                    @if($partida->ESTADO_PARTIDA)

                    <option value="{{ $partida->COD_PARTIDA }}">{{ $partida->NRO_PARTIDA }}|{{ $partida->NOM_PARTIDA }}</option>
                    @endif
                @endforeach
            </select>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Seleccione la partidad a la cual pertenece el Articulo...
        </p>
    </div>

<!-- Grupo: Marca del Articulo-->
    <div class="formulario__grupo" id="grupo__marca">
        <label for="CantidadArticulo" class="formulario__label"><b class="colorAste">*</b>&nbsp;Marca Articulo&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Marca" data-content="Solo puede contener letras y debe empezar con mayuscula. por ejemplo epson, pil">?</a>
        </label>
        <div class="formulario__grupo-input">
           <input type="text" class="formulario__input" name="MARCA" id="marca" placeholder="Escriba la marca del Articulo" value="{{ old('MARCA') }}" required>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El nombre no es Correcto.
        </p>
    </div>

<!-- Grupo: Descripcion -->
    <div class="formulario__grupo" id="grupo__descripcion">
        <label for="descripcion" class="formulario__label"><b class="colorAste">*</b>&nbsp;Descripcion del Articulo&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Descripcion del Articulo" data-content="Solo puede contener letras..">?</a>
        </label>
        <div class="formulario__grupo-input ">

            <textarea class="formulario__input " name="DESC_ARTICULO" id="descripcion" style="margin-top: 0px; margin-bottom: 0px; height: 93px;"></textarea>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            solo puede contener un breve descripcion del nuevo articulo...
        </p>
    </div>


<!-- Grupo: Guardar y Cancelar -->
    <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_articulos')}}" class="btn formulario__btn2">Cancelar</a>
        <button type="submit" class="formulario__btn1">Guardar</button>
    </div>

  <div class="row">
  <!-- Grupo: fecha Registro -->
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12" id="grupo__fecharegistro">
        <label for="fecharegistro" class="formulario__label">
            <b class="colorAste">*</b>Fecha Registro
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Fecha Registro" data-content="Seleccione la fecha de registro del consumo directo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="date" class="formulario__input" name="FECHA" id="fecharegistro" value="{{$salida->FECHA}}">
            <i class="formulario__validacion-estado far fa-times-circle" ></i>
        </div>
        <p class="formulario__input-error">
            El Articulo tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
        </p>
    </div>

    {{-- Grupo: Area Solicitante --}}
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12">
        <label for="areasalida" class="formulario__label">
            <b class="colorAste">*</b>Area solicitante
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Area solicitante" data-content="Seleccione el Area Solicitante de la salida que va modificar">?</a>
        </label>
        <div class="formulario__grupo-input">
            <select name="COD_AREA" id="areasalida" class="form-control formulario__input selectpicker" data-live-search="true">
                @foreach ($areas as $area)
                    @if($salida->COD_AREA == $area->COD_AREA)
                        <option value="{{ $area->COD_AREA }}" selected="">{{ $area->NOM_AREA }}</option>
                    @else
                        <option value="{{ $area->COD_AREA }}">{{ $area->NOM_AREA }}</option>
                    @endif
                @endforeach
            </select>
        </div>
          <p class="formulario__input-error">
          Seleccione el proveedor del cual se realizo la compra..
          </p>
    </div>

    <!-- Grupo: Detalle salida -->
    <div class="formulario__grupo col-lg-12 col-sm-6 col-md-3 col-xs-12">
        <label for="detallesalida" class="formulario__label">
            Detalle Salida
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Detalle Salida" data-content="Realize una breve descripcion de la Salida">?</a>
        </label>
        <div class="formulario__grupo-input">
            <textarea  class="formulario__input" id="detallesalida" name="DETALLE_SALIDA" style="height:100px;">{{ $salida->DETALLE_SALIDA}}</textarea>
            <i class="formulario__validacion-estado far fa-times-circle"></i>                   
        </div>
        <p class="formulario__input-error">
            El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
        </p>
    </div>
    {{-- Grupo:Tabla --}}
     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Articulo</th>
                <th>Cantidad</th>
            </thead>
            <tfoot>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
            <tbody>
                 @foreach($salida->Articulos as $articulo)
                    <tr class="selected filaConsumo" id="fila{{$articulo->COD_ARTICULO}}">
                        <td>
                            <button type="button" class="btn btn-warning" onclick="eliminar({{$articulo->COD_ARTICULO}})"disabled="">X</button>
                        </td>
                        <td>
                            <input type="hidden" name="articulos[]" value="{{$articulo->COD_ARTICULO}}"></input>{{$articulo->NOM_ARTICULO}}
                        </td>
                        <td>
                            <input type="hidden" name="cantidad_{{$articulo->COD_ARTICULO}}" value="{{$articulo->pivot->CANTIDAD}}" ></input disabled="">
                            <input type="number" idArticulo="{{$articulo->COD_ARTICULO}}" value="{{$articulo->pivot->CANTIDAD}}" disabled id="cantidad_{{$articulo->COD_ARTICULO}}"></input>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>
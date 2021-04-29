<!-- Grupo: Articulo -->
    <div class="formulario__grupo" id="grupo__partidaPresupuestaria">
        <label for="Partida" class="formulario__label"><b class="colorAste">*</b>&nbsp;Seleccione Articulo</label>
        <div class="formulario__grupo-input">
            <select name="articulo" class="form-control" required>
                <option value="0">Seleccione un Articulo</option>
                @foreach ($Articulos as $articulo)
                    <option value="{{ $articulo->COD_ARTICULO }}">{{$articulo->NOM_ARTICULO}}</option>
                @endforeach
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

<!-- Grupo: Imprimir y Cancelar -->
<div class="formulario__grupo formulario__btn-guardar text-center">
    <a href="{{route('list_reportes')}}" class="btn formulario__btn2">Cancelar</a>
    <button type="submit" class="formulario__btn1">Aceptar</button>
</div>

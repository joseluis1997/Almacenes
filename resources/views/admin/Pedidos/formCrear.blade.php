<div class="row">
{{-- Grupo: Area Solicitante --}}
    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12 formulario__grupo">
        <label for="area" class="formulario__label">
            <b class="colorAste">*</b>Area solicitante
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Area solicitante" data-content="Seleccione el Area Solicitante del nuevo Pedido">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="COD_AREA" id="area" class="form-control formulario__input selectpicker" data-live-search="true" data-size="3">
                <option value=" ">Seleccione un Area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->COD_AREA }}">{{ $area->NOM_AREA }}</option>
                @endforeach
            </select>
        </div>
          <p class="formulario__input-error">
          Seleccione el proveedor del cual se realizo la compra..
          </p>
    </div>

{{-- Grupo: Fecha --}}
    <div class="formulario__grupo col-lg-6 col-sm-12 col-md-12 col-xs-12">
        <label for="fecha" class="formulario__label">
            <b class="colorAste">*</b>Fecha Registro
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Fecha Pedido" data-content="Agregue la fecha registro del nuevo Pedido">?</a>
        </label>
        <div class="form-group formulario__grupo-input" >
            <input type="date" class="formulario__input" name="FECHA" id="fecha" value="{{ old('FECHA')}}" required>
        </div>
        <p class="formulario__input-error">
           Registre la fecha de Pedido..
        </p>
    </div>

{{-- Grupo: Detalle Detalle Pedido --}}
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <label for="detallePedido" class="formulario__label">
            Detalle del Nuevo Pedido
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Detalle Pedido" data-content="Realize una breve descripcion del nuevo pedido a registrar">?</a>
        </label>
        <div class=" form-group formulario__grupo-input">
            <Textarea name="DETALLE_PEDIDO" id="detallePedido" class="form-control formulario__input" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></Textarea>
        </div>
         <p class="formulario__input-error">
            Realize un breve descripcion del registro del nuevo pedido, es opcional...
        </p>
    </div>

{{-- Grupo: ArticUlos --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="pidarticulo">Articulos</label>    
            <select name="pidarticulo" class="form-group selectpicker" id="pidarticulo" data-live-search="true">
                <option value="">Seleccione un Articulo</option>
                @foreach($Articulos as $articulo)
                
                    <option value={{ $articulo->COD_ARTICULO }}_{{ $articulo->CANT_ACTUAL}} id="articulo_{{ $articulo->COD_ARTICULO }}">{{ $articulo->NOM_ARTICULO }}[{{ $articulo->Medida->NOM_MEDIDA}}]</option>
                @endforeach
            </select>
        </div>
    </div>
{{-- Grupo: Cantidad --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>    
            <input type="number" id="cantidad" class="form-control"
            placeholder="Digite la Cantidad" min="1">
        </div>
    </div>
{{-- Grupo: Cantidad actual (stock) --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label for="cantidad">Stock</label>    
            <input type="number" name="stock" id="pstock" class="form-control"
            placeholder="stock" disabled>
        </div>
    </div>
 {{-- Grupo:Boton Agregar --}}
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <button type="button" id="btn_add" class="btn btn-primary">Agregar Pedido</button>
            </div>
        </div>
{{-- Grupo:Tabla --}}
     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                {{-- <th>Precio Unitario</th> --}}
                {{-- <th>SubTotal</th> --}}
            </thead>
           
            <tbody>
                
            </tbody>
        </table>
    </div>
    
<!-- Grupo: Mensaje -->
    <div class="formulario__mensaje" id="formulario__mensaje">
        <p>
            <i class="fas fa-exclamation-triangle"></i>
            <b>Error:</b>
            Por favor rellene el formulario correctamente.
        </p>
    </div>
</div>
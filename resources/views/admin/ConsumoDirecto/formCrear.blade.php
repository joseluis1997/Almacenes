<div class="row">
    <!-- Grupo: fecha Registro -->
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12" id="grupo__fecharegistro">
        <label for="fecharegistro" class="formulario__label">
            <b class="colorAste">*</b>Fecha Registro
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Fecha Registro" data-content="Seleccione la fecha de registro del consumo directo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="date" class="formulario__input" name="FECHA" id="fecharegistro" value="{{ old('FECHA') }}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El Articulo tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
        </p>
    </div>

{{-- Grupo: Tipo de Comprobante --}}
    <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
        <label for="tipocomprobante" class="formulario__grupo">
            <b class="colorAste">*</b>Tipo Comprobante
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Tipo de Comprobante" data-content="Seleccione el Tipo de comprobante de la compra por ejemplo: Factura o Resivo">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="COMPROBANTE" class="form-control formulario__input" id="tipocomprobante" required>
                <option value=" ">Seleccione Comprobante</option>
                <option value="Factura">Factura</option>
                <option value="Recibo">Recibo</option>
            </select>
        </div>
        <p class="formulario__input-error">
            Seleccione un tipo de comprobante de la compra para el stock..
        </p>
    </div>

<!-- Grupo: numeroOrdenCompra -->
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12" id="grupo__numeroOrdenCompra">
        <label for="numeroOrdenCompra" class="formulario__label">
            <b class="colorAste">*</b>Numero Orden Compra
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de Orden de Compra" data-content="Por favor Introduzca el numero de Orden de compra del consumo directo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NRO_ORD_COMPRA" id="numeroOrdenCompra" placeholder="Digite numero orden de compra" value="{{ old('NRO_ORD_COMPRA') }}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>                   
        </div>
        <p class="formulario__input-error">
            El numero no es Correcto.
        </p>
    </div>
<!-- Grupo: Preventivo -->
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12" id="grupo__preventivo">
        <label for="preventivo" class="formulario__label">
            <b class="colorAste">*</b>Numero Preventivo
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero Preventivo" data-content="Por favor Introduzca el numero preventivo del consumo directo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NRO_PREVENTIVO" id="preventivo" placeholder="Numero de Preventivo..."value="{{ old('NRO_PREVENTIVO') }}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>                   
        </div>
        <p class="formulario__input-error">
            El numero no es Correcto.
        </p>
    </div>
<!-- Grupo: Nota Ingreso -->
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12" id="grupo__notaIngreso">
        <label for="notaIngreso" class="formulario__label">
            <b class="colorAste">*</b>Nota de Ingreso
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nota de Ingreso" data-content="Por favor Introduzca el numero de la nota de Ingreso del consumo directo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="NOTA_INGRESO" id="notaIngreso" placeholder="Numero de Nota de Ingreso..." value="{{ old('NOTA_INGRESO') }}">
            <i class="formulario__validacion-estado far fa-times-circle"></i>                   
        </div>
        <p class="formulario__input-error">
            El numero no es Correcto.
        </p>
    </div>
{{-- Grupo: Area Solicitante --}}
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12">
        <label for="areaconsumodirecto" class="formulario__label">
            <b class="colorAste">*</b>Area solicitante
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Area solicitante" data-content="Seleccione el Area Solicitante del nuevo Pedido">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="COD_AREA" id="areaconsumodirecto" class="form-control formulario__input selectpicker" data-live-search="true">
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
<!-- Grupo: Proveedor -->
    <div class="formulario__grupo col-lg-6 col-sm-3 col-md-3 col-xs-12" id="grupo_proveedor">
        <label for="proveedor" class="formulario__label">
            <b class="colorAste">*</b>Proveedor
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Proveedor" data-content="Seleccione el nombre de su proveedor">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="PROVEEDOR" id="proveedor" class="form-control formulario__input" data-live-search="true">
                <option value=" ">Seleccione un Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->COD_PROVEEDOR }}">{{ $proveedor->NOM_PROVEEDOR }}</option>
                @endforeach
            </select>
        </div>
          <p class="formulario__input-error">
          Seleccione el proveedor del cual se realizo la compra..
          </p>
    </div>
<!-- Grupo: Detalle Compra Consumo Directos -->
    <div class="formulario__grupo col-lg-6 col-sm-6 col-md-3 col-xs-12">
        <label for="detalleConsumoDirecto" class="formulario__label">
            Detalle del Consumo Directo
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Detalle del Consumo Directo" data-content="Realize una breve descripcion del Nuevo Consumo Directo">?</a>
        </label>
        <div class="formulario__grupo-input">
            <textarea  class="formulario__input" id="detalleConsumoDirecto" name="DETALLE_CONSUMO"></textarea>
            <i class="formulario__validacion-estado far fa-times-circle"></i>                   
        </div>
        <p class="formulario__input-error">
            La descripcion no es Correcto.
        </p>
    </div>

{{-- Grupo: Articulos --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="pidarticulo">Articulos</label>    
            <select name="pidarticulo" class="form-group selectpicker" id="pidarticulo" data-live-search="true">
                <option value=" ">Seleccione un Articulo</option>
                @foreach($Articulos as $articulo)
                    <option value="{{ $articulo->COD_ARTICULO }}" id="articulo_{{ $articulo->COD_ARTICULO }}">{{ $articulo->NOM_ARTICULO }}[{{ $articulo->Medida->NOM_MEDIDA}}]</option>
                @endforeach
            </select>
        </div>
    </div>

{{-- Grupo: Cantidad --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>    
            <input type="number" name="CANTIDAD" id="cantidad" class="form-control"
            placeholder="Digite la Cantidad" min="1">
        </div>
    </div>
{{-- Grupo:Precio Unidad --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
        <div class="form-group">
            <label for="precio">Precio Unidad</label>    
            <input type="number" name="PRECIO_UNITARIO" id="precio" class="form-control"
            placeholder="Digite Precio por unidad" min="1">
        </div>
    </div>
{{-- Grupo:Boton Agregar --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <button type="button" id="btn_add" class="btn btn-primary">Agregar Arituculo</button>
        </div>
    </div>
{{-- Grupo:Tabla --}}
     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>SubTotal</th>
            </thead>
            <tfoot>
                <th>Total</th>
                <th></th>
                <th></th>
                <th></th>
                <th><h4 id="total">bs/. 0.00 </h4></th>
            </tfoot>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

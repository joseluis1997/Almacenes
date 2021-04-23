{{-- Grupo: Proveedor --}}
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 formulario__grupo">
        <label for="proveedor" class="formulario__label">
            <b class="colorAste">*</b>Proveedor
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Proveedor" data-content="Seleccione el Proveedor del cual realiazo la compra por ejemplo: sucursal lidita">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="COD_PROVEEDOR" id="proveedor" class="form-control formulario__input selectpicker" data-live-search="true" data-size="3">
                <option value="">Seleccione un Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->COD_PROVEEDOR }}">{{ $proveedor->NOM_PROVEEDOR }}</option>
                @endforeach
            </select>
        </div>
         <p class="formulario__input-error">
            Seleccione el proveedor del cual se realizo la compra..
        </p>
    </div>

{{-- Grupo: Area --}}
     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <label for="area" class="formulario__label">
            <b class="colorAste">*</b>Area Solicitante
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Area" data-content="Seleccione el Area que esta realizando la compra por ejemplo: Despacho del gobernador">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="COD_AREA" id="area" class="form-control formulario__input selectpicker" required data-live-search="true" data-size="3">
                <option value="">Seleccione un Area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->COD_AREA }}">{{ $area->NOM_AREA }}</option>
                @endforeach
            </select>
        </div>
        <p class="formulario__input-error">
            Seleccione el area el cual esta realizando la compra..
        </p>
    </div>

{{-- Grupo: Tipo de Comprobante --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <label for="tipocomprobante" class="formulario__grupo">
            <b class="colorAste">*</b>Tipo Comprobante
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Tipo de Comprobante" data-content="Seleccione el Tipo de comprobante de la compra por ejemplo: Factura o Resivo">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <select name="COMPROBANTE" class="form-control formulario__input" id="tipocomprobante" required>
                <option value="Factura">Factura</option>
                <option value="Recibo">Recibo</option>
            </select>
        </div>
        <p class="formulario__input-error">
            Seleccione un tipo de comprobante de la compra para el stock..
        </p>
    </div>

{{-- Grupo:Numero Orden Compra --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" id="grupo__numerocomprobante">
        <label for="numerocomprobante">
            <b class="colorAste">*</b>Numero Orden Compra
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero Orden de Compra" data-content="Escriba el numero de orden de compra">?</a>
        </label>
        <div class="form-group formulario__grupo-input" >
            <input type="text" class="formulario__input" name="NRO_ORD_COMPRA" id="numerocomprobante" value="{{ old('NRO_ORD_COMPRA')}}" placeholder="Numero de orden de compra" required>
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El numero de Orden de Compra no es Correcto.
        </p>
    </div>

{{-- Grupo:Numero Preventivo --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" id="grupo__preventivo">
        <label for="numeropreventivo">
            <b class="colorAste">*</b>Numero Preventivo
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero Preventivo" data-content="Escriba el numero Preventivo para de la compra">?</a>
        </label>
        <div class="form-group formulario__grupo-input" >
            <input type="text" class="formulario__input" name="NRO_PREVENTIVO" id="numeropreventivo" value="{{ old('NRO_PREVENTIVO')}}" placeholder="Numero Preventivo" required>
             <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            El numero preventivo no es Correcto.
        </p>
    </div>

{{-- Grupo:Fecha --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <label for="fecha">
            <b class="colorAste">*</b>Fecha Registro
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Fecha Registro" data-content="Agregue la fecha registro de la compra">?</a>
        </label>
        <div class="form-group formulario__grupo-input" >
            <input type="date" class="formulario__input" name="FECHA" id="fecha" value="{{ old('FECHA')}}" required>
        </div>
        <p class="formulario__input-error">
           Registre la fecha de compra..
        </p>
    </div>

{{-- Grupo: Detalle Compra --}}
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 formulario__grupo">
        <label for="detalle" class="formulario__label">
            Detalle Compra
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Detalle Compra" data-content="Realize un breve descripcion de la compra, es opcional">?</a>
        </label>
        <div class="form-group formulario__grupo-input">
            <Textarea name="DETALLE_COMPRA" id="detalle" class="form-control formulario__input"></Textarea>
        </div>
         <p class="formulario__input-error">
            Realize un breve descripcion de la compra, es opcional...
        </p>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <label for="pidarticulo">Articulos</label>    
            <select name="pidarticulo" class="form-group selectpicker" id="pidarticulo" data-live-search="true" >
                <option value="">Seleccione un Articulo</option>
                @foreach($Articulos as $articulo)
                    <option value={{ $articulo->COD_ARTICULO }}>{{ $articulo->NOM_ARTICULO}}[{{ $articulo->Medida->NOM_MEDIDA}}]</option>
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
            <label for="precio">Precio Unitario</label>    
            <input type="number" name="PRECIO_UNITARIO" id="precio" class="form-control"
            placeholder="Digite Precio por unidad" min="1">
        </div>
    </div>
     {{-- Grupo:Boton Agregar --}}
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
            <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
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
                <th><h4 id="total">bs/ 0.00 </h4></th>
            </tfoot>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
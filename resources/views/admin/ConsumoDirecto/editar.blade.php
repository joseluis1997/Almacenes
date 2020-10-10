@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Modificar Consumo Directo</b></h3> 
            </div>
            </div>
        </div>
        <div class="card mt-2">
        <div class="card-body">    
            <form action="#" id="form-general" class="formulario form--label-right" method="POST" enctype="multipart/form-data">
             @csrf @method("put")
<!-- Grupo: fecha Registro -->
            <div class="formulario__grupo" id="grupo__fecharegistro">
                <label for="fecharegistro" class="formulario__label">Fecha 
                Registro</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="#" id="fecharegistro">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El Articulo tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: factura -->
            <div class="formulario__grupo" id="grupo__factura">
                <label for="factura" class="formulario__label">Factura o Resivo</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="factura" placeholder="factura o Recibo">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: numeroOrdenCompra -->
            <div class="formulario__grupo" id="grupo__numeroOrdenCompra">
                <label for="numeroOrdenCompra" class="formulario__label">Numero Orden Compra</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="numeroOrdenCompra" placeholder="Digite numero orden de compra">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: NumeroOrdenTrabajo -->
            <div class="formulario__grupo" id="grupo__NumeroOrdenTrabajo">
                <label for="NumeroOrdenTrabajo" class="formulario__label">Numero de Orden de Trabajo</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="NumeroOrdenTrabajo" placeholder="Digite Orden de Trabajo">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Preventivo -->
            <div class="formulario__grupo" id="grupo__preventivo">
                <label for="preventivo" class="formulario__label">Preventivo</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="preventivo" placeholder="Numero de Preventivo...">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Nota Ingreso -->
            <div class="formulario__grupo" id="grupo__notaIngreso">
                <label for="notaIngreso" class="formulario__label">Nota de Ingreso</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="notaIngreso" placeholder="Nota de Ingreso...">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Area -->
            <div class="formulario__grupo" id="grupo__area">
                <label for="area" class="formulario__label">Area</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="area" placeholder="Area Solicitante">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Proveedor -->
            <div class="formulario__grupo" id="grupo__proveedor">
                <label for="proveedor" class="formulario__label">Proveedor</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="proveedor" placeholder="Nombre de la empresa del proveedor">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: cantidad -->
            <div class="formulario__grupo" id="grupo__cantidad">
                <label for="cantidad" class="formulario__label">Cantidad</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="#" id="cantidad" placeholder="Cantidad de Articulos">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Detalle Compra Stock -->
            <div class="formulario__grupo" id="grupo__DetalleCompra">
                <label for="DetalleCompra" class="formulario__label">Detalle</label>
                <div class="formulario__grupo-input">
                    <textarea  class="formulario__input" id="DetalleCompra" name="w3review" rows="4" cols="50">
                        Detalle consumo Directo Almacen.....
                     </textarea>
                    <i class="formulario__validacion-estado far fa-times-circle"></i>                   
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>


<!-- Grupo: PrecioUnidad -->
            <div class="formulario__grupo" id="grupo__PrecioUnidad">
                <label for="PrecioUnidad" class="formulario__label">Precio Unidad</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="PrecioUnidad" placeholder="Precio por unidad">
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
<!-- Grupo: Modificar y Cancelar -->
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_consumodirecto')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
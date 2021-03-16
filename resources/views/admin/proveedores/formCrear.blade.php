<!-- Grupo: Nit Proveedor -->
            <div class="formulario__grupo" id="grupo__nit">
                <label for="nit" class="formulario__label"><b class="colorAste">*</b>&nbsp;NIT:&nbsp;&nbsp;
                    <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de NIT" data-content="Solo puede contener numeros enteros positivos por Ej:9014586527">?</a>
                </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="NIT" id="nit" placeholder="numero de NIT">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El numero del NIT solo puede contener numeros enteros positivos...
                </p>
            </div>
{{-- Grupo: Nombre de la Empresa --}}
             <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label"><b class="colorAste">*</b>&nbsp;Nombre de la Empresa:&nbsp;&nbsp;
                    <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de la Empresa" data-content="Solo puede contener letras por Ej: INPROL...">?</a>
                </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="NOM_PROVEEDOR" id="nombre" placeholder="Nombre de la Empresa">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                   Solo puede contener letras por Ej: INPROL...
                </p>
            </div>
{{-- Grupo: Telefono de Contacto --}}
             <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="formulario__label"><b class="colorAste">*</b>Telefono de Contacto:&nbsp;&nbsp;
                    <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de Contacto" data-content="Solo puede contener numeros enteros positivos por Ej:75389565">?</a>
                </label>
                <div class="formulario__grupo-input">
                    <input type="tel" class="formulario__input" name="TELEF_PROVEEDOR" id="telefono" placeholder="(+Código) Número">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    Solo puede contener numeros enteros positivos por Ej:75389565...
                </p>
            </div>
{{-- Grupo: Direccion --}}
             <div class="formulario__grupo" id="grupo__direccion">
                <label for="direccion" class="formulario__label"><b class="colorAste">*</b>Direccion:&nbsp;&nbsp;
                    <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Direccion del Proveedor" data-content="Solo puede contener letras por Ej: B/contructor">?</a>
                </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="DIR_PROVEEDOR" id="direccion" placeholder="Direccion de la Empresa...">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El area tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
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
                <a href="{{route('list_proveedores')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Guardar</button>
            </div>
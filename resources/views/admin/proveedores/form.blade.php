<!-- Grupo: Nit Proveedor -->
            <div class="formulario__grupo" id="grupo__nit">
                <label for="nit" class="formulario__label">NIT:</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="nit" placeholder="numero de NIT">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El area tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
{{-- Grupo: Nombre de la Empresa --}}
             <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre de la Empresa:</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="nombre" placeholder="Nombre de la Empresa">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El area tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
{{-- Grupo: Telefono de Contacto --}}
             <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="formulario__label">Telefono de Contacto:</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="#" id="telefono" placeholder="Telefono de Contacto...">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El area tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
{{-- Grupo: Direccion --}}
             <div class="formulario__grupo" id="grupo__direccion">
                <label for="direccion" class="formulario__label">Direccion:</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="direccion" placeholder="Direccion de la Empresa...">
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
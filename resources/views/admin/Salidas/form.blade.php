 <!-- Grupo: Nombre Articulo -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre Articulo</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="nombre" placeholder="nombre de nuevo usuario">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
            
<!-- Grupo: Fecha Registro -->
            <div class="formulario__grupo" id="grupo__FechaRegistro">
                <label for="FechaRegistro" class="formulario__label">Fecha Registro</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="FechaRegistro" placeholder="Fecha Registro del Pedido...">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El pedido tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>

           
<!-- Grupo: Descripcion -->
            <div class="formulario__grupo" id="grupo__Area">
                <label for="Area" class="formulario__label">Area</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="#" id="Area" placeholder="Area solicitante del nuevo pedido..">
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
                    <input type="text" class="formulario__input" name="#" id="cantidad" placeholder="Cantidad del nuevo pedido..">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
<!-- Grupo: Detalle Pedido -->
            <div class="formulario__grupo" id="grupo__DetallePedido">
                <label for="DetallePedido" class="formulario__label">Detalle</label>
                <div class="formulario__grupo-input">
                    <textarea  class="formulario__input" id="DetallePedido" name="w3review" rows="6" cols="50">
                     </textarea>
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
           <!-- Grupo: Guardar y Cancelar -->

                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_salidas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Guardar</button>
                </div>
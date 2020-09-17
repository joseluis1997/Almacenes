
            <!-- Grupo: Ci -->
            <div class="formulario__grupo" id="grupo__ci">
                <label for="ci" class="formulario__label">Numero de Carnet</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="ci" id="ci" placeholder="numero de carnet de identidad">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="name" id="name" placeholder="nombre de nuevo usuario">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
            
            <!-- Grupo: Apellidos -->
            <div class="formulario__grupo" id="grupo__apellidos">
                <label for="apellidos" class="formulario__label">Apellidos</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="lastname" id="apellidos" placeholder="apellidos de nuevo usuario">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>

            <!-- Grupo: Telefono -->
            <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="formulario__label">Telefono</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="telephone" id="telefono" placeholder="numero de telefono de nuevo usuario">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El telefono solo puede contener numeros y el maximo son 14 dígitos.
                </p>
            </div>

            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__usuario">
                <label for="usuario" class="formulario__label">Usuario</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="username" id="username" placeholder="nombre de usuario">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El usuario tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>
              <!-- Grupo: Rol -->
            <div class="formulario__grupo" id="grupo__rol">
                <label for="rol" class="formulario__label">Rol de Usuario</label>
                <div class="formulario__grupo-input">
                    <!-- <input type="text" class="formulario__input" name="" id="rol" > -->
                    <select class="form-control formulario__input " name="rol" id="rol" >
                    @foreach($roles as $key =>$value)
                        @if($user->hasRole($value))
                            <option value="{{$value}}" selected >{{$value}}</option>
                            <!-- <i class="formulario__validacion-estado far fa-times-circle"></i> -->
                            @else
                             <option value="{{$value}}">{{$value}}</option>
                             <!-- <i class="formulario__validacion-estado far fa-times-circle"></i> -->
                        @endif
                    @endforeach
                </select>  
                </div>
                
                <p class="formulario__input-error">
                    Debe asiganar un Rol al nuevo usuario.
                </p>
            </div>
            <!-- Grupo: Password -->
            <div class="formulario__grupo" id="grupo__password">
                <label for="password" class="formulario__label">Contraseña</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="password" id="password" >
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    La contraseña tiene que ser de 4 a 12 dígitos.
                </p>
            </div>
            <!-- Grupo: Password 2 -->
            <div class="formulario__grupo" id="grupo__password2">
                <label for="password2" class="formulario__label">Repetir Contraseña</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="password2" id="password2" >
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    Ambas contraseñas deben ser iguales.
                </p>
            </div>
          
             <!-- Grupo: Imagen Usuario -->
             <div class="formulario__grupo" id="grupo__imagen">
                <label for="imagen" class="formulario__label">Imagen</label>
                <div class="formulario__grupo-input">
                    <input type="file"  name="imagen" id="imagen" >
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    Debe asiganar una foto para el perfil del nuevo usuario.
                </p>
            </div>
            <div></div>
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
                    <a href="{{route('list_users')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Guardar</button>
                </div>
            
        </form>
    </main>



            <!-- Grupo: Ci -->
            <div class="formulario__grupo" id="grupo__ci">

               <label for="ci" class="formulario__label"><b class="colorAste">*</b> Numero de Carnet&nbsp;&nbsp;<b onmouseover="alert('por favor digite su numero de carnet por ejemplo:8174701, solo puede ser numeros')" class="colorSigno">?</b></label>
                <div class="formulario__grupo-input">

                  {{--   <div class="ventana" id="vent">
                        <div id="cerrar"><a href="javascript:cerrar()"><img src="{{ asset('images/close.png') }}"></a></div>
                        por favor digite su numero de carnet por ejemplo:8174701, solo puede ser numeros
                    </div> --}}
                    <input type="text" class="formulario__input" name="ci" id="ci" placeholder="numero de carnet de identidad">
                    <i class="formulario__validacion-estado far fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                </p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="name" class="formulario__label"><b class="colorAste">*</b>&nbsp;Nombre&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor escriba su nombre por ejemplo:Jose, solo puede ser letras'))" class="colorSigno">?</b></label>
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
                <label for="apellidos" class="formulario__label"><b class="colorAste">*</b>&nbsp;Apellidos&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor escriba su Apellidos por ejemplo:Mercado, solo puede ser letras'))" class="colorSigno">?</b></label>
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
                <label for="telefono" class="formulario__label">Telefono&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor escriba su numero de Celular por ejemplo:75315092, solo puede ser numeros'))" class="colorSigno">?</b></label>
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
                <label for="username" class="formulario__label"><b class="colorAste">*</b>&nbsp;Usuario&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor escriba su nombre de usuario por ejemplo:Jose_123, solo puede ser letras y Guion bajo'))" class="colorSigno">?</b></label>
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
                <label for="rol" class="formulario__label"><b class="colorAste">*</b>&nbsp;Rol de Usuario&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor seleccione un Rol por ejemplo: Editor.'))" class="colorSigno">?</b></label>
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
                <label for="password" class="formulario__label"><b class="colorAste">*</b>&nbsp;Contraseña</label>
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
                <label for="imagen" class="formulario__label"><b class="colorAste">*</b>&nbsp;Imagen&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor elija una foto para su perfil, solo con extecion jpg, jpeg, png'))" class="colorSigno">?</b></label>
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

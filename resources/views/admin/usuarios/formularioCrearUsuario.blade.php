<div class="col-lg-10 order-lg-0 text-center profile-avatar" >
    <h2 class="text-center font-weight-light">Foto de Perfil</h2>
    <div id="preview">  
        @if($user->imagen != "")
            <img src="{{ asset('/images/users/'.$user->imagen) }}" class="img img-fluid rounded-circle" alt="avatar" />
        @else
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img img-fluid rounded-circle" alt="User avatar">
        @endif
    </div><br>
    <div class="input-group px-xl-4" >
        <div class="custom-file" >
            <input type="file" class="custom-file-input" name="imagen" id="fileToUpload">
            <label class="custom-file-label" for="fileToUpload" aria-describedby="inputGroupFileAddon02">Agregar Foto</label>
        </div>
    </div>
</div>
<br>
<!-- Grupo: Ci -->
    <div class="formulario__grupo" id="grupo__ci">
        <label  for="ci" id="mostrar" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Numero de Carnet&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de Carnet de Indentid" data-content="Solo puede contener numeros enteros positivos por Ej:81747041">?</a>
        </label> 
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="CI" id="ci" placeholder="numero de carnet de identidad">    
                <i class="formulario__validacion-estado far fa-times-circle">    
                </i>
        </div>
        <p class="formulario__input-error">
            El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
        </p>
    </div>

<!-- Grupo: Nombre -->
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="name" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Nombre&nbsp;&nbsp;
             <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre" data-content="Escriba su nombre por ejemplo:Jose, solo puede ser letras...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="NOMBRE" id="name" placeholder="nombre de nuevo usuario">
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
            </p>
    </div>
            
<!-- Grupo: Apellidos -->
    <div class="formulario__grupo" id="grupo__apellidos">
        <label for="apellidos" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Apellidos&nbsp;&nbsp;
             <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Apellidos" data-content="Escriba su Apellido por ejemplo:Mercado, solo puede ser letras...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="APELLIDO" id="apellidos" placeholder="apellidos de nuevo usuario">
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El ci tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
            </p>
    </div>

<!-- Grupo: Telefono -->
    <div class="formulario__grupo" id="grupo__telefono">
        <label for="telefono" class="formulario__label">Telefono&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Telefono" data-content="Escriba su numero de celular por Ej:75316489.">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="TELEFONO" id="telefono" placeholder="numero de telefono de nuevo usuario">
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El telefono solo puede contener numeros y el maximo son 14 dígitos.
            </p>
    </div>

<!-- Grupo: Usuario -->
    <div class="formulario__grupo" id="grupo__usuario">
        <label for="username" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Usuario&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Usuario" data-content="Escriba su nombre de usuario por ejemplo:Jose_123, solo puede contener letras y Guion bajo...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="NOM_USUARIO" id="username" placeholder="nombre de usuario">
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El usuario tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
            </p>
    </div>
            
<!-- Grupo: Rol -->
    <div class="formulario__grupo" id="grupo__rol">
        <label for="rol" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">
            &nbsp;Rol de Usuario&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Rol Usuario" data-content="Seleccione un Rol,en caso no seleccionara ninguno, el sistema por defecto le asiganara el rol de Editor...">?</a>
        </label>
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
        <label for="password" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Contraseña</label>
        <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="password" id="password">
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
        </div>
        <p class="formulario__input-error">
            La contraseña tiene que ser de 4 a 12 dígitos.
        </p>
    </div>
<!-- Grupo: Password 2 -->
    <div class="formulario__grupo" id="grupo__password2">
        <label for="re_password" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Repetir Contraseña</label>
        <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="re_password" id="re_password" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Ambas contraseñas deben ser iguales.
        </p>
    </div>
          
 <!-- Grupo: Imagen Usuario -->
{{--     <div class="formulario__grupo" id="grupo__imagen">
        <label for="imagen" class="formulario__label"><b class="colorAste">*</b>&nbsp;Imagen&nbsp;&nbsp;
             <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Foto de Perfil" data-content="Elija una foto para su perfil, solo con extecion jpg, jpeg, png">?</a>
        </label>
        <div class="formulario__grupo-input">
            <input type="file"  name="imagen" id="imagen" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Debe asiganar una foto para el perfil del nuevo usuario.
        </p>
    </div>
    <div></div> --}}

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

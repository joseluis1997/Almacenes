<div class="col-lg-10 order-lg-0 text-center profile-avatar" >
    <h2 class="text-center font-weight-light">Foto de Perfil</h2>
    <div id="preview">  
        @if($user->imagen != "")
            <img src="{{ asset('/images/users/'.$user->imagen) }}" class="img img-fluid rounded-circle" alt="avatar" />
        @else
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
        @endif
    </div><br>
    <div class="input-group px-xl-4" >
        <div class="custom-file" >
            <input type="file" class="custom-file-input" name="imagen" id="fileToUpload">
            <label class="custom-file-label" for="fileToUpload" aria-describedby="inputGroupFileAddon02">Modificar Foto</label>
        </div>
    </div>
</div>
<br>
<!-- Grupo: CI -->
<div class="formulario__grupo" id="grupo__ci">

   <label for="ci" class="formulario__label"><b class="colorAste">*</b> Numero de Carnet&nbsp;&nbsp;
        <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de Carnet de Indentid" data-content="Solo puede contener numeros enteros positivos por Ej:81747041">?</a>
   </label>
    <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="CI" id="ci" value="{{$user->CI}}" required >
        <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">
        El ci tiene que ser de 7 a 10 digitos y solo puede contener numeros.
    </p>
</div>

<!-- Grupo: Nombre -->
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="name" class="formulario__label"><b class="colorAste">*</b>&nbsp;Nombre&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Modificar Nombre" data-content="El nombre debe comenzar con mayusculas por jemplo:Jose, solo puede ser letras...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="NOMBRE" id="name" value="{{$user->NOMBRE}}" required >
                <i class="formulario__validacion-estado far fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">
                El nombre debe comenzar con mayusculas.
            </p>
    </div>

<!-- Grupo: Apellidos -->
    <div class="formulario__grupo" id="grupo__apellidos">
        <label for="apellidos" class="formulario__label"><b class="colorAste">*</b>&nbsp;Apellidos&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Modificar Apellidos" data-content="El Apellido debe comenzar con mayusculas por ejemplo:Mercado, solo puede ser letras...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="APELLIDO" id="apellidos" value="{{$user->APELLIDO}}" required>
                <i class="formulario__validacion-estado far fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">
                El Apellido debe comenzar con mayusculas.
            </p>
    </div>

<!-- Grupo: Telefono -->
    <div class="formulario__grupo" id="grupo__telefono">
        <label for="telefono" class="formulario__label">Telefono&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Modificar Telefono" data-content="El telefono solo puede contener numeros por Ej:+(591) 753-164-89, 753.164.89, 753-150-92.">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="TELEFONO" id="telefono"  value="{{ $user->TELEFONO}}" required>
                <i class="formulario__validacion-estado far fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">
                El telefono solo puede contener numeros.
            </p>
    </div>


<!-- Grupo: Usuario -->
    <div class="formulario__grupo" id="grupo__usuario">
        <label for="username" class="formulario__label"><b class="colorAste">*</b>&nbsp;Usuario&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Modificar Nombre de Usuario" data-content="l usuario puede ser de la siguente forma:Jose_123, jose123, jose">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="NOM_USUARIO" id="username" value="{{$user->NOM_USUARIO}}" autocomplete="new-text" required >
                <i class="formulario__validacion-estado far fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">
               El usuario no es correcto.
            </p>
    </div>
<!-- Grupo: Rol -->
    <div class="formulario__grupo" id="grupo__rol">
        <label for="rol" class="formulario__label"><b class="colorAste">*</b>&nbsp;Rol de Usuario&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Modificar Rol Usuario" data-content="Modificar un Rol,en caso no seleccionara ninguno, el sistema por defecto le asiganara el rol de Editor...">?</a>
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
        <label for="password" class="formulario__label {{!isset($user) ? 'requerido' : ' '}}">&nbsp;Contraseña</label>
            <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="password" id="password" >
                    <i class="formulario__validacion-estado far fa-times-circle">
                    </i>
            </div>
            <p class="formulario__input-error">
                La contraseña tiene que ser de 4 a 12 dígitos.
            </p>
    </div>

<!-- Grupo: Password 2 -->
    <div class="formulario__grupo" id="grupo__password2">
        <label for="re_password" class="formulario__label">&nbsp;Repetir Contraseña</label>
        <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="re_password" id="re_password" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Ambas contraseñas deben ser iguales.
        </p>
    </div>
<!-- Grupo: Guardar y Cancelar -->
    <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_users')}}" class="btn formulario__btn2">Cancelar</a>
        <button type="submit" class="formulario__btn1">Modificar</button>
    </div>

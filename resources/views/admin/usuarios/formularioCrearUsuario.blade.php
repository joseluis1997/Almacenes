<div class="col-lg-10 order-lg-0 text-center profile-avatar" id="grupo__foto" >
    {{-- <h2 class="text-center font-weight-light">*Foto de Perfil
        <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de Carnet de Indentid" data-content="Solo puede contener numeros enteros positivos por Ej:81747041">?</a>
    </h2> --}}
    <label  for="ci" id="mostrar" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">Foto De Perfil
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Foto de Perfil" data-content="se permite los siguientes formatos para la foto de perfil, jpg, png,jpeg.">?</a>
    </label> 
    <div id="preview">  
        @if($user->imagen != "")
            <img src="{{ asset('/images/users/'.$user->imagen) }}" class="img img-fluid rounded-circle" alt="avatar" />
        @else
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img img-fluid rounded-circle" alt="User avatar">
        @endif
    </div><br>
    <div class="input-group px-xl-4" >
        <div class="custom-file" >
            <input type="file" class="custom-file-input" name="imagen" id="fileToUpload" >
            <label class="custom-file-label" for="fileToUpload" aria-describedby="inputGroupFileAddon02">Agregar Foto: jpg, jpeg, pgn.<br><br>
            </label>
        </div>
    </div>
</div><br><br><br><br><br><br><br><br><br>
<br>
<!-- Grupo: Ci -->
    <div class="formulario__grupo" id="grupo__ci">
        <label  for="ci" id="mostrar" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Numero de Carnet&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Numero de Carnet de Indentidad" data-content="Solo puede contener numeros enteros positivos por Ej:81747041">?</a>
        </label> 
        <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="CI" id="ci" placeholder="numero de carnet de identidad" value="{{old('CI')}}">    
                <i class="formulario__validacion-estado far fa-times-circle">    
                </i>
        </div>
        <p class="formulario__input-error">
            El ci tiene que ser de 7 a 10 digitos y solo puede contener numeros.
        </p>
    </div>

<!-- Grupo: Nombre -->
    <div class="formulario__grupo" id="grupo__nombre">
        <label for="name" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Nombre&nbsp;&nbsp;
             <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre" data-content="El nombre debe comenzar con mayusculas por jemplo:Jose, solo puede ser letras...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="NOMBRE" id="name" placeholder="nombre de nuevo usuario" value="{{old('NOMBRE')}}">
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El nombre debe comenzar con mayusculas
            </p>
    </div>
            
<!-- Grupo: Apellidos -->
    <div class="formulario__grupo" id="grupo__apellidos">
        <label for="apellidos" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Apellidos&nbsp;&nbsp;
             <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Apellidos" data-content="El Apellido debe comenzar con mayusculas por ejemplo:Mercado, solo puede ser letras...">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="APELLIDO" id="apellidos" placeholder="Apellidos" value="{{ old('APELLIDO') }}" >
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El Apellido debe comenzar con mayusculas.
            </p>
    </div>

<!-- Grupo: Telefono -->
    <div class="formulario__grupo" id="grupo__telefono">
        <label for="telefono" class="formulario__label">Telefono&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Telefono" data-content="El telefono solo puede contener numeros por Ej:+(591) 753-164-89, 753.164.89, 753-150-92.">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="TELEFONO" id="telefono" placeholder="numero de telefono de nuevo usuario" value="{{ old('TELEFONO') }}" >
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El telefono solo puede contener numeros.
            </p>
    </div>

<!-- Grupo: Usuario -->
    <div class="formulario__grupo" id="grupo__usuario">
        <label for="username" class="formulario__label {{isset($user) ? 'requerido' : ' '}}">&nbsp;Usuario&nbsp;&nbsp;
            <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre de Usuario" data-content="El usuario puede ser de la siguente forma:Jose_123, jose123, jose">?</a>
        </label>
            <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="NOM_USUARIO" id="username" placeholder="nombre de usuario" value="{{ old('NOM_USUARIO') }}" >
                <i class="formulario__validacion-estado far fa-times-circle">
                </i>
            </div>
            <p class="formulario__input-error">
                El usuario no es correcto
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
                        <option value="" >Seleccione un Rol</option>
                        @foreach($roles as $key =>$value)
                            @if($key == 2 || $key == 3)
                                @if($user->hasRole($value))
                                    {{-- <option value="{{$value}}" selected >{{$value}}</option> --}}
                                    <!-- <i class="formulario__validacion-estado far fa-times-circle"></i> -->
                                    @else
                                     <option value="{{$value}}">{{$value}}</option>
                                     <!-- <i class="formulario__validacion-estado far fa-times-circle"></i> -->
                                @endif
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
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Datos Enviados</p>
    </div>

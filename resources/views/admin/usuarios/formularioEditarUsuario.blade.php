<!-- Grupo: CI -->
<div class="formulario__grupo" id="grupo__ci">

   <label for="ci" class="formulario__label"><b class="colorAste">*</b> Numero de Carnet&nbsp;&nbsp;<b onmouseover="alert('por favor digite su numero de carnet por ejemplo:8174701, solo puede ser numeros')" class="colorSigno">?</b></label>
    <div class="formulario__grupo-input">

      {{--   <div class="ventana" id="vent">
            <div id="cerrar"><a href="javascript:cerrar()"><img src="{{ asset('images/close.png') }}"></a></div>
            por favor digite su numero de carnet por ejemplo:8174701, solo puede ser numeros
        </div> --}}
        <input type="text" class="formulario__input" name="CI" id="ci" value="{{$user->CI}}" required >
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
                <input type="text" class="formulario__input" name="NOMBRE" id="name" value="{{$user->NOMBRE}}" required >
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
                <input type="text" class="formulario__input" name="APELLIDO" id="apellidos" value="{{$user->APELLIDO}}" required>
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
                <input type="text" class="formulario__input" name="TELEFONO" id="telefono"  value="{{ $user->TELEFONO}}" required>
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
                <input type="text" class="formulario__input" name="NOM_USUARIO" id="username" value="{{$user->NOM_USUARIO}}" autocomplete="new-text" required >
                <i class="formulario__validacion-estado far fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">
                El usuario tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
            </p>
    </div>

<!-- Grupo: Password -->
    <div class="formulario__grupo" id="grupo__password">
        <label for="password" class="formulario__label"><b class="colorAste">*</b>&nbsp;Contraseña</label>
            <div class="formulario__grupo-input">
                <input type="password" class="formulario__input" name="password" id="password" value="{{ $user->password}}" required>
                    <i class="formulario__validacion-estado far fa-times-circle">
                    </i>
            </div>
            <p class="formulario__input-error">
                La contraseña tiene que ser de 4 a 12 dígitos.
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
{{-- Grupo: Foto del Usuario --}}
    <div class="form-group row">
        <label for="roles" class="col-lg-3 col-form-label "><b>Imagen</b></label>
        <div class="col-lg-8">
            <input type="file" placeholder="imagen de perfil" name="imagen">
                @if($user->imagen != "")
                    <img src="{{ asset('/images/users/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px">
                @else
                     <img src="{{ asset('/images/users/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px">
                @endif
        </div>
    </div>
    
<!-- Grupo: Guardar y Cancelar -->
    <div class="formulario__grupo formulario__btn-guardar text-center">
        <a href="{{route('list_users')}}" class="btn formulario__btn2">Cancelar</a>
        <button type="submit" class="formulario__btn1">Modificar</button>
    </div>

 <!-- Grupo: Imagen Usuario -->
{{--     <div class="formulario__grupo" id="grupo__imagen">
        <label for="imagen" class="formulario__label"><b class="colorAste">*</b>&nbsp;Imagen&nbsp;&nbsp;<b onmouseover="abrir(alert('por favor elija una foto para su perfil, solo con extecion jpg, jpeg, png'))" class="colorSigno">?</b></label>
        <div class="formulario__grupo-input">
            <input type="file"  name="imagen" id="imagen" >
            <i class="formulario__validacion-estado far fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">
            Debe asiganar una foto para el perfil del nuevo usuario.
        </p>
    </div> --}}

<!-- carnet de identidad -->
{{-- <div class="form-group row">
    <label for="ci" class="col-lg-3 col-form-label requerido" >Carner de Identidad</label>
    <div class="col-lg-8">
        <input type="text" name="CI" id="isa" class="form-control" value="{{$user->CI}}" required  />
    </div>
</div> --}}

<!-- nombre del usuarioo -->
{{-- <div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label requerido">Nombres</label>
    <div class="col-lg-8">
        <input type="text" name="NOM_USUARIO" id="nombre" class="form-control" value="{{$user->NOM_USUARIO}}" required/>
    </div>

</div> --}}
<!-- Apellidos del usuario -->
{{-- <div class="form-group row">
    <label for="apellidos" class="col-lg-3 col-form-label requerido">Apellidos</label>
    <div class="col-lg-8">
        <input type="text" name="APELLIDO" id="apellidos" class="form-control" value="{{$user->APELLIDO}}" required />
    </div>
</div> --}}
<!-- telefono y/o celular del usuario -->
{{-- <div class="form-group row">
    <label for="telefono" class="col-lg-3 col-form-label">Telefono</label>
    <div class="col-lg-8">
        <input type="text" name="TELEFONO" id="telefono" class="form-control" value="{{ $user->TELEFONO}}" required/>
    </div>
</div> --}}

<!-- nombre usuario -->
{{-- <div class="form-group row">
    <label for="usuario" class="col-lg-3 col-form-label requerido">Usuario</label>
    <div class="col-lg-8">
        <input type="text" name="NOM_USUARIO" id="username" class="form-control" value="{{$user->NOM_USUARIO}}" autocomplete="new-text" required  />
    </div>
</div> --}}

<!-- contrasena -->
{{-- <div class="form-group row">
    <label for="password" class="col-lg-3 col-form-label ">Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" autocomplete="off"   required  />
    </div>
</div> --}}

<!-- roles que va a tener -->
{{-- <div class="form-group row">
    <label for="roles" class="col-lg-3 col-form-label ">Rol</label>
    <div class="col-lg-8">
    <select class="form-control" name="rol">
        @foreach($roles as $key =>$value)
            @if($user->hasRole($value))
                <option value="{{$value}}" selected >{{$value}}</option>
                @else
                 <option value="{{$value}}">{{$value}}</option>
            @endif
        @endforeach
    </select>
    </div>
</div> --}}
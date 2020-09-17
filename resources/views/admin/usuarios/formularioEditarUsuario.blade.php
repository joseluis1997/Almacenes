<!-- carnet de identidad -->
<div class="form-group row">
    <label for="ci" class="col-lg-3 col-form-label requerido" >Carner de Identidad</label>
    <div class="col-lg-8">
        <input type="text" name="ci" id="ci" class="form-control" value="{{$user->ci}}" required  />
    </div>
</div>

<!-- nombre del usuarioo -->
<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label requerido">Nombres</label>
    <div class="col-lg-8">
        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required/>
    </div>

</div>
<!-- Apellidos del usuario -->
<div class="form-group row">
    <label for="apellidos" class="col-lg-3 col-form-label requerido">Apellidos</label>
    <div class="col-lg-8">
        <input type="text" name="lastname" id="lastname" class="form-control" value="{{$user->lastname}}" required />
    </div>
</div>
<!-- telefono y/o celular del usuario -->
<div class="form-group row">
    <label for="telefono" class="col-lg-3 col-form-label">Telefono</label>
    <div class="col-lg-8">
        <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $user->telephone}}" required/>
    </div>
</div>

<!-- nombre usuario -->
<div class="form-group row">
    <label for="usuario" class="col-lg-3 col-form-label requerido">Usuario</label>
    <div class="col-lg-8">
        <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" autocomplete="new-text" required  />
    </div>
</div>

<!-- contrasena -->
<div class="form-group row">
    <label for="password" class="col-lg-3 col-form-label ">Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" autocomplete="off"   required  />
    </div>
</div>

<!-- roles que va a tener -->
<div class="form-group row">
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
</div>

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


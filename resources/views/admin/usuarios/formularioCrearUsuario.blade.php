<div class="form-row">

    <div class="col-md-6 mb-3">
        <label>Nombre</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">N</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre" name="name" value="" required>
        </div>
    </div>



    
    <div class="col-md-6 mb-3">
        <label>Apellido</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">A</span>
            </div>
            <input type="text" class="form-control" placeholder="Apellidos" name="lastname" value="" required>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label>CI</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">CI</span>
            </div>
            <input type="text" class="form-control" placeholder="Numero de Carnet" name="ci" value="" required>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label>Telefono</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">T</span>
            </div>
            <input type="text" class="form-control" placeholder="Numero de Telefono" name="telephone" value="" required>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label>Usuario</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">U</span>
            </div>
            <input type="username" class="form-control" placeholder="Nombre de usuario" name="username" value="" required>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label>Password</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">P</span>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
    </div>
    
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label>Rol</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">U</span>
            </div>
              <select class="form-control" name="rol"  placeholder="Password" >Selecciona una opción
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
    
</div>
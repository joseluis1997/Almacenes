<!-- Grupo: Nombre -->
<div class="formulario__grupo" id="grupo__nombre">
    <label for="nombre" class="formulario__label">Nombre</label>
    <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="name" id="nombre" placeholder="Nombre del Nuevo Rol" value="{{ isset($role) ? $role->name : '' }}">
        <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">
        El nombre del nuevo Rol, Solo puede contener letras.
    </p>
</div>

<hr>
<!-- Grupo: Permisos para el Rol -->
<h3>Lista de Permisos</h3>
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach ($permissions as $item)
                  <li>
                    @if($item->id >=0 && $item->id <=1)
                        <h1>Gestion Usuarios</h1>
                    @endif
                    @if($item->id < 6)
                        <input type="checkbox"
                        id="permissions_{{$item->id}}" 
                        value="{{$item->id}}" 
                        name="permissions[]"
                            @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 

                            @elseif(is_array($permission_rol) && in_array("$item->id",$permission_rol))
                                checked="" 
                            @endif
                        >
                        <label for="permissions_{{$item->id}}" >
                            {{ $item->id }}
                                -
                            {{ $item->name }} 
                        </label>
                    @endif
                </li>

{{--                 <li>
                    @if($item->id >5 && $item->id <=6)
                        <h1>Gestion Roles</h1>
                    @endif

                    @if($item->id >5 && $item->id <=10)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}">
                            <label for="permissions_{{$item->id}}">
                                {{ $item->id }}
                                    -
                                {{ $item->name }}
                            </label>
                    @endif
                </li> --}}

{{--                 <li>
                    @if($item->id >10 && $item->id <=11)
                        <h1>Gestion Partidas</h1>
                    @endif

                    @if($item->id >10 && $item->id <=15)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}">

                            <label for="permissions_{{$item->id}}">
                                {{ $item->id }}
                                    -
                                {{ $item->name }}
                            </label> 
                    @endif
                </li> --}}

{{--                 <li>
                    @if($item->id >15 && $item->id <=16)
                        <h1>Gestion Medidas</h1>
                    @endif

                    @if($item->id >15 && $item->id <=19)
                        <input type="checkbox" name="permissions[]" id="{{ $item->id }}" >{{ $item->name }} 
                    @endif
                </li>
 --}}
            @endforeach
        </ul>
    </div>


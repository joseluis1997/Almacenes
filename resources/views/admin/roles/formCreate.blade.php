<!-- Grupo: Nombre -->
<div class="formulario__grupo" id="grupo__nombre">
    <label for="nombre" class="formulario__label"><b class="colorAste">*</b>Nombre
        <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Nombre Rol" data-content="El nombre para el nuevo rol solo puede contener leltras...">?</a>
    </label>
    <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Nombre del Nuevo Rol" value="{{ isset($role) ? $role->name : '' }}">
        <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">
        El nombre del nuevo Rol, Solo puede contener letras.
    </p>
</div>

<!-- Grupo: Descripcion -->
<div class="formulario__grupo" id="grupo__DescripcionRol">
    <label for="DescripcionRol" class="formulario__label">Descripcion
        <a class="colorSigno"  data-trigger="hover" href="#" data-toggle="popover" title="Descripcion Rol" data-content="Descripcion del nuevo Rol, Solo puede contener letras">?</a>
    </label>
    <div class="input-group">
        <textarea class="form-control formulario__input" id="DescripcionRol" name="descripcion" rows="3"></textarea>
        <i class="formulario__validacion-estado far fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">
        breve Descripcion del  nuevo Rol solo puede contener letras...
    </p>
</div>

<hr>
<!-- Grupo: Permisos para el Rol -->
<h3>Lista de Permisos</h3><br>
<div class="container first">
    <div class="row">
{{-- Grupo: Usuarios --}}
        <div class="formulario__grupo col-md-6" >
            <ul class="list-unstyled">
                @foreach ($permissions as $item)
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
                                @endif
                            >
                            <label for="permissions_{{$item->id}}" >
                                {{ $item->id }}
                                    -
                                {{ $item->name }} 
                            </label><br>
                        @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Roles --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)
                    @if($item->id >5 && $item->id <=6)
                        <h1>Gestion Roles</h1>
                    @endif

                    @if($item->id >5 && $item->id <=10)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Articulos --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)
                    @if($item->id >10 && $item->id <=11)
                        <h1>Gestion Articulos</h1>
                    @endif

                    @if($item->id >20 && $item->id <=25)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Unidad de Medida  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >15 && $item->id <=16)
                        <h1>Gestion Medidas</h1>
                    @endif

                    @if($item->id >15 && $item->id <=20)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{ $item->id }}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                                {{ $item->id }}
                                    -
                                {{ $item->name }}
                        </label><br> 
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Areas  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                 @foreach ($permissions as $item)  
                    @if($item->id >25 && $item->id <=26)
                        <h1>Gestion Areas</h1>
                    @endif

                    @if($item->id >25 && $item->id <=30)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                  @endforeach
            </ul>
        </div>
{{-- Grupo: Partidas  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >10 && $item->id <=11)
                        <h1>Gestion Partidas</h1>
                    @endif

                    @if($item->id >10 && $item->id <=15)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Proveedores  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >30 && $item->id <=31)
                        <h1>Gestion Proveedores</h1>
                    @endif

                    @if($item->id >30 && $item->id <=35)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Cierre de Gestion  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >35 && $item->id <=36)
                        <h1>Gestion Cierre de Gestion</h1>
                    @endif

                    @if($item->id >35 && $item->id <=39)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Stock Almacen  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >39 && $item->id <=40)
                        <h1>Gestion Stock Almacen</h1>
                    @endif

                    @if($item->id >39 && $item->id <=43)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Consumo Directo  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >43 && $item->id <=44)
                        <h1>Gestion Consumo Directo</h1>
                    @endif

                    @if($item->id >43 && $item->id <=47)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Pedidos  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >47 && $item->id <=48)
                        <h1>Gestion Pedidos</h1>
                    @endif

                    @if($item->id >47 && $item->id <=51)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Salidas  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >51 && $item->id <=52)
                        <h1>Gestion Salidas</h1>
                    @endif

                    @if($item->id >51 && $item->id <=55)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
{{-- Grupo: Reportes  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >55 && $item->id <=56)
                        <h1>Gestion Reportes</h1>
                    @endif

                    @if($item->id >55 && $item->id <=68)
                        <input type="checkbox" 
                            name="permissions[]" 
                            id="permissions_{{$item->id}}" 
                            value="{{$item->id}}"
                                @if(is_array(old('permissions')) && in_array("$item->id", old('permissions')))
                                checked="" 
                                @endif
                        >
                        <label for="permissions_{{$item->id}}">
                            {{ $item->id }}
                                -
                            {{ $item->name }}
                        </label><br>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
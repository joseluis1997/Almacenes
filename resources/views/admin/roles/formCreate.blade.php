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
        El nombre no es Correcto.
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
                        @if($item->id < 7)
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
                    @if($item->id >6 && $item->id <=7)
                        <h1>Gestion Roles</h1>
                    @endif

                    @if($item->id >6 && $item->id <=12)
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
                    @if($item->id >24 && $item->id <=25)
                        <h1>Gestion Articulos</h1>
                    @endif

                    @if($item->id >24 && $item->id <=30)
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
                    @if($item->id >18 && $item->id <=19)
                        <h1>Gestion Medidas</h1>
                    @endif

                    @if($item->id >18 && $item->id <=24)
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
                    @if($item->id >30 && $item->id <=31)
                        <h1>Gestion Areas</h1>
                    @endif

                    @if($item->id >30 && $item->id <=36)
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
                    @if($item->id >12 && $item->id <=13)
                        <h1>Gestion Partidas</h1>
                    @endif

                    @if($item->id >12 && $item->id <=18)
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
                    @if($item->id >36 && $item->id <=37)
                        <h1>Gestion Proveedores</h1>
                    @endif

                    @if($item->id >36 && $item->id <=42)
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
{{--         <div class="formulario__grupo col-md-6">
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
        </div> --}}
{{-- Grupo: Stock Almacen  --}}
        <div class="formulario__grupo col-md-6">
            <ul class="list-unstyled" >
                @foreach ($permissions as $item)  
                    @if($item->id >42 && $item->id <=43)
                        <h1>Gestion Compras</h1>
                    @endif

                    @if($item->id >42 && $item->id <=48)
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
                    @if($item->id >48 && $item->id <=49)
                        <h1>Gestion Consumo Directo</h1>
                    @endif

                    @if($item->id >48 && $item->id <=54)
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
                    @if($item->id >54 && $item->id <=55)
                        <h1>Gestion Pedidos</h1>
                    @endif

                    @if($item->id >54 && $item->id <=60)
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
                    @if($item->id >60 && $item->id <=61)
                        <h1>Gestion Salidas</h1>
                    @endif

                    @if($item->id >60 && $item->id <=68)
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
                    @if($item->id >68 && $item->id <=69)
                        <h1>Gestion Reportes</h1>
                    @endif

                    @if($item->id >68 && $item->id <=78)
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
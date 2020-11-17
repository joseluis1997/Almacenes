<html>
    <head>
        <title>Sigadet</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/formulario.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="CONTAINER">

    <div class="login-box">
           @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <div class="alert-text">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
                @endif
        <form method="POST" action="{{ route('login_post') }}"  autocomplete="off">
            @csrf
        <div class="top-box">
        
            <div class="logo" align="center">
                <img src="{{ asset('images/user.png') }}">
            </div>
            <div class="title">
                <h1>Inicio Sesion</h1>
            </div>
            <div class="formulario__grupo" id="grupo__usuario">
                <label for="NOM_USUARIO" class="formulario__label"><b>Usuario</b></label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="NOM_USUARIO" id="NOM_USUARIO" value="{{ old('NOM_USUARIO') }}" required autocomplete="NOM_USUARIO" placeholder="Usuario...">
                    @error('NOM_USUARIO')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            {{-- Grupo: Password --}}
            <div class="formulario__grupo" id="grupo__password">
                <label for="password" class="formulario__label"><b>Contraseña</b></label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" id="password" required name="password" placeholder="Contraseña...">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="formulario__grupo formulario__btn-guardar text-center">
                    <button type="submit" class="formulario__enviarSesion">Iniciar Sesion</button>
            </div>
        </div>
           </form> 
    </div>
 
</div>
 
    </body>
</html>
         

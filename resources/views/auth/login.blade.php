<html>
    <head>
        <title>Sigadet</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="CONTAINER">

    <div class="login-box">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="top-box">
        
            <div class="logo" align="center">
                <img src="{{ asset('images/user.png') }}">
            </div>
            <div class="title">
                <h1>Inicio Sesion</h1>
            </div>
            
            <div class="textbox">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Introduzca Usuario">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="textbox">
                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" type="password" name="" placeholder="Introduzca su contrasena">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <input type="submit"  name="" class="button" value="Iniciar Sesion" align="center">
       
        </div>
           </form> 
    </div>
 
</div>
 
    </body>
</html>
         

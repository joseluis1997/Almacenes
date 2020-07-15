<html>
    <head>
        <title>Sigadet</title>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
            
            <div class="textbox">
                <input id="username" type="text"  name="username" value="{{ old('username') }}" required autocomplete="username" >
                @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="textbox">
                <input id="password" name="password" required  type="password" name=""  >
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
         

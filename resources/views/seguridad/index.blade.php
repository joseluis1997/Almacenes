<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <title>Sigadet</title>
      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
<body>

  <div class="overlay">
    <form method="POST" action="{{ route('login_post') }}">
      @csrf
       <div class="con">
         <header class="head-form">
            <h2>Sigadet</h2>
            <p>Gobierno Autonomo Departamental de Tarija</p>
         </header>
        <br>
        <div class="field-set">
            <!--   user name -->
              <span class="input-item">
                 <i class="fa fa-user-circle"></i>
              </span> 
              <!--   user name Input-->
              <input class="form-input" id="txt-input" type="text" name="NOM_USUARIO" value="{{ old('NOM_USUARIO') }}" placeholder="@UserName" required>
            <br>
            <!--   Password -->
            <span class="input-item">
              <i class="fa fa-key"></i>
             </span>
            <!--   Password Input-->
            <input class="form-input" type="password" placeholder="Password" id="pwd-input"  name="password" required>
       {{--     <span>
              <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
           </span> --}}
            <br>
            <button class="log-in">Incio Sesion</button>
         </div>
      </div>
    </form>
  </div>
<script type="text/javascript">

    function show() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'text');
    }

    function hide() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById("eye").addEventListener("click", function () {
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }, false);
</script>     
</body>
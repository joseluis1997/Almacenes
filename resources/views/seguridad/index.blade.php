<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <title>Sigadet</title>
  </head>
  <body>
    
    <section class="Form my-5 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="{{ asset('images/GobernacionLogo.png') }}" class="img-fluid">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">Sigadet</h1>
            <form method="POST" action="{{ route('login_post') }}">
              @csrf
              {{-- usuario --}}
              <div class="form-row">
                <div class="col-lg-8">
                  <input type="text" placeholder="@usuario"  class="form-control my-3 p-3" name="NOM_USUARIO" value="{{ old('NOM_USUARIO') }}" required>
                </div>
              </div>
              {{-- password --}}
              <div class="form-row">
                <div class="col-lg-8">
                  <input type="password" placeholder="contraseña"  class="form-control my-3 p-3" name="password" required>
                </div>
              </div>
              {{-- button --}}
              <div class="form-row">
                <div class="col-lg-8">
                  <button type="summit" class="btn1 mt-3 mb-5">Iniciar Sesion</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

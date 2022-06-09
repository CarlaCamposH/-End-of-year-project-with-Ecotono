<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">


  <!-- Bootstrap core JS-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <link rel="icon" href="{{ asset('images/logo2.png')  }}" type="image/x-icon" />
  <title>Registro</title>

</head>

<body>



  <div class="todo ">
    <div class="imageArrow">
      <a href="{{ asset('/')  }}"><img src="images/arrow_back.svg2.png" height="50" width="50" alt="arrow_back.svg.png" /></a>
    </div>
    <div class="col-lg-6 div2">

      <!-- Form Register Card -->
      <div class="card border-0 divForm">
        <h1>REGISTRO</h1>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Nombre</label>
              </div>
              <input id="nombre" name="nombre" type="text" placeholder="Introduce tu nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required autocomplete="nombre">
              @error('nombre')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Correo electrónico</label>
              </div>
              <input type="text" id="email" name="email" placeholder="Introduce tu correo" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Provincia</label>
              </div>
              <input type="text" id="provincia" name="provincia" class="form-control @error('provincia') is-invalid @enderror" value="{{ old('provincia') }}" placeholder="Provincia" required autocomplete="provincia">
              @error('provincia')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Ciudad</label>
              </div>
              <input type="text" id="ciudad" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{ old('ciudad') }}" placeholder="Ciudad" required autocomplete="ciudad">
              @error('ciudad')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Código postal</label>
              </div>
              <input type="text" id="Codigo_Postal" name="Codigo_Postal" class="form-control @error('Codigo_Postal') is-invalid @enderror" value="{{ old('Codigo_Postal') }}" placeholder="Código postal" required autocomplete="Codigo_Postal">
              @error('Codigo_Postal')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Calle</label>
              </div>
              <input type="text" id="calle" name="calle" class="form-control @error('calle') is-invalid @enderror" value="{{ old('calle') }}" placeholder="Calle" required autocomplete="calle">
              @error('calle')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Portal</label>
              </div>
              <input type="number" id="portal" name="portal" placeholder="Portal" value="{{ old('portal') }}" class="form-control @error('portal') is-invalid @enderror" required autocomplete="portal">
              @error('portal')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Bloque</label>
              </div>
              <input type="text" id="bloque" name="bloque" placeholder="Bloque" value="{{ old('bloque') }}" class="form-control @error('bloque') is-invalid @enderror" autocomplete="bloque">
              @error('bloque')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Piso</label>
              </div>
              <input type="number" id="piso" name="piso" placeholder="Piso" value="{{ old('piso') }}" class="form-control @error('piso') is-invalid @enderror" required autocomplete="piso">
              @error('piso')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Puerta</label>
              </div>
              <input type="number" id="puerta" name="puerta" placeholder="Puerta" value="{{ old('puerta') }}" class="form-control @error('puerta') is-invalid @enderror" required autocomplete="puerta">
              @error('NumeroPuerta')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-5 col-form-label text-md-left">Contraseña</label>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-75 inputDiv">
              <div class="form-group row title">
                <label class="col-md-7 col-form-label text-md-left">Confirmar contraseña</label>
              </div>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repita la contraseña">
            </div>
            <div class="col-75" style="margin-top:2rem;">
              <input type="radio" required><a> He leído y acepto los términos y condiciones de uso.</a>
            </div>
            <div class="col-75 inputDiv button">
              <input type="submit" value="Registrar" class="btn registerButton text-uppercase">
            </div>
          </div>
      </div>
    </div>
    </form>

    <div class="col-lg-4 div1" id="div1">
      <div class="BlueDiv">
        <h2 class="divTitles"><b><i>Registro.</i></b></h2>
        <h4>¡Crea tu perfil ECO o únete a ECO Family. Es gratis y al instante!</h4>
      </div>
      <div class="divLogo">
        <img src="{{ asset('images/logo.png') }}" width="150" height="150" class="logo"></div>
    </div>
  </div>



</body>

</html>
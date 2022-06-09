<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- our scripts -->
    <script src="{{ asset('js/login.js') }}"></script>
    <link rel="icon" href="{{ asset('images/logo2.png')  }}" type="image/x-icon" />
    <title>Iniciar Sesión</title>


</head>

<body>
    <div class="row">
        <div class="col-lg-4 div1" id="div1">
            <div class="imageArrow">
                <a href="{{ asset('/')  }}"><img src="images/arrow_back.svg.png" height="50" width="50" alt="arrow_back.svg.png" /></a>
            </div>
            <div class="BlueDiv">
                <h2 class="divTitles"><b><i>Conviértete en miembro y descubre un mundo nuevo para tu armario.</i></b></h2>
                <h4>También puedes acceder a tus compras personales más rápido.</h4>

            </div>
            <div class="divLogo">
                <img src="{{ asset('images/logo.png') }}" width="150" height="150" class="logo"></div>
        </div>
        <div class="col-lg-5 div2">
            <!-- Form Register Card -->
            <div class="card border-0 divForm">
                <!-- Page Content-->
                <form method="POST" action="{{ route('login') }}">

                    <h1 class="title">Iniciar Sesión</h1>

                    @csrf

                    <div class="form-group row email-title">
                        <label for="email" class="col-md-7 col-form-label text-md-left">Correo electrónico</label>
                    </div>
                    <div class="email">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group row password-title">
                        <label for="password" class="col-md-5 col-form-label text-md-left">Contraseña</label>
                    </div>
                    <div class="passwordDiv">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-left:2rem; color: #616161">
                        ¿Has olvidado tu contraseña?
                    </a>
                    @endif

                    <div class="form-group remember">
                        <div class="col-md-6">
                            <div class="form-check custom-checkbox">
                                <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label custom-control-label" for="remember">
                                    Recuérdame.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-6">
                        <div class="col-md-4 offset-md-3">
                            <button type="submit" class="btn loginButton text-uppercase">
                                Iniciar sesión
                            </button>

                        </div>
                    </div>
                </form>
                <div class="form-group row mb-6">
                    <div class="col-md-4 offset-md-3">
                        <a href="register" class="btn btn-default buttonRegister text-uppercase">Regístrate</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
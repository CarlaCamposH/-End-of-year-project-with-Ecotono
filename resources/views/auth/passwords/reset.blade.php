<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reestablish.css') }}">

    <!-- our scripts -->
    <link rel="icon" href="{{ asset('images/logo2.png')  }}" type="image/x-icon" />
    <script src="{{ asset('js/login.js') }}"></script>

</head>

<body>
    <div class="todo">
        <div class="imageArrow">
            <a href="/"><img src="{{ asset('images/arrow_back.svg4.png')  }}" height="50" width="50" alt="arrow_back.svg.png" /></a>
        </div>
        <div class="card border-0 divForm">
            <div class="form-group row title2">
                <label for="email" class=" col-form-label text-md-left">CAMBIO DE CONTRASEÑA</label>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="col-75 inputDiv">
                    <div class="form-group row title">
                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Correo electrónico') }}</label>
                    </div>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="col-75 inputDiv">
                    <div class="form-group row title">
                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Contraseña') }}</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="col-75 inputDiv">
                    <div class="form-group row title">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirmar Contraseña') }}</label>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="col-75 inputDiv button">
                    <button type="submit" class="btn registerButton text-uppercase">
                        {{ __('REESTABLECER CONTRASEÑA') }}
                    </button>
                </div>
            </form>
        </div>


        <div class="col-lg-4 div1" id="div1">
            <div class="BlueDiv">
                <h2 class="divTitles"><b>Reestablece aquí su contraseña.</b></h2>
                <h4>Escribe su nueva contraseña para reestablecerla.</h4>
            </div>
            <div class="divLogo">
                <img src="{{ asset('images/logo.png') }}" width="150" height="150" class="logo"></div>
        </div>

    </div>
</body>

</html>
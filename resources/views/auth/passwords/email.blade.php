<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

    <!-- our scripts -->
    <link rel="icon" href="{{ asset('images/logo2.png')  }}" type="image/x-icon" />
    <script src="{{ asset('js/login.js') }}"></script>

</head>

<body>
    <div class="row">
        <div class="col-lg-4 div1" id="div1">
            <div class="imageArrow">
                <a href="/login"><img src="{{ asset('images/arrow_back.svg.png')}}" height="50" width="50" /></a>
            </div>
            <div class="BlueDiv">
                <h2 class="divTitles"><b><i>¿Has olvidado tu contraseña?</i></b></h2>
                <h4>Restablece aquí tu contraseña escribiendo tu correo electrónico.</h4>

            </div>
            <div class="divLogo">
                <img src="{{ asset('images/logo.png') }}" width="150" height="150" class="logo"></div>
        </div>
        <div class="col-lg-6 div2">
            <!-- Form Register Card -->
            <div class="card border-0 divForm">
                <!-- Page Content-->

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="title">
                        <label for="email" class="col-form-label text-md-center email-title"><b>{{ __('INTRODUCE TU CORREO ELECTRÓNICO:') }}</b></label>
                    </div>
                    <div class="email">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="button">
                        <button type="submit" class="btn btn-primary buttonRegister">
                            {{ __('Enviar enlace para cambiar contraseña') }}
                        </button>
                    </div>
                </form>
            </div>
</body>

</html>
@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Método de pago</title>

    <link rel="stylesheet" href="{{ asset('css/buy.css') }}">

</head>

<body>
    <div class="container containerP">
        <div class="row">
            <div class="col">

                <div>
                    <h1 class="titleh1">TU DIRECCIÓN</h1>
                    @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                    @endif



                    <form method="get" action="{{ route('paypal.address') }}">
                        @csrf
                        <div>
                            <div class="col-75">
                                <div class="form-group row title">
                                    <label class="col-md-5 col-form-label text-md-left">Provincia</label>
                                </div>

                                <input type="text" id="provincia" name="provincia" class="form-control inputs @error('provincia') is-invalid @enderror" value="{{ $provincia }}" placeholder="Provincia" required autocomplete="provincia">
                                @error('provincia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-75 ">
                            <div class="form-group row title">
                                <label class="col-md-5 col-form-label text-md-left">Ciudad</label>
                            </div>
                            <input type="text" id="ciudad" name="ciudad" class="form-control inputs @error('ciudad') is-invalid @enderror" value="{{ $ciudad }}" placeholder="Ciudad" required autocomplete="ciudad">
                            @error('ciudad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div>
                <div>
                    <div class="col-75 ">
                        <div class="form-group row title">
                            <label class="col-md-5 col-form-label text-md-left">Código postal</label>
                        </div>
                        <input type="text" id="Codigo_Postal" name="Codigo_Postal" class="form-control inputs @error('Codigo_Postal') is-invalid @enderror" value="{{ $Cpostal }}" placeholder="Código postal" required autocomplete="Codigo_Postal">
                        @error('Codigo_Postal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="col-75 ">
                        <div class="form-group row title">
                            <label class="col-md-5 col-form-label text-md-left">Calle</label>
                        </div>
                        <input type="text" id="calle" name="calle" class="form-control inputs @error('calle') is-invalid @enderror" value="{{ $calle }}" placeholder="Calle" required autocomplete="calle">
                        @error('calle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="col-75 ">
                        <div class="form-group row title">
                            <label class="col-md-5 col-form-label text-md-left">Portal</label>
                        </div>
                        <input type="number" id="portal" name="portal" placeholder="Portal" value="{{ $portal }}" class="form-control inputs @error('portal') is-invalid @enderror" required autocomplete="portal">
                        @error('portal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="col-75 ">
                        <div class="form-group row title">
                            <label class="col-md-5 col-form-label text-md-left">Bloque</label>
                        </div>
                        <input type="text" id="bloque" name="bloque" placeholder="Bloque" value="{{ $bloque }}" class="form-control inputs @error('bloque') is-invalid @enderror" autocomplete="bloque">
                        @error('bloque')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="col-75 ">
                        <div class="form-group row title">
                            <label class="col-md-5 col-form-label text-md-left">Piso</label>
                        </div>
                        <input type="text" id="piso" name="piso" placeholder="Piso" value="{{ $piso }}" class="form-control inputs @error('piso') is-invalid @enderror" required autocomplete="piso">
                        @error('piso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="col-75 ">
                        <div class="form-group row title">
                            <label class="col-md-5 col-form-label text-md-left">Puerta</label>
                        </div>
                        <input type="number" id="puerta" name="puerta" placeholder="Puerta" value="{{ $puerta }}" class="form-control inputs @error('puerta') is-invalid @enderror" required autocomplete="puerta">
                        @error('NumeroPuerta')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn ActBtn">Actualizar Dirección</button>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card border-0 cardC">

                    <h1 class="titleh1 ctitle">CUPÓN</h1>
                    <form action="{{route('buy.checkout')}}" method="get">
                        @csrf
                        <p class="margin">Ingresar código de cupón:</p>
                        <input type="text" name="coupon" id="coupon" class="form-control inputC">
                        <button type="submit" class="btn ActBtn margin">Añadir cupón</button>
                    </form>
                    <svg>
                        <line x1="30" y1="30" x2="250" y2="30" stroke="black" />
                    </svg>


                    <br>
                    <div>
                        <h1 class="titleh1 margin">Precio total:</h1>
                        <h3 class="margin"> {{$total}}€</h3>
                        <form action="{{ route('paypal.pay') }}" method="get">
                            @csrf
                            <button type="submit" class="btn ActBtn2 margin">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-center text-white footerHome">

        <div class="container p-4 pb-0">

            <section class="mb-4">

                <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="#!" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

                <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="#!" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


                <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="#!" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

            </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white divP" href="/">Eco[Tòno]</a>
        </div>
    </footer>

</body>

</html>
@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AÑADIR CUPON</title>
  <link rel="stylesheet" href="{{ asset('css/add.css') }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
</head>

<body>
  @if (\Session::has('mssg'))
  <div class="alert alert-success">
    <ul>
      <li>{!! \Session::get('mssg') !!}</li>
    </ul>
  </div>
  @elseif(\Session::has('error'))
  <div class="alert alert-danger">
    <ul>
      <li>{!! \Session::get('error') !!}</li>
    </ul>
  </div>


  @endif

  <div class="imageArrow">
    <a href="{{ asset('/') }}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
  </div>
  <div class="container containerP">
    <h1 class="title">AÑADIR CUPÓN</h1>
    <form action="{{ url('/coupon/addCouponbbdd') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Introduce nombre del Cupon: </label>
        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
      </div>

      <div class="form-group">
        <label for="description">Introduce el descuento de dicho cupon </label>
        <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}" required>
      </div>
      <br>

      <input id="send_button" type="submit" class="btn addButton" value="Añadir Cupon">
    </form>
  </div>
  <div class="text-center text-white footerHomeAdd2">

    <div class="p-4">

      <section class="mb-4">

        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

      </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white divP" href="{{ asset('/') }}">Eco[Tòno]</a>
    </div>
  </div>
</body>

</html>
@include('partials.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FAILED!</title>
  <link rel="stylesheet" href="{{ asset('css/success.css') }}">
</head>

<body>
  <div class="containerP">
    <div class="container text-center containerC">
      <h1 class="title">¡Hubo un desafortunado error! <i class="far fa-sad-tear"></i></h1>
      <h3>Haz click en el carrito para ir a la tienda</h3>
      <a href="{{route('cart.checkout')}}" class="carrito"><i class="fas fa-shopping-cart"></i></a>
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
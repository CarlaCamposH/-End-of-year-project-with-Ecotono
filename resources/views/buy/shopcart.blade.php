@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>CARRITO</title>
  <link rel="stylesheet" href="{{ asset('css/shopcart.css') }}">
  <script src="{{ asset('js/shopcart.js') }}"></script>
</head>

<body>
  <div class="container containerPrincipal">
    <div class="container containerT">
      <h1 class="title">TU CARRITO!</h1>
    </div>

    <div class="row containerRow">
      <div class="col">
        @if(count(Cart::getContent()))
        <table class="table table-borderless tableT">
          @foreach(Cart::getContent() as $item)
          <tr>
            <td rowspan="3"> <img src="{{URL::asset('/images/productimages/'.$item->image)}}" height=200 width=130></td>
            <td colspan="4"><b class="name">{{$item->name}}</b></td>
          </tr>
          <tr class="name">
            <td>Precio</td>
            <td>Talla</td>
            <td>Cantidad</td>
            <td>Eliminar del carrito</td>
          </tr>

          <tr>
            <td>{{$item->price}}€</td>
            <td>{{$item->size}}</td>
            <td>{{$item->quantity}}</td>
            <td>


              <form action="{{route('cart.removeitem')}}" method="get" style="text-align:center;">
                @csrf
                <input type="hidden" value="{{$item->id}}" name="id">
                <button type="submit" class="btn buttonB"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>

      <div class="col">
        <div class="card border-0 divPago">
          <h2 class="title">TOTAL</h2>
          <p class="contenidoP">Subtotal:</p>
          <svg>
            <line x1="30" y1="30" x2="250" y2="30" stroke="black" />
          </svg>
          <p class="contenidoP">{{$subTotal}}€</p>
          <p class="iconos"><img src="{{asset('/images/PayPal-Logo.png')}}" height=40 width=60> <img src="{{asset('/images/Visa-icon.png')}}" height=40 width=50> <img src="{{asset('/images/mastercard.png')}}" height=40 width=50></p>
          <form action="{{route('paypal.comprar')}}" method="get">
            @csrf
            <button type="submit" class="btn buyB">Comprar</button>
          </form>

          <form action="{{route('cart.clear')}}" method="get">
            @csrf
            <button type="submit" class="btn removeB">Vaciar carrito</button>
          </form>
        </div>

        @else
        <div class="container containerP">
          <h1 class="title">¡Tienes el carrito vacío!</h1>
          <p>Inicia sesión para ver qué artículos te gustan y pásate por nuestra tienda virtual!</p>
          <a href=" {{ asset('/catalogue/news') }}" class="carrito"><i class="fas fa-shopping-cart"></i></a>
        </div>
        @endif
      </div>
    </div>
  </div>
  </div>



  <div class="text-center text-white footerHome">

    <div class="p-4">

      <section class="mb-4">

        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{asset('#')}}" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{asset('#')}}" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{asset('#')}}" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

      </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white divP" href="{{ asset('/') }}">Eco[Tòno]</a>
    </div>
  </div>
</body>

</html>
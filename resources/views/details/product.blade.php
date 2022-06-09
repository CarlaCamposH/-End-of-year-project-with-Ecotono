@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Producto</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/details.css') }}">

</head>

<body>
  @if($producto->id_category == 1)
  <div class="imageArrow">
    <a href=" {{ asset('/catalogue/men') }}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
  </div>
  @endif
  @if($producto->id_category == 2)
  <div class="imageArrow">
    <a href="{{ asset('/catalogue/women') }} "><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
  </div>
  @endif

  <div class="container containerPrincipal">
    <div class="row containerRow">
      <div class="col textos">
        <h1 class="title">{{ $producto->name}}</h1>
        <h2 class="titleh2" for="description"> Descripción <a href=" {{ route('details.review',$producto->id) }}" class="test">Reseñas</a> </h2>
        <p class="description">{{ $producto->description}}</p>
        <h2 class="h2Title">Precio</h2>
        <p class="price">{{$producto->price}}€</p>
        <h2 class="h2Title">Talla</h2>
        @if($producto->stock == 0)
        <form action="{{ route('cart.add') }}" method="get" style="float:left;">
          @csrf
          <input type="hidden" name="id" value="{{$producto->id}}">
          <select name="size" id="size" class="caja" disabled>
            <option value="XS" class="option">XS</option>
            <option value="S" class="option">S</option>
            <option value="M" class="option">M</option>
            <option value="L" class="option">L</option>
            <option value="XL" class="option">XL</option>
          </select>
          <h2 class="h2Title">Cantidad *</h2>
          <select name="quantity" id="quantity" class="form-control numInput" disabled>
            @for ($i = 1; $i <= $producto->stock ; $i++)
              <option value="{{$i}}" class="option">{{$i}}</option>
              @endfor
          </select>
          @else
          <form action="{{ route('cart.add') }}" method="get" style="float:left;">
            @csrf
            <input type="hidden" name="id" value="{{$producto->id}}">
            <select name="size" id="size" class="caja">
              <option value="XS" class="option">XS</option>
              <option value="S" class="option">S</option>
              <option value="M" class="option">M</option>
              <option value="L" class="option">L</option>
              <option value="XL" class="option">XL</option>
            </select>
            <h2 class="h2Title">Cantidad *</h2>
            <select name="quantity" id="quantity" class="form-control numInput">
              @for ($i = 1; $i <= $producto->stock ; $i++)
                <option value="{{$i}}" class="option">{{$i}}</option>
                @endfor
            </select>
            @endif
            @if($producto->stock == 0)
            <input type="submit" value="No hay stock" class="btn addBoton">
            @else
            <input type="submit" value="Añadir al carrito" class="btn addButton">
            @endif
          </form>

          @if(Auth::check() && $comp)
          <form action="{{ url('/details/favoritesbbdd') }}" method="POST" class="heart">

            <input type="hidden" value="{{$producto->id}}" name="id_product">
            @csrf
            <button class="btn heartBtn"><i class="far fa-heart heartI" style="color:black;"></i></button>
          </form>
          @else
          <form action="{{ route('details.deletefavortio',$producto->id) }} " id="{{$producto->id}}" method="get" class="heart">
            @csrf
            <button class="btn heartBtn"><i class="fas fa-heart heartI" style="color:red;"></i></button>
          </form>
          @endif
          <br>
          <br>
          <br><br>
          *Corresponde a la cantidad maxima en stock en este momento
      </div>

      <div class="col fotoDiv">
        <img src="{{url('images/productimages/',$producto->image1) }}" class="myimage">
      </div>
    </div>
  </div>

  <footer class="text-center text-white footerHome">

    <div class="container p-4 pb-0">

      <section class="mb-4">

        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href=" {{ asset('#') }}" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


        <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{ asset('#') }}" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

      </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white divP" href="{{ asset('/') }}">Eco[Tòno]</a>
    </div>
  </footer>
</body>

</html>
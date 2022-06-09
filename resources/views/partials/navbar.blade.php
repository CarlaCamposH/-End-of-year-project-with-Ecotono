<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="icon" href="{{ asset('images/logo2.png')  }}" type="image/x-icon" />

  <!-- ICONS -->
  <script src="https://kit.fontawesome.com/09356bff27.js" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light h-20" id="navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-75 order-1 order-md-0 dual-collapse2 bkBlue" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link texto" href=" {{ url('/faq') }}" style="color: white;">Atención al cliente <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link texto" href=" {{ url('/catalogue/news') }}" style="color: white;">Novedades</a>
        </li>

      </ul>
    </div>

    <div class=" collapse navbar-collapse w-auto bkBlue" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link texto" href=" {{ url('/catalogue/women') }}" style="color: white;">Mujer</a>
        </li>
        <li id="logo">
          <a class="nav-item active" href=" {{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" width="50" height="50" class="logo">
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link texto" href=" {{ url('/catalogue/men') }}" style="color: white;">Hombre</a>
        </li>
      </ul>
    </div>

    <div class="navbar-collapse collapse w-75 order-3 dual-collapse2 bkBlue" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <i class="fas fa-heart testC"></i>
        <li class="nav-item active">
          <a class="nav-link texto" href=" {{ url('/details/favorites') }}" style="color: white;">Favoritos</a>
        </li>
        <img src="{{ asset('images/shopping-cart.svg.png') }}" width="25" height="25" id="shopping-cart">
        <li class="nav-item active">
          @if(count(Cart::getContent()))
          <a class="nav-link texto" href=" {{ route('cart.checkout') }}" style="color: white;">Carrito {{count(Cart::getContent())}}</a>

          @else
          <a class="nav-link texto" href=" {{ route('cart.checkout') }}" style="color: white;">Carrito {{count(Cart::getContent())}}</a>
          @endif


        </li>
        @guest
        <img src="{{ asset('images/avatar-3.svg.png') }}" width="25" height="25" id="login">
        <li class="nav-item active">
          <a class="nav-link texto" href=" {{ url('/login') }}" style="color: white;">Iniciar sesión</a>
        </li>
        @if (Route::has('register'))
        @endif
        @else
        <img src="{{ asset('images/avatar-3.svg.png') }}" width="25" height="25" id="login">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right dropCs" aria-labelledby="navbarDropdown">
            @if(Auth::user()->id_role == 1)
            <a class="dropdown-item" href="{{url('/products/addproduct')}}">
              Añadir productos
            </a>
            @endif
            @if(Auth::user()->id_role == 1)
            <a class="dropdown-item" href="{{url('/products/delete')}}">
              Eliminar y Modificar productos
            </a>
            @endif
            @if(Auth::user()->id_role == 1)
            <a class="dropdown-item" href="{{url('/coupon/addCoupon')}}">
              Añadir Cupon
            </a>
            @endif
            @if(Auth::user()->id_role == 1)
            <a class="dropdown-item" href="{{url('/coupon/delete')}}">
              Eliminar Cupon
            </a>
            @endif
            @if(Auth::user()->id_role == 1)
            <a class="dropdown-item" href="{{url('/products/orders')}}">
              Listar Pedidos
            </a>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Cerrar sesión') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
    </div>
  </nav>
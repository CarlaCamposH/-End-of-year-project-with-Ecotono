@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NOVEDADES</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/news.css') }}">
</head>

<body>
  <div class="imageArrow">
    <a href="{{ asset('/') }}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
  </div>
  <div class="container-fluid containerB">
    <div class="row">
      @foreach ($productos as $item)
      <div class="col-3 producto">
        <a href="{{ route('details.product',$item->id) }}">
          <img onmouseout="this.src=' {{url('images/productimages/',$item->image1) }}';" onmouseover="this.src='{{url('images/productimages/',$item->image2) }}';" src=" {{url('images/productimages/',$item->image1) }}" height="80%" width="100%" />

        </a>
        <div class="textos">
          <h3 class="title"><b>{{$item->name}}</b></h3>
          <div class="precio">
            <p><b>{{$item->price}}€</b></p>
            <form action="{{ route('details.product',$item->id) }}" method="get">
              @csrf
              <button class="btn DButton">DETALLES</button>
            </form>
          </div>
        </div>
      </div>


      @endforeach
    </div>
    {{ $productos->links() }}
  </div>

  <footer class="text-center text-white footerHome">

    <div class="container p-4 pb-0">

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
  </footer>
</body>

</html>
@include('partials.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AÑADIR REVIEW</title>
  <link rel="stylesheet" href="{{ asset('css/review.css') }}">

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="js/jquery.rating.pack.js"></script>
  <script src="{{ asset('js/review.js') }}"></script>
</head>

<body>


  @foreach ($productos as $item)
  <div class="imageArrow">
    <a href="{{ route('details.review',$item->id) }}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
  </div>
  <div class="container containerPrincipal2">
    <form action="{{ url('/details/addreviewbbdd') }}" method="POST" files='true' enctype="multipart/form-data">

      @csrf
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_product" name="id_product" value="{{$item->id}}">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{$id_user}}">
      </div>
      <div class="form-group">
        <h1 class="title">{{$item->name}}</h1>
      </div>
      <label for="puntuacion">Puntuación </label><br>
      <div class="form-group clasificacion">
        <input id="puntuacion1" type="radio" name="puntuacion" value="5">
        <label for="puntuacion1">★</label>
        <input id="puntuacion2" type="radio" name="puntuacion" value="4">
        <label for="puntuacion2">★</label>
        <input id="puntuacion3" type="radio" name="puntuacion" value="3">
        <label for="puntuacion3">★</label>
        <input id="puntuacion4" type="radio" name="puntuacion" value="2">
        <label for="puntuacion4">★</label>
        <input id="puntuacion5" type="radio" name="puntuacion" value="1" checked>
        <label for="puntuacion5">★</label>
      </div>
      <div class="form-group">
        <label for="comentario">Introduce tu comentario sobre el producto: </label><br>
        <textarea class="form-control @error('comentario') is-invalid @enderror " id="comentario" name="comentario" rows="3" value="{{ old('comentario') }}" required></textarea>
        @error('comentario')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <br>
      <input id="send_button" type="submit" value="Add review" class="btn addButton2">

    </form>
    @endforeach
  </div>
  <div class="text-center text-white footerHomeAdd">

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
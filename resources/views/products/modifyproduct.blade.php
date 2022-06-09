@include('partials.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR PRODUCTO</title>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
</head>

<body>
    <div class="imageArrow">
        <a href="{{asset('/products/delete')}}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
    </div>
    <div class="container containerP">
        <h1 class="title">MODIFICAR PRODUCTO</h1>
        @foreach ($productos as $item)
        <form action="{{ url('/products/editproductbbdd') }}" method="POST" files='true' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control input" id="id" name="id" value="{{$item->id}}" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Introduce nombre del producto: </label>
                <input type="nombre" class="form-control input @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{$item->name}}" required>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control input" id="id_category" name="id_category" value="{{$item->id_category}}" readonly>
            </div>

            <div class="form-group">
                <label for="description">Introduce la descripción: </label>
                <input type="text" class="form-control input" id="description" name="description" value="{{$item->description}}"></input>
            </div>

            <div class="form-group">
                <label for="precio">Introduce el precio: </label>
                <input type="precio" class="form-control input @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{$item->price}}" required>
                @error('precio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Introduce el stock del producto: </label>
                <input type="stock" class="form-control input @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{$item->stock}}" required>
                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image1">Inserta la imagen principal del producto: </label>
                <input type="file" class="form-control input" id="image1" name="image1">
            </div>
            <div class="form-group">
                <label for="image2">Inserta la imagen secundaria del producto: </label>
                <input type="file" class="form-control input" id="image2" name="image2">
            </div>
            <div class="form-group">
                <label for="image3">Inserta otra imagen del producto: (*opcional)</label>
                <input type="file" class="form-control input" id="image3" name="image3">
            </div>
            <br>
            <input id="send_button" type="submit" class="btn addButton" value="Editar producto">
        </form>
        @endforeach
    </div>
    <div class="text-center text-white footerHomeAdd">

        <div class="p-4">

            <section class="mb-4">

                <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{asset('#')}}" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

                <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{asset('#')}}" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


                <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="{{asset('#')}}" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

            </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white divP" href="{{asset('/')}}">Eco[Tòno]</a>
        </div>
    </div>
</body>

</html>
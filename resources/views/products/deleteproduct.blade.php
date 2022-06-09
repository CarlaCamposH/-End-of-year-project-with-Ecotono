@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>BORRAR PRODUCTOS</title>
  <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
  <script src="{{ asset('js/delete.js') }}"></script>

</head>

<body>
  @if (\Session::has('mssg'))
  <div class="alert alert-success">
    <ul>
      <li>{!! \Session::get('mssg') !!}</li>
    </ul>
  </div>
  @endif
  @if(isset($error))
  <div class="alert alert-danger">
    <ul>
      <li>No se encontro ningun Producto!</li>
    </ul>
  </div>
  @endif


  <div class="imageArrow">
    <a href="{{ asset('/') }}"><img src="{{ asset('images/arrow_back.svg3.png') }}" height="50" width="50" /></a>
  </div>
  <div class="container containerB">
    <form action="{{ url('/products/search') }}" method='GET' class="form-inline pull-right">
      <label for="name" clas="searchL"><i class="fas fa-search search"></i></label>
      <div class="form-group">
        <input type="text" name="name" id="name" class="form-control searchL">
      </div>
      <div class="form-group">
        <button type="submit" class="btn searchB">
          <span class="glyphicon glyphicon-search">Buscar</span>
        </button>
      </div>

    </form>
    @if(isset($productos))
    <table id="rwd-table-id" class="table table-borderless">
      <tr class="header-row headerR">
        <th>ID </th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>BORRAR</th>
        <th>MODIFICAR</th>
      </tr>
      @foreach ($productos as $item)
      <tr class="tabla_valor">
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}€</td>
        <td>
          <a onclick="Confirmar(this.id)" id="borrar_{{ $loop->index+1 }}" class="aRemove"><i class="fas fa-trash"></i></a>

          <form action="{{ route('products.deleteproduct',$item->id) }}" method="get" id="confirmar{{ $loop->index+1 }}" style="display:none;">
            @csrf
            <button class="btn buttonB">CONFIRMAR </button>
          </form>
          <button class="btn buttonC" onclick="Back()" id="cancelar{{ $loop->index+1 }}" style="display:none;">CANCELAR</button>

        </td>
        <td><a class="btn mod" href="{{ route('products.edit',$item->id) }}">Modificar</a></td>




      </tr>
      @endforeach
    </table>
    @endif

    @if($productos_encontrados < $total_products) <a class="btn listAll" href="{{asset('/products/delete')}}">Listar Todos</a>
      @endif
  </div>


  <footer class="text-center text-white footerHome">

    <div class="container p-4 pb-0">

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
  </footer>
</body>

</html>
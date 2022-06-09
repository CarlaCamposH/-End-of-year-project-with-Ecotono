@include('partials.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ORDENES</title>
  <script src="{{ asset('js/delete.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
</head>

<body>
  <div class="container containerB2">
    <h1 class="title">ORDENES</h1>
  </div>
  <div class="containerB3">

    @if(isset($error))
    <div class="alert alert-danger">
      <ul>
        <li>¡No se encontro ningun Pedido con ese Nombre!</li>
      </ul>
    </div>
    @endif

    <form action="{{ url('/orders/search') }}" method='GET' class="form-inline pull-right">
      <label for="name_user"><i class="fas fa-search search"></i></label>
      <div class="form-group">
        <input type="text" name="name_user" id="name_user" class="form-control searchL">
      </div>
      <div class="form-group">
        <button type="submit" class="btn searchB">
          <span class="glyphicon glyphicon-search">Buscar</span>
        </button>
      </div>
    </form>
    <p class="letraP">* La dirección está ordenada en el siguiente sentido: Provincia - Código postal - Ciudad - Calle - Portal - Bloque (PUEDE NO EXISTIR) - Piso - Puerta</p>

    <table id="rwd-table-id" class="table table-borderless">
      <tr class="header-row headerR">
        <th>ID </th>
        <th>Comprador</th>
        <th>Productos</th>
        <th>Precio</th>
        <th>Direccion*</th>
        <th>Fecha de Compra</th>
        <th><a href=" {{asset('/products/estado')}}" class="test">Estado</a></th>
        <th>Actualizar</th>
      </tr>
      @foreach ($facturas as $item)
      <tr class="tabla_valor">
        <td>{{$item->id}}</td>
        <td>{{$item->name_user}}</td>
        <td style="width:500px;">
          {{$item->productos}}
        </td>
        <td>{{$item->total_price}}€</td>
        <td>{{$item->direccion_de_envio}}</td>
        <td>{{$item->date}}</td>
        <td>{{$item->estado}}</td>
        <td>
          <a onclick="Confirmar(this.id)" id="borrar_{{ $loop->index+1 }}" class="btn searchB text-white">Actualizar</a>
          <form action="{{ route('orders.done',$item->id) }}" method="get" id="confirmar{{ $loop->index+1 }}" style="display:none;">
            @csrf
            <button class="btn buttonC" style="margin-bottom:1.2rem;">CONFIRMAR </button>
          </form>
          <button class="btn buttonB" onclick="Back()" id="cancelar{{ $loop->index+1 }}" style="display:none;">CANCELAR</button>

        </td>


      </tr>
      @endforeach
    </table>
    <a class="btn listAll" href="{{asset('/products/orders')}}">Listar Todos</a>
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
@include('partials.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <!-- Bootstrap CSS -->

  <script src="{{ asset('js/faq.js') }}"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ECO[TÒNO]</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/faq.css') }}">

</head>

<body>
  <div class="bodyFaq">
    <h1 class="title">¿Cómo podemos ayudarte?</h1>
    <h2>Aquí podrás encontrar las respuestas a las preguntas más frecuentes, también podrás ponerte en contacto con nosotros para preguntas más personales.</h2>

    <div class="container">
      <h3 class="title"><b>Temas de interés: </b></h3>
      <div class="row divBody">

        <div class="col botones">
          <button type="button" class="btn botonesfaq" onclick="clickButton1()">Entrega</button>
          <br>
          <button type="button" class="btn botonesfaq" onclick="clickButton2()">Devoluciones</button>
          <br>
          <button type="button" class="btn botonesfaq" onclick="clickButton3()">Pago</button>
          <br>
          <button type="button" class="btn botonesfaq" onclick="clickButton4()">Contacta con nosotros</button>
        </div>
        <div class="col textos">
          <div id="texto_entrega">
            <h2 class="title"> Entrega </h2>
            Recuerda que para recordar el pedido deberá presentar un documento identificativo. Si la persona que va a recordar el pedido es diferente a la que lo ha comprendido, necesitará presentar una autorización escrita y una copia del DNI del comprador.
          </div>

          <div id="texto_devoluciones">
            <h2 class="title"> Devoluciones </h2>
            El reembolso se hará con el mismo método de pago que hayas utilizado en la compra.<br><br>

            Recibirás la confirmación de la devolución por correo electrónico una vez que se haya realizado.<br><br>

            Si pasan más de 14 días y no tienes el reembolso en tu cuenta, por favor, utiliza esta confirmación para presentarla en tu entidad bancaria y que así te puedan ayudar a agilizar el proceso.
          </div>

          <div id="texto_pago">
            <h2 class="title"> Pago </h2>
            Tu compra se cobrará al momento que se envíe el pedido.<br><br>

            Si has pagado con PayPal el cobro se realizará al finalizar la compra.<br><br>

            Algunas entidades bancarias pueden mostrar una preautorización y un cargo real posterior. Este importe se desbloqueará automáticamente. Si no fuera así, te recomendamos que te pongas en contacto con tu entidad bancaria para que agilicen el desbloqueo de la preautorización.
          </div>

          <div id="texto_contactanos">
            <h2 class="title"> Contacta con nosotros </h2>
            <h3><b>Por teléfono</b></h3>
            <p>93 891 91 48</p>
            <h3><b>Por redes sociales</b></h3>
            <section class="mb-4 sect">

              <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="#!" role="button"><img src="{{ asset('images/facebook.svg.png') }}" width="20" height="20"></a>

              <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="#!" role="button"><img src="{{ asset('images/twitter.svg.png') }}" width="20" height="20"></a>


              <a class="btn btn-outline-light btn-floating m-1 btn-circle" href="#!" role="button"><img src="{{ asset('images/instagram.svg.png') }}" width="18" height="20"></a>

            </section>
          </div>
        </div>
      </div>
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
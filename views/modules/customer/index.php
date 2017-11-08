
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/logo.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
  </head>
  <body>
      <div class="wrap--menu" id="wrap--menu">

        <div class="menu--home">
          <img src="views/assets/image/iniciomenu.jpg">
          <div class="menu--title"><a href="#">Inicio</a></div>
        </div>

        <div class="menu--order">
          <img src="views/assets/image/pedidosmenu.jpg" alt="">
          <div class="menu--title"><a href="#">Pedidos</a></div>
        </div>

        <div class="menu--quotation">
          <img src="views/assets/image/cotizaciones.jpg" alt="">
          <div class="menu--title"><a href="#">Cotizaciones</a></div>
        </div>

        <div class="menu--product">
          <img src="views/assets/image/producto.jpg" alt="">
          <span id="close-menu">&times;</span>
          <div class="menu--title"><a href="#">Productos</a></div>
        </div>
      </div>



    <section class="container one">
      <div class="left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
        <img src="views/assets/image/logo.png">
      </div>
      <div class="rigth">
        <ul class="opcions">
          <li><a id="who">¿quienes somos?</a></li>
          <li><a id="our">nuestros servicios</a></li>
          <li><a id="contc">contactanos</a></li>
          <li id="puto"><a id="opc--user"><i class="fa fa-user-o" aria-hidden="true"></i><p>
              <?php echo $_SESSION['CUSTOMER']['NAME'] ?>
        </p></a></li>
        </ul>
        <div id="user--dropdown">
          <a href="miperfil">perfil</a>
          <a href="historial">historial</a>
          <a href="finalizar">finalizar</a>
        </div>
        <div class="welcome">
          <p class="title">bienvenido</p>
          <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
      </div>
    </section>
    <section class="container two">
      <div class="section--one">
        <p>¿quienes somos?</p>
      </div>
      <div class="section--two">
        <div class="section-left">
        <h1>mision</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="section-rigth">
        <h1>vision</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    </section>
    <section class="container three">
      <div class="three--left">
        <h1>nuestros servicios</h1>
        <p><i class="fa fa-check" aria-hidden="true"></i>recarga y remanufactura de toner
          y cartuchos.</p>
        <p><i class="fa fa-check" aria-hidden="true"></i>venta de toner y cartuchos,
          genericos y  originales.</p>
        <p><i class="fa fa-check" aria-hidden="true"></i>matenimiento y reparacion de
          impresoras y computadores.</p>
        <p><i class="fa fa-check" aria-hidden="true"></i>Venta de insumos para oficinas.</p>
      </div>
      <div class="three--rigth">
        <div class="services">

        </div>
      </div>
    </section>
    <section class="container four">
      <div class="four--contact">

          <h1>contactanos</h1>
        <div class="contact--data">
          <p>Telefono: 577 42 23 - 255 75 75</p>
          <p>WhatsApp: 311 708 91 24</p>
          <p>Correo:maxirecargas2009@hotmail.com</p>
          <p>Direccion: Calle 6 c sur # 83a45</p>
        </div>
      </div>
      <div class="four--form">
        <form>
            <div class="wrap--contact">
                <label for="contact--name" class="label-contact">Nombre</label>
                <input type="text" name="data" class="input-contact" value="<?php echo $_SESSION['CUSTOMER']['NAME']?>">
            </div>
            <div class="wrap--contact">
                <label for="contact--email" class="label-contact">Correo</label>
                <input type="email" name="data" class="input-contact" value="<?php echo $_SESSION['CUSTOMER']['MAIL']?>">
            </div>
            <div class="wrap--contact">
                <label for="contact--objetive" class="label-contact ">Objetivo</label>
                <input type="text" name="data" class="input-contact" >
            </div>
            <div class="wrap--contact">
                <label for="contact--message" class="label-contact">Mensaje</label>
                <textarea name="data" rows="1" cols="80"  class="input-contact"></textarea>
            </div>
              <button type="button" name="button">ENVIAR</button>
        </form>
      </div>
    </section>



  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="views/assets/lib/animate/animatescroll.js"> </script>
  <script src="views/assets/lib/parsley/parsley.min.js"></script>
  <script src="views/assets/lib/parsley/es.js"></script>
  <script type="text/javascript" src="views/assets/js/user-customer.js"></script>
  <script type="text/javascript" src="views/assets/js/menu.js"></script>



  </body>
</html>

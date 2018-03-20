
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="views/assets/css/chat.css">
    <link rel="shortcut icon" href="views/assets/image/icn-maxi.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
    <!-- <link rel="stylesheet" href="views/assets/css/ensayo.css"> -->
    <link rel="stylesheet" href="views/assets/css/animate.css">
    <link rel="stylesheet" href="views/assets/css/responsive.css">
  </head>
  <body>
      <div class="wrap--menu" id="wrap--menu">
        <div class="menu--home">
          <img src="views/assets/image/iniciomenu.jpg">
          <div class="menu--title"><a href="maxirecargas">Inicio</a></div>
        </div>
        <div class="menu--order">
          <img src="views/assets/image/pedidosmenu.jpg">
          <div class="menu--title"><a href="pedidos">Pedidos</a></div>
        </div>
        <div class="menu--quotation">
          <img src="views/assets/image/cotizaciones.jpg">
          <div class="menu--title"><a href="cotizacion">Cotizaciones</a></div>
        </div>
        <div class="menu--product">
          <img src="views/assets/image/producto.jpg">
          <span id="close-menu">&times;</span>
          <div class="menu--title"><a href="productos">Productos</a></div>
        </div>
      </div>
        <!-- inicio chat -->
      	<div id="iniciar">
      		<span>Inicia tu conversación</span>
      	</div>
      <?php
      echo "<script>localStorage.setItem('userName', '".$_SESSION['CUSTOMER']['NAME']." ".$_SESSION['CUSTOMER']['LAST_NAME']."');</script>";
      ?>
      <div class="chat_wrapper">
        <div class="chat-header">
          <span>Asistente virtual Maxirecargas</span>
          <span id="cerrar_conversacion">x</span>
        </div>
      	<div class="message_box" id="message_box"></div>
      	<div class="panel">
      			<input type="text" name="message" id="message" placeholder="Message" maxlength="80"
      			onkeydown = "if (event.keyCode == 13)document.getElementById('send-btn').click()"  />
      	</div>
      	<button id="send-btn" class=button>Enviar</button>
      	<button id="finalizarChat" class="button">finalizar</button>
      </div>
      <!-- FIN CHAT -->
      <div id="wrap--menu--mobile">
        <div id="close--mobile">
        &times;
        </div>
        <ul>
          <li><a href="">Inicio</a></li>
          <li><a href="pedidos">Pedidos</a></li>
          <li><a href="cotizacion">Cotizaciones</a></li>
          <li><a href="productos">Productos</a></li>
          <li><a href="miperfil">perfil</a></li>
          <li><a href="historial">historial</a></li>
          <li><a href="finalizar">cerrar sesión</a></li>
        </ul>
      </div>
    <section class="container one" >
      <div class="left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
        <img src="views/assets/image/logo.png" class="animated zoomIn">
      </div>
      <div class="rigth" id="cerrarOpc">
        <ul class="opcions">
          <li><a id="who">¿quiénes somos?</a></li>
          <li><a id="our">nuestros servicios</a></li>
          <li><a id="contc">contáctanos</a></li>
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
          <p class="title animated fadeInRight">bienvenido</p>
         <p class="subtitle animated fadeInRight" id="desMaxi"></p>
          <div class="subtitle-contc animated zoomIn">
            <p><i class="fa fa-phone" aria-hidden="true"></i><span id="tel1"><span></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><span id="tel2"><span></p>
            <p><i class="fa fa-whatsapp" aria-hidden="true"></i><span id="wpp"></span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="container two">
      <div class="section--one animated">
        <p>¿quiénes somos?</p>
      </div>
      <div class="section--two">
        <div class="section-left">
        <div class="two--text animated">
          <h1>misión</h1>
         <p id="mision"></p>
        </div>
        <div class="two--image">
          <img src="views/assets/image/iconPc.png" id="iconPc">
        </div>
      </div>
        <div class="section-rigth">
          <div class="two--image">
            <img src="views/assets/image/iconPrinter.png" id="iconPrinter">
          </div>
          <div class="two--text2 animated">
            <h1>visión</h1>
        <p id="vision"></p>
          </div>
      </div>
      </div>
    </section>
    <section class="container three">
      <div class="three--left">
        <h1 class="threeTitle animated">nuestros servicios</h1>
        <p class="threeItem animated"><i class="fa fa-check" aria-hidden="true"></i>Recarga y Remanufactura de Toner y Cartuchos.</p>
        <p class="threeItem animated"><i class="fa fa-check" aria-hidden="true"></i>Venta de Toner y Cartuchos, Genéricos y  Originales.</p>
        <p class="threeItem animated"><i class="fa fa-check" aria-hidden="true"></i>Matenimiento y Reparación de Impresoras, Computadores y Fotocopiadoras.</p>
        <p class="threeItem animated"><i class="fa fa-check" aria-hidden="true"></i>Venta de insumos para oficinas.</p>
        <button type="submit" name="button">hacer pedido</button>
      </div>
      <div class="three--rigth">
          <img class="imgAnimation" src="views/assets/image/flat/domicilio.png" id="services-domicilio">
          <img class="imgAnimationServ" src="views/assets/image/flat/servicio.png" id="services-servicio">
          <img class="imgAnimation" src="views/assets/image/flat/asistencia.png" id="services-asistencia">
      </div>
    </section>
    <section class="container mediafour">
      <div class="title animated">
        <h1>políticas de medio ambiente</h1>
        <h2 id="politicas"></h2>
      </div>
      <div class="img--ambiente">
        <img src="views/assets/image/ambiente.png">
      </div>
    </section>
    <section class="container four ">
      <div class="four--form">
        <form id="frmContact">
            <div class="wrap--contact">
                <label for="contact--name" class="label-contact">Nombre</label>
                <input type="text" id="name" class="input-contact" value="<?php echo $_SESSION['CUSTOMER']['NAME']?>" >
            </div>
            <div class="wrap--contact">
                <label for="contact--email" class="label-contact">Correo</label>
                <input type="email" id="email" class="input-contact" value="<?php echo $_SESSION['CUSTOMER']['MAIL']?>">
            </div>
            <div class="wrap--contact">
                <label for="contact--objetive" class="label-contact">Asunto</label>
                <input type="text" id="asunto" class="input-contact" >
            </div>
            <div class="wrap--contact">
                <label for="contact--message" class="label-contact">Mensaje</label>
                <textarea id="message" rows="1" cols="80"  class="input-contact"></textarea>
            </div>
              <button type="submit" id="buttonContact" class="btn--contact">ENVIAR</button>
            </form>
      </div>
      <div class="four--contact animated">
        <h1>contáctanos</h1>
        <ul>
          <li><i class="fa fa-phone" aria-hidden="true"></i> <span id="telephone"></span> </li>
          <li><i class="fa fa-whatsapp" aria-hidden="true"></i><span id="smartPhone"></span></li>
          <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span id="emailMaxi"></span></li>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i><span id="dirMaxi"></span></li>
        </ul>
      </div>
    </section>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="views/assets/lib/animate/animatescroll.js"> </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
  <script src="views/assets/js/animation.js"></script>
  <script src="views/assets/lib/parsley/parsley.min.js"></script>
  <script src="views/assets/lib/parsley/es.js"></script>
  <script type="text/javascript" src="views/assets/js/main-user.js"></script>
  <script type="text/javascript" src="views/assets/js/user-customer.js"></script>
  <script type="text/javascript" src="views/assets/js/menu.js"></script>
  <script type="text/javascript" src="views/assets/js/contact.js"></script>
  <script src="views/assets/js/chat/chat.js"></script>


  </body>
</html>

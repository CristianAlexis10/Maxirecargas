
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/icn-maxi.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
    <link rel="stylesheet" href="views/assets/css/ensayo.css">
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
    <section class="container one">
      <div class="left">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
        <img src="views/assets/image/logo.png">
      </div>
      <div class="rigth">
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
          <p class="title">bienvenido</p>
          <p class="subtitle">Para tus Recargas, Remanufactura y Venta de Toner y Cartuchos Genéricos comunícate con Nosotros</p>
          <div class="subtitle-contc">
            <p><i class="fa fa-phone" aria-hidden="true"></i><span id="tel1"><span></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><span id="tel2"><span></p>
            <p><i class="fa fa-whatsapp" aria-hidden="true"></i><span id="wpp"></span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="container two">
      <div class="section--one">
        <p>¿quiénes somos?</p>
      </div>
      <div class="section--two">
        <div class="section-left">
        <div class="two--text">
          <h1>misión</h1>
          <p>Nuestra empresa brinda los más altos estándares de calidad y agilidad, con personal idóneo en cada área de trabajo, para optimizar los resultados de nuestros clientes, quienes son nuestra razón de ser, estamos comprometidos con nuestro servicio al crecimiento del empresario antioqueño.</p>
        </div>
        <div class="two--image">
          <img src="views/assets/image/iconPc.png" id="iconPc">
        </div>
      </div>
        <div class="section-rigth">
          <div class="two--image">
            <img src="views/assets/image/iconPrinter.png" id="iconPrinter">
          </div>
          <div class="two--text">
            <h1>visión</h1>
            <p>En el año 2020 Maxirecargas S.A.S Toner y Cartuchos, será la compañía líder de la región del Valle de Aburrá en la prestación del servicio y distribución de insumos de impresión a pequeñas y medianas empresas tanto del sector público como privado. Estableceremos relaciones internacionales para tener productos únicos de importación.</p>
          </div>
      </div>
      </div>
    </section>
    <section class="container three">
      <div class="three--left">
        <h1>nuestros servicios</h1>
        <p><i class="fa fa-check" aria-hidden="true"></i>Recarga y Remanufactura de Toner y Cartuchos.</p>
        <p><i class="fa fa-check" aria-hidden="true"></i>Venta de Toner y Cartuchos, Genéricos y  Originales.</p>
        <p><i class="fa fa-check" aria-hidden="true"></i>Matenimiento y Reparación de Impresoras, Computadores y Fotocopiadoras.</p>
        <p><i class="fa fa-check" aria-hidden="true"></i>Venta de insumos para oficinas.</p>
        <button type="submit" name="button">hacer pedido</button>
      </div>
      <div class="three--rigth">
          <img src="views/assets/image/flat/domicilio.png" id="services-domicilio">
          <img src="views/assets/image/flat/servicio.png" id="services-servicio">
          <img src="views/assets/image/flat/asistencia.png" id="services-asistencia">
      </div>
    </section>
    <section class="container mediafour">
      <div class="title">
        <h1>políticas de medio ambiente</h1>
        <h2>maxirecargas s.a.s coprometido con el medio ambiente trabaja de la mano de empresas con el conocimiento en el manejo de los desechos que se producen día a día en su labor para generar menos contaminantes en nuestro planeta. </h2>
      </div>
      <div class="img--ambiente">
        <img src="views/assets/image/ambiente.png">
      </div>
    </section>
    <section class="container four">
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
      <div class="four--contact">
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
  <script src="views/assets/lib/parsley/parsley.min.js"></script>
  <script src="views/assets/lib/parsley/es.js"></script>
  <script type="text/javascript" src="views/assets/js/main-user.js"></script>
  <script type="text/javascript" src="views/assets/js/user-customer.js"></script>
  <script type="text/javascript" src="views/assets/js/menu.js"></script>
    <script type="text/javascript" src="views/assets/js/contact.js"></script>



  </body>
</html>

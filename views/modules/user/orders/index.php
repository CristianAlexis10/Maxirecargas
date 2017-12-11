<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/logo.png">
    <link rel="stylesheet" href="views/assets/css/copepr.css">
  </head>
  <body>
    <div class="order--fondo">
      <div id="order--formone">
        <div class="orderSuperior">
          <h1>datos del producto</h1>
          <p>Ingresa el Producto y Servicio que deseas Solicitar.</p>
        </div>
        <div class="container--form">
          <form>
            <div class="form-groupuser3">
              <label for="servicio" class="labelselect3">servicio</label>
              <select class="selectuser3" id="servicio">
                <option>cosa</option>
                <option>cosa2</option>
              </select>
            </div>
            <div class="form-groupuser3">
              <label for="producto" class="labelselect3">producto</label>
              <select class="selectuser3" id="producto">
                <option>cosapr</option>
                <option>cosapr2</option>
              </select>
            </div>
            <div class="juntos">
              <div class="form-groupuser2">
                <label for="referencia" class="labeluser3">referencia</label>
                <input id="referencia" class="inputuser3">
              </div>
              <div class="form-groupuser3">
                <label for="cant" class="labeluser3">cantidad</label>
                <input id="cant" class="inputuser3">
              </div>
            </div>
            <div class="form-groupuser3">
              <label for="observ" class="labeluser3">observaciones</label>
              <textarea name="name" rows="2" cols="100" id="observ" class="inputuser3"></textarea>
            </div>
          </form>
        </div>
        <!--  lpera te dejo aca el espacio para que ponga esos botones mas abajo estara el otro espacio-->
        <button type="button" id="orderSiguiente">siguiente</button>
      </div>
      <div id="order--formtwo">
        <div class="orderSuperior">
          <h1>confirmar direccion</h1>
          <p>¿Esta es la direccion donde se solicita el pedido?</p>
          <h2>direccion</h2>
        </div>
        <div class="container--form">
          <form>
              <div class="form-groupuser2 " id="otraDir">
                <label for="Direc" class="labeluser2">referencia</label>
                <input id="Direc" class="inputuser2">
              </div>
              <div class="Orderbtn2">
                <button type="button">aceptar</button>
                <button type="button" id="btnOtraDir">otra direccion</button>
              </div>
          </form>
        </div>
        <!-- AQUIIIIIII -->
        <button type="button" id="orderAtras">atras</button>
      </div>
    </div>
    <div id="order--container">
      <div class="order--contenido">
        <div class="order--left">
          <div class="left--superior">
            <h1>haz</h1>
            <h1>tu</h1>
            <h1>pedido</h1>
          </div>
        </div>
        <div class="order--rigth">
          <div class="right--superior">
            <h1>haz</h1>
            <h1>tu</h1>
            <h1>pedido</h1>
          </div>
        </div>
      </div>
    </div>
    <span class="menuorder"><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>





    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="views/assets/js/copepr.js"></script>
    <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
  </body>
</html>

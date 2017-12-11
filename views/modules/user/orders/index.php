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
          <h1>datos de product</h1>
          <p>ingresa el producto y servicio que deseas solicitar.</p>
        </div>
        <div class="container--form">
          <form>
            <div class="form-groupuser2">
              <label for="servicio">servicio</label>
              <select class="selectuser2" id="servicio">
                <option>cosa</option>
                <option>cosa2</option>
              </select>
            </div>
            <div class="form-groupuser2">
              <label for="producto">producto</label>
              <select class="selectuser2" id="producto">
                <option>cosapr</option>
                <option>cosapr2</option>
              </select>
            </div>
            <div class="juntos">
              <div class="form-groupuser2">
                <label for="referencia" class="labeluser3">referencia</label>
                <input id="referencia" class="inputuser3">
              </div>
              <div class="form-groupuser2">
                <label for="cant" class="labeluser3">cantidad</label>
                <input id="cant" class="inputuser3">
              </div>
            </div>
            <div class="form-groupuser2">
              <label for="observ">observaciones</label>
              <textarea name="name" rows="8" cols="80" id="observ" class="inputuser3"></textarea>
            </div>
          </form>
        </div>
        <button type="button" id="orderSiguiente">siguiente</button>
      </div>
      <div id="order--formtwo">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button type="button" id="orderAtras">atras</button>
      </div>
    </div>
    <div id="order--container">
      <div class="order--contenido">
        <div class="order--left">
          <div class="left--superior">
            <h1>haz tu pedido</h1>
          </div>
        </div>
        <div class="order--rigth">
          <div class="right--superior">
            <h1>haz tu pedido</h1>
          </div>
        </div>
      </div>
    </div>




    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="views/assets/js/copepr.js"></script>
    <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
  </body>
</html>

<!DOCTYPE html>
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


    <div class="main--container">
      <div class="left--part">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
        <div class="square"><p>Haz tu pedido</p></div>
        <div class="container--title">
          <p class="container-title-order">Pedido</p>
        </div>
      </div>

      <div class="rigth--part">
        <p class="title--right">Datos del producto</p>

        <form class="" action="index.html" method="post">

      <div class="product--form">
        <form>
          <div class="wrap--product">

            <label for="name--product">Servicio de</label>
            <select class="select--product" name="data">
              <option value="">Recarga de toner</option>
            </select>

            <label for="name--product">Para</label>
            <select class="select--for" name="data">
              <option value="">Impresoras</option>
            </select>

            <label for="name--product" class="label--reference">Referencia</label>
            <input type="text" name="data" class="reference">
            </select>

            <label for="name--quantity">Cantidad</label>
            <input type="number" name="data" class="quantity" min="1">

            <label for="name--description">Descripcion del problema</label>
            <textarea name="data" rows="1" cols="80" class="description"></textarea>

            <button class="button--following"><a href="#">Siguiente</a></button>
            <button class="button--register"><a href="#">Registrar otro producto</a></button>

          </div>
        </form>
          </div>
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="views/assets/lib/animate/animatescroll.js"> </script>
    <script src="views/assets/lib/parsley/parsley.min.js"></script>
    <script src="views/assets/lib/parsley/es.js"></script>
    <script type="text/javascript" src="views/assets/js/main-user.js"></script>
    <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>

  </body>
</html>

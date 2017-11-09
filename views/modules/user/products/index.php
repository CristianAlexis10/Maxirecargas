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

    <div class="main--container--product">
      <div class="left--part--product">
          <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
          <div class="title--main">
            <p>Nuestros productos</p>
          </div>

        <div class="wrap--form">
          <div class="container--form">

          <form class="form--products" action="" method="post" name="formulario--products">
          <div class="container--search">
            <span><i class="fa fa-search" aria-hidden="true" id="buscar"></i></span>
            <label for="label--search" class="label--search">Buscar...</label>
            <input type="text" name="data" class="input--search">
          </div>

          <div class="container--filter">
            <label for="label--filter" class="title--secundario">Filtrar por:</label>
          </div>

          <div class="container--popular">
            <div class="input--group">
              <input type="radio" name="data" value="" class="radio--button">
              <label for="label--firstradio">Populares</label>
            </div>
          </div>

          <div class="container--products">
            <label for="label--list--products" class="title--secundario">Productos:</label>

            <div class="input--group">
              <input type="radio" name="data" id="first--products" class="radio--button">
              <label for="first--product">Toner</label>
            </div>

            <div class="input--group">
              <input type="radio" name="data" id="second--product"class="radio--button">
              <label for="second--product">Cartuchos</label>
            </div>

            <div class="input--group">
              <input type="radio" name="data" id="third--product" class="radio--button">
              <label for="third--product">Impresoras</label>
            </div>

            <div class="input--group">
              <input type="radio" name="data" id="fourth--product" class="radio--button">
              <label for="fourth--product">Computadores</label>
            </div>

            <div class="input--group">
              <input type="radio" name="data" id="fifth--product" class="radio--button">
              <label for="fifth--product">Papelería</label>
            </div>

              <button type="button" name="button" class="button--search" id="bton-search">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

        <div class="right--part--product">



    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="views/assets/lib/animate/animatescroll.js"> </script>
    <script src="views/assets/lib/parsley/parsley.min.js"></script>
    <script src="views/assets/lib/parsley/es.js"></script>
    <script type="text/javascript" src="views/assets/js/main-user.js"></script>
    <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>

  </body>
</html>

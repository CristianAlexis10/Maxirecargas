<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/logo.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
    <link rel="stylesheet" href="views/assets/css/profile.css">
  </head>
  <body>
    <div class="container--profile">
      <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
      <div class="content--profile">
        <div class="profile--left">
          <p>editar informacion personal</p>
          <form class="" action="index.html" method="post">
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="name" class="label--profile">primer nombre</label>
              <input type="text" class="input--profile" id="name">
            </div>
            <div class="form-profile">
              <label for="secondname" class="label--profile">segundo nombre</label>
              <input type="text" class="input--profile" id="secondname">
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="lastname" class="label--profile">primer apellido</label>
              <input type="text" class="input--profile" id="lastname">
            </div>
            <div class="form-profile">
              <label for="secondlast" class="label--profile">segundo apellido</label>
              <input type="text" class="input--profile" id="secondlast">
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="email" class="label--profile">correo</label>
              <input type="email" class="input--profile" id="email">
            </div>
            <div class="form-profile">
              <label for="telphone" class="label--profile">telefono:</label>
              <input type="text" class="input--profile" id="telphone">
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="country" class="label--profile">cuidad</label>
              <select class="input--profile" id="country"></select>
            </div>
            <div class="form-profile">
              <label for="address" class="label--profile">direccion:</label>
              <input type="text" class="input--profile" id="address">
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="celphone" class="label--profile">celular</label>
              <input type="number" id="celphone" class="input--profile">
            </div>
            <div class="form-profile">
              <label for="datana" class="label--profile">fecha de nacimiento:</label>
              <input type="date" class="input--profile" id="datana">
            </div>
          </div>
          <div class="formbtn-profile">
            <button type="submit" name="button" id="btndata">guardar cambios</button>
          </div>
        </form>
          <p>cambiar contraseña</p>
          <form class="" action="index.html" method="post">
            <div class="container--oneinput">
              <div class="form-profile">
                <label for="password" class="label--profile">contraseña:</label>
                <input type="password" id="password" class="input--profile">
              </div>
              <div class="form-profile">
                <label for="confirmCon" class="label--profile">confirmar contraseña:</label>
                <input type="password" class="input--profile" id="confirmCon">
              </div>
            </div>
            <div class="formbtn-profile">
              <button type="submit" name="button" id="btnpassword">guardar cambios</button>
            </div>
          </form>
          </div>
        <div class="profile--right">
          <p>editar foto</p>
          <div class="cuadrito"></div>
        </div>

      </div>
    </div>


  </body>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="views/assets/js/profile.js"></script>
  <script type="text/javascript" src="views/assets/js/user-customer.js"></script>
  <script type="text/javascript" src="views/assets/js/menu.js"></script>

</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Recuperar contraseña</title>
    <link rel="shortcut icon" href="views/assets/image/logo.png">
    <link rel="stylesheet" href="views/assets/css/error.css">
    <link rel="stylesheet" href="views/assets/css/responsiveError.css">
  </head>
  <body>
    <div class="container--error ">
      <img src="views/assets/image/logo.png">
      <div class="error">
        <h3>Recuperar mi contraseña</h3>
        <p>Ingresa tu documento y espera nuestro correo de confirmación.</p>
    </div>
    <div class="container--forms">
      <form id="recoverPas">
          <div class="frm-group">
              <label for="documento">Número de documento: </label>
              <input type="number" class="input" id="documento" required>
          </div>
              <input type="submit" class="btn" value="Enviar codigo al correo" >
      </form>
      <form id="ingresarCodigo">
          <div class="frm-group">
              <label for="codigo">Ingresa tú código: </label>
              <input type="text" class="input" id="codigo" required>
          </div>
          <div class="frm-group">
              <label for="new">Nueva contraseña: </label>
              <input type="password" class="input" id="new" required>
          </div>
          <div class="frm-group">
              <label for="new2">Repetir contraseña: </label>
              <input type="password" class="input" id="new2" required>
          </div>

              <input type="submit" class="btn" value="Recuperar" >

      </form>
    </div>
      <div class="figura1"></div>
      <div class="figura2"></div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="views/assets/lib/shortcut/shortcut.js"> </script>
    <script type="text/javascript" src="views/assets/js/security.js"></script>
    <script src="views/assets/js/recoverpass.js"> </script>
  </body>
</html>

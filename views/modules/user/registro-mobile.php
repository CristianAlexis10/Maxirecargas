<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/icn-maxi.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
    <link rel="stylesheet" href="views/assets/css/registrarMobile.css">
    <link rel="stylesheet" href="views/assets/css/responsive.css">
  </head>
  <body>
    <div class="registrar--mobile">
      <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
      <h1>Crea tu cusvsventa</h1>
      <p>Registrate y conoce los beneficios que tenemos para ti</p>
      <div class="form-group type--user">
        <label for="tipo_usu" class="select" >Tipo de Usuario:</label>
        <select class="input"  id="tipo_usu" required>
          <option value="natural">persona natural</option>
          <option value="juridica">persona juridica</option>
        </select>
      </div>
      <form id="frmNewUserMobile">
        <div class="normalMobile">
        <div id="normalMobile--part1">
          <div class="form-group">
            <label for="tip_doc" class="select">Tipo de Documento:</label>
            <select class="input" id="tip_doc" name="data"  required></select>
          </div>
          <div class="form-group">
            <label for="numDoc" class="label">Numero de Documento:</label>
            <input type="number"  id="numDoc" class="input" name="data" required>
          </div>
          <div class="form-group">
            <label for="priNom" class="label">Nombre:</label>
            <input type="text"  id="priNom" class="input" name="data"  required>
          </div>
          <div class="form-group">
            <label for="priApe" class="label">Apellido:</label>
            <input type="text" id="priApe" class="input" name="data" required>
          </div>
          <button type="button" id="normalIrParte2">siguiente</button>
        </div>
        <div id="normalMobile--part2">
          <div class="form-group">
            <label for="correo" class="label">Correo:</label>
            <input type="email" class=" input" id="correo" name="data" required>
          </div>
          <div class="form-group">
            <label for="tel" class="label">Telefono:</label>
            <input type="number" class="input" id="tel"  name="data" required>
          </div>
          <div id="selectAutocomplete">

          </div>

          <div class="form-group">
            <label for="dir" class="label">Dirección:</label>
            <input type="text" name="data"  id="dir" class="input"  required>
          </div>
          <button type="button"  id="irAtras">atras</button>
          <button type="button" id="normalIrParte3">siguiente</button>

        </div>
        <div id="normalMoibile--part3">
          <div class="form-group">
            <label for="sexo" class="required select">Sexo:</label>
            <select class="dataCl input"  id="sexo" required>
              <option value="femenino">Femenino</option>
              <option value="masculino">Masculino</option>
            </select>
          </div>
          <div class="customers--password">
          <div class="form-group" id="error-regPassword">
              <label for="contra" class="label">Contraseña:</label>
              <input type="password" name="data" id="contra" class="input dataCl" required>
          </div>
          <div class="form-group" id="error-regPassword-repite">
              <label for="rep_contra" class="label">Repetir Contraseña:</label>
              <input type="password" name="data" id="rep_contra" class="input dataCl" required disabled>
            </div>
            <div class="form-group">
              <button class="btn" disabled id="registrar">Registrar Cliente</button>
            </div>
            <button type="button" id="irAtras2">atras</button>
          </div>
        </div>
      </div>
      </form>
      
  </div>




    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="views/assets/js/registrate.js"></script>
    <!-- <script type="text/javascript" src="views/assets/js/main-user.js"></script>
    <script type="text/javascript" src="views/assets/js/contact.js"></script> -->
    <!-- <script type="text/javascript" src="views/assets/js/menu.js"></script> -->

  </body>
  </html>

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
    <?php require_once "views/include/customer/scope.menu.php";?>
    <div class="registrar--mobile">
      <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
      <div class="container--registrar--mobile">
        <h1>Crea tu cuenta</h1>
        <p>Regístrate y descubre los beneficios que tenemos para ti</p>
        <div class="form-group type--user">
          <label for="tipo_usu" class="select" >Tipo de Usuario:</label>
          <select class="input"  id="tipo_usu" required>
            <option value="natural">Persona natural</option>
            <option value="juridica">Persona juridica</option>
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
                <label for="numDoc" class="label">Número de Documento:</label>
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
              <button type="button" id="normalIrParte2">Siguiente</button>
            </div>
            <div id="normalMobile--part2">
              <div class="form-group">
                <label for="correo" class="label">Correo:</label>
                <input type="email" class=" input" id="correo" name="data" required>
              </div>
              <div class="form-group">
                <label for="tel" class="label">Teléfono:</label>
                <input type="number" class="input" id="tel"  name="data" required>
              </div>
              <div id="selectAutocomplete">

              </div>

              <div class="form-group">
                <label for="dir" class="label">Dirección:</label>
                <input type="text" name="data"  id="dir" class="input"  required>
              </div>
              <button type="button"  id="irAtras">Atrás</button>
              <button type="button" id="normalIrParte3">Siguiente</button>

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
                <button type="button" id="irAtras2">Atrás</button>
              </div>
            </div>
          </div>
        </form>
        <form id="frmNewBusiMobile">
          <div class="businessMobile">
            <div id="businessMobile--parte1">
              <h1>Datos de la empresa</h1>
              <div class="form-group">
                <label for="nitMobile" class="label">NIT</label>
                <input type="text" class="dataEmp input" id="nitMobile" required>
              </div>
              <div class="form-group">
                <label for="socialMobile" class="label">Razón social</label>
                <input type="text" class="dataEmp input" id="socialMobile" required>
              </div>
              <div class="form-group">
                <label for="namebusMobile" class="label">Nombre de la empresa</label>
                <input type="text" class="dataEmp input" id="namebusMobile" required>
              </div>
              <button type="button" id="businessIrParte2">Siguiente</button>
            </div>
            <div id="businessMobile--parte2">
              <h1>Datos de la sede</h1>
              <div class="form-group">
                <label for="sed-nomMobile" class="label">Nombre de la sede</label>
                <input type="text" class="dataEmp input" id="sed-nomMobile" required>
              </div>
              <div class="form-group">
                <label for="sede-dirMobile" class="label">Dirección</label>
                <input type="text" class="dataEmp input" id="sede-dirMobile" required>
              </div>
              <div class="form-group">
                <label for="sede-telMobile" class="label">Telefono</label>
                <input type="number" class="dataEmp input" id="sede-telMobile" required>
              </div>
              <button type="button" id="irAtrasbusiMobile">Atrás</button>
              <button type="button" id="businessIrParte3Mobile">Siguiente</button>
            </div>
            <div id="businessMobile--parte3">
              <h1>Datos del contacto</h1>
              <div class="form-group">
                <label for="tip_docMobile" class="select">Tipo de documento</label>
                <select class="dataEmp input" id="tip_doc2Mobile">
                  <option value="1">Cédula</option>
                </select>
              </div>
              <div class="form-group">
                <label for="numDocEmpMobile" class="label">Número de documento</label>
                <input type="text" class="dataEmp input" id="numDocEmpMobile" required>
              </div>
              <div class="form-group">
                <label for="sede-encMobile" class="label">Nombre del contacto</label>
                <input type="text" class="dataEmp input"  id="sede-encMobile" required>
              </div>
              <div class="form-group">
                <label for="sede-enc-apeMobile" class="label">Apellido del contacto</label>
                <input type="text" class="dataEmp input"  id="esta_jodaMobile" required>
              </div>

              <div id="selectAutocomplete">
                <select class="dataEmp input" id="cuidad2Mobile">
                  <option value="">Medellín</option>
                </select>
              </div>
              <button type="button" id="irAtras3busiMobile">Atrás</button>
              <button type="button" id="businessIrParte4Mobile">Siguiente</button>

            </div>
            <div id="businessMobile--parte4">
              <div class="form-group">
                <label for="sede-extMobile" class="label">Ext</label>
                <input type="number" class="dataEmp input"  id="sede-extMobile" required>
              </div>
              <div class="form-group">
                <label for="sede-correoMobile" class="label">Correo</label>
                <input type="email" class="dataEmp input"  id="sede-correoMobile" required>
              </div>
              <div class="form-group">
                <label for="cargoMobile" class="label">Cargo:</label>
                <input type="text"  id="cargoMobile" class="input dataEmp" required>
              </div>
              <div class="form-group">
                <label for="contraEmpMobile" class="label">Contraseña:</label>
                <input type="password"  id="contraEmpMobile" class="input dataEmp" required>
              </div>
              <div class="form-group">
                <label for="rep_contraEmpMobile" class="label">Repetir Contraseña:</label>
                <input type="password"  id="rep_contraEmpMobile" class="input dataEmp" required >
              </div>
              <div class="form-group">
                <button class="btn"  id="registrarEmpMobile">Registrar Empresa</button>
              </div>
              <button type="button" id="irAtras4busiMobile">Atrás</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="views/assets/js/registrate.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
    <!-- <script type="text/javascript" src="views/assets/js/main-user.js"></script>
    <script type="text/javascript" src="views/assets/js/contact.js"></script> -->

  </body>
  </html>

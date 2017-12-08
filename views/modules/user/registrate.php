<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/logo.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <style>
    .form-section{
      display: none;
    }

    .form-section.current{
      display: inherit;
    }

    </style>
  </head>

  <body>
    <div class="fondoimagenes">
      <div class="imagenes--left"></div>
      <div class="imagenes--rigth"></div>
    </div>
    <div id="formularios--run">
      <div class="contenido--run">
        <div class="runform--left">

        <div class="runform--contenido">
          <h1>Crea tu cuenta</h1>
          <p id="parralert">registrate y conoce los beneficios que tenemos para ti</p>
          <div class="main--container--quotation">
            <div class="left--part--quotation">
              <!-- <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span> -->
            <div class="form-group type--user">
                <label for="tipo_usu" class="select" >Tipo de Usuario:</label>
                <select class="input"  id="tipo_usu" required></select>
            </div>
            <form class="frmNewUser">
              <div class="customers--normal">
                <div class="form-section">
                  <div class="form-group">
                    <label for="tip_doc" class="select">Tipo de Documento:</label>
                    <select class="dataCl dataEmp input form-control" id="tip_doc" name="data"  required></select>
                  </div>
                  <div class="form-group">
                    <label for="numDoc" class="label">Numero de Documento:</label>
                    <input type="number"  id="numDoc" class="input dataCl form-control" name="data" required>
                  </div>
                  <div class="form-group">
                    <label for="priNom" class="label">Nombre:</label>
                    <input type="text"  id="priNom" class="input dataCl form-control" name="data"  required>
                  </div>
                  <div class="form-group">
                    <label for="priApe" class="label">Apellido:</label>
                    <input type="text" id="priApe" class="input dataCl form-control" name="data" required>
                  </div>
                  <div class="form-group">
                    <label for="correo" class="label">Correo:</label>
                    <input type="email" class=" input dataCl form-control" id="correo" name="data" required>
                  </div>
                  <div class="form-group">
                    <label for="tel" class="label">Telefono:</label>
                    <input type="number" class="input dataCl form-control" id="tel" name="data" required>
                  </div>
                  <!-- <button type="button" id="normalIrParte2"  onclick="validarNormalOne()">siguiente</button> -->
                </div>
                <div class="form-section">
                  <div class="form-group">
                    <label for="cuidad" class="required">Ciudad:</label>
                    <select class="dataCl input form-control "  id="cuidad" required> </select>
                  </div>
                  <div class="form-group">
                    <label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
                    <input type="date" name="data"  id="fecha_naci" class="input dataCl form-control" max="2005-01-01" min="1950-01-01" required>
                  </div>
                  <div class="form-group">
                    <label for="sexo" class="required ">Sexo:</label>
                    <select class="dataCl input form-control"  id="sexo" required>
                      <option value="femenino">Femenino</option>
                      <option value="masculino">Masculino</option>
                    </select>
                  </div>
                  <div class="customers--password">
                  <div class="form-group">
                      <label for="contra" class="label">Contraseñasda:</label>
                      <input type="password" name="data" id="contra" class="input dataCl form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="rep_contra" class="label">Repetir Contraseña:</label>
                      <input type="password" name="data" id="rep_contra" class="input dataCl form-control" required disabled>
                    </div>
                    <!-- <div class="form-group">
                      <input type="submit" id="irAtras" value="atras">
                      <button class="btn" disabled id="registrar">Registrar Cliente</button>
                    </div> -->
                  </div>
                </div>
                <div class="form-navigation">
                  <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
                  <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
                  <input type="submit" class="btn btn-default pull-right">
                  <span class="clearfix"></span>
                </div>
              </div>
            </form>
              <!-- <div class="customers--business">
                  <form id="frmNewBusi" >
                    <div id="form--section">
                      <h1>Datos de la empresa</h1>
                      <div class="form-group">
                          <label for="nit" class="label">NIT</label>
                          <input type="text" class="dataEmp input" id="nit" required>
                      </div>
                      <div class="form-group">
                          <label for="social" class="label">Razon social</label>
                          <input type="text" class="dataEmp input" id="social"required>
                      </div>
                      <div class="form-group">
                          <label for="namebus" class="label">Nombre de la empresa</label>
                          <input type="text" class="dataEmp input" id="namebus" required>
                      </div>
                    </div>
                    <div id="form--section">
                      <h1>datos de la sede</h1>
                      <div class="form-group">
                          <label for="sed-nom" class="label">Nombre de la sede</label>
                          <input type="text" class="dataEmp input" id="sed-nom" required>
                      </div>
                      <div class="form-group">
                          <label for="sede-dir" class="label">Direccion</label>
                          <input type="text" class="dataEmp input" id="sede-dir" required>
                      </div>
                      <div class="form-group">
                          <label for="sede-tel" class="label">Telefono</label>
                          <input type="number" class="dataEmp input" id="sede-tel" required>
                      </div>
                    </div>
                    <div id="form--section">
                      <h1>datos del contacto</h1>
                      <div class="form-group">
                        <label for="tip_doc" class="label">Tipo de documento</label>
                        <select class="dataEmp input" id="tip_doc">
                          <option value="1">Cedula</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="numDoc" class="label">Numero de documento</label>
                          <input type="text" class="dataEmp input"  id="numDocEmp" required>
                      </div>
                      <div class="form-group">
                          <label for="sede-enc" class="label">Nombre del contacto</label>
                          <input type="text" class="dataEmp input"  id="sede-enc"required>
                      </div>
                      <div class="form-group">
                          <label for="sede-enca" class="label">Apellido del contacto</label>
                          <input type="text" class="dataEmp input"  id="sede-enca"required>
                      </div>
                      <div class="form-group">
                          <label for="cuidad" class="label">Ciudad</label>
                          <select class="dataEmp input" id="cuidad">
                              <option value="1">Medellin</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="sede-enc" class="label">Ext</label>
                          <input type="number" class="dataEmp input"  id="sede-ext" required>
                      </div>
                      <div class="form-group">
                          <label for="sede-correo" class="label">Correo</label>
                          <input type="email" class="dataEmp input"  id="sede-correo" required>
                      </div>
                      <div class="form-group">
                          <label for="cargo" class="label">Cargo:</label>
                          <input type="text"  id="cargo" class="input dataEmp" required>
                      </div>
                      <div class="form-group">
                          <label for="contraEmp" class="label">Contraseña:</label>
                          <input type="password"  id="contraEmp" class="input dataEmp" required>
                      </div>
                      <div class="form-group">
                          <label for="rep_contraEmp" class="label">Repetir Contraseña:</label>
                          <input type="password"  id="rep_contraEmp" class="input dataEmp" required >
                      </div>
                    </div>
                    <div class="form-navigation">
                      <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
                      <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
                      <input type="submit" class="btn btn-default pull-right">
                      <span class="clearfix"></span>
                    </div>

                    </form>
              </div> -->
            </div>
            </div>

        </div>
        </div>
        <div class="runform--rigth">
        <div class="runform--contenido">
        <h1>iniciar sesion</h1>
        <p>Agrega tu documento de identidad y contraseña para ingresar a maxirecargas</p>
        <form id="form--login" data-parsley-validate>
          <div class="wrap--login">
            <label for="document" class="label-login">Documento de identidad</label>
            <input type="text" name="data-login" class="input--login" id="document" required>
          </div>
          <div class="wrap--login">
            <label for="password" class="label-login">Contraseña</label>
            <input type="password" name="data-login" id="pass" class="input--login" required>
          </div>

            <button type="submit" name="button" id="btn--login">iniciar sesion</button>
        </form>
        <button id="moveleft">Registrate</button>
        </div>
      </div>
      </div>
    </div>



    <!-- <script type="text/javascript" src="views/assets/js/config.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.0/parsley.min.js"></script>
    <script type="text/javascript" src="views/assets/lib/parsley/es.js"></script>
    <script type="text/javascript" src="views/assets/js/registro.js"></script>
      <script type="text/javascript" src="views/assets/js/auth.js"></script>
      <script type="text/javascript">
$(function () {
  var $sections = $('.form-section');

  function navigateTo(index) {
    // Mark the current section with the class 'current'
    $sections
      .removeClass('current')
      .eq(index)
        .addClass('current');
    // Show only the navigation buttons that make sense for the current section:
    $('.form-navigation .previous').toggle(index > 0);
    var atTheEnd = index >= $sections.length - 1;
    $('.form-navigation .next').toggle(!atTheEnd);
    $('.form-navigation [type=submit]').toggle(atTheEnd);
  }

  function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter('.current'));
  }

  // Previous button is easy, just go back
  $('.form-navigation .previous').click(function() {
    navigateTo(curIndex() - 1);
  });

  // Next button goes forward iff current block validates
  $('.form-navigation .next').click(function() {
    $('.frmNewUser').parsley().whenValidate({
      group: 'block-' + curIndex()
    }).done(function() {
      navigateTo(curIndex() + 1);
    });
  });

  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
  $sections.each(function(index, section) {
    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
  });
  navigateTo(0); // Start at the beginning
});
</script>
    <!-- <script type="text/javascript" src="views/assets/js/menu.js"></script> -->

  </body>
</html>

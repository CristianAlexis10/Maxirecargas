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
    <div class="fondoimagenes">
      <div class="imagenes--left"></div>
      <div class="imagenes--rigth"></div>
    </div>
    <div id="formularios--run">
      <div class="contenido--run">
        <div class="runform--left">
          <!-- <span><i class="fa fa-home" aria-hidden="true"></i>
</span> -->
        <div class="runform--contenido">
          <div class="superior">
            <h1>Crea tu cuenta</h1>
            <p id="parralert">Registrate y conoce los beneficios que tenemos para ti</p>
            <div class="form-group type--user">
              <label for="tipo_usu" class="select " >Tipo de Usuario:</label>
              <select class="input"  id="tipo_usu" required></select>
            </div>
          </div>
          <div class="main--container--quotation">
            <div class="left--part--quotation">
            <form id="frmNewUser">
              <div class="customers--normal">
                <div id="customers--normal--part1">
                  <div class="form-group">
                    <label for="tip_doc" class="select">Tipo de Documento:</label>
                    <select class="dataCl dataEmp input" id="tip_doc" name="data"  required></select>
                  </div>
                  <div class="form-group">
                    <label for="numDoc" class="label">Numero de Documento:</label>
                    <input type="number"  id="numDoc" class="input dataCl" name="data" required>
                  </div>
                  <div class="form-group">
                    <label for="priNom" class="label">Nombre:</label>
                    <input type="text"  id="priNom" class="input dataCl" name="data"  required>
                  </div>
                  <div class="form-group">
                    <label for="priApe" class="label">Apellido:</label>
                    <input type="text" id="priApe" class="input dataCl" name="data" required>
                  </div>

                  <button type="button" id="normalIrParte2">siguiente</button>
                </div>
                <div id="customers--normal--part2">
                  <div class="form-group">
                    <label for="correo" class="label">Correo:</label>
                    <input type="email" class=" input dataCl" id="correo" name="data" required>
                  </div>
                  <div class="form-group">
                    <label for="tel" class="label">Telefono:</label>
                    <input type="number" class="input dataCl" id="tel" name="data" required>
                  </div>
                  <div class="form-group">
                    <label for="cuidad" class="required">Ciudad:</label>
                    <select class="dataCl input"  id="cuidad" required> </select>
                  </div>
                  <div class="form-group">
                    <label for="dir" class="required">Fecha de Nacimiento:</label>
                    <input type="text" name="data"  id="dir" class="input dataCl"  required>
                  </div>
                  <button type="button"  id="irAtras">atras</button>
                  <button type="button" id="normalIrParte3">siguiente</button>

                </div>
                <div id="customers--normal--part3">

                  <div class="form-group">
                    <label for="sexo" class="required ">Sexo:</label>
                    <select class="dataCl input"  id="sexo" required>
                      <option value="femenino">Femenino</option>
                      <option value="masculino">Masculino</option>
                    </select>
                  </div>
                  <div class="customers--password">
                  <div class="form-group">
                      <label for="contra" class="label">Contraseñasda:</label>
                      <input type="password" name="data" id="contra" class="input dataCl" required>
                  </div>
                  <div class="form-group">
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
            <form id="frmNewBusi">
              <div class="customers--business">
                <div id="business--parte1">
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
                            <button type="button" id="businessIrParte2">siguiente</button>
                          </div>
                <div id="business--parte2">
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
                            <button type="button" id="irAtrasbusi">atras</button>
                            <button type="button" id="businessIrParte3">siguiente</button>
                          </div>
                <div id="business--parte3">
                  <h1>datos del contacto</h1>
                  <div class="form-group">
                    <label for="tip_doc">Tipo de documento</label>
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
                                  <label for="cuidad" >Ciudad</label>
                                  <select class="dataEmp input" id="cuidad">
                                      <option value="1">Medellin</option>
                                  </select>
                              </div>
                  <button type="button" id="irAtras3busi">atras</button>
                  <button type="button" id="businessIrParte4">siguiente</button>

                </div>
                <div id="business--parte4">
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
                  <div class="form-group">
                                <button class="btn"  id="registrarEmp">Registrar Empresa</button>
                              </div>
                  <button type="button" id="irAtras4busi">atras</button>
                </div>
              </div>
            </form>
            </div>
            </div>
            <button id="moveright">Iniciar Sesión</button>
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




    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- <script type="text/javascript" src="views/assets/js/config.js"></script> -->
    <script type="text/javascript" src="views/assets/js/registro.js"></script>
      <script type="text/javascript" src="views/assets/js/auth.js"></script>
    <!-- <script type="text/javascript" src="views/assets/js/menu.js"></script> -->

  </body>
</html>

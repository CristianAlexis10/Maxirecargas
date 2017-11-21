
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
  </head>
  <style >
      body{
          color:white;
      }
  </style>
  <body>
    <div class="main--container--quotation">
      <div class="left--part--quotation">
        <span><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
        <form id="frmNewUser">
            <div class="form-group type--user">
                    <label for="tipo_usu" class="select" >Tipo de Usuario:</label>
                    <select class="input"  id="tipo_usu" required></select>
            </div>
            <div class="customers--normal">
                <div class="form-group">
                    <label for="tip_doc" class="select">Tipo de Documento:</label>
                    <select class="dataCl input" id="tip_doc"   required></select>
                </div>
                <div class="form-group">

                    <label for="numDoc" class="label">Numero de Documento:</label>
                    <input type="number"  id="numDoc" class="input dataCl" required>

                </div>
                <div class="form-group">
                    <label for="priNom" class="label">Primer Nombre:</label>
                    <input type="text"  id="priNom" class="input dataCl"  required>
                </div>
                <div class="form-group">
                    <label for="priApe" class="label">Primer Apellido:</label>
                    <input type="text" id="priApe" class="input dataCl" required>
                </div>
                <div class="form-group">
                    <label for="correo" class="label">Correo:</label>
                    <input type="email" class=" input dataCl" id="correo" required>
                </div>
                <div class="form-group">
                    <label for="tel" class="label">Telefono:</label>
                    <input type="number" class="input dataCl" id="tel"  required>
                </div>

                <div class="form-group">
                    <label for="cuidad" class="required">Ciudad:</label>
                    <select class="dataCl input"  id="cuidad" required> </select>
                </div>
                <div class="form-group">
                    <label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
                    <input type="date"  id="fecha_naci" class="input dataCl" max="2005-01-01" min="1950-01-01" required>
                </div>
                <div class="form-group">
                    <label for="sexo" class="required ">Sexo:</label>
                    <select class="dataCl input"  id="sexo" required>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>
                </div>
                <div class="customers--password">
                <div class="form-group">
                    <label for="contra" class="label">Contraseña:</label>
                    <input type="password"  id="contra" class="input dataCl" required>
                </div>
                <div class="form-group">
                    <label for="rep_contra" class="label">Repetir Contraseña:</label>
                    <input type="password"  id="rep_contra" class="input dataCl" required disabled>
                </div>
                </div>
                <!-- <div class="form-group">
                    <label for="image" class="laber">Foto de perfil:</label>
                    <input type="file" name="file" id="imageupload">
                </div> -->
                <div class="g-recaptcha" data-sitekey="6Ld_bDkUAAAAADkIoF_nn1BbWzhCuSm0Zk2E83eZ"></div>
                  <div class="form-group">
                    <button class="btn" disabled id="registrar">Registrar Cliente</button>
                   </div>
            </div>
        </form>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- <script type="text/javascript" src="views/assets/js/config.js"></script> -->
    <script type="text/javascript" src="views/assets/js/registro.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>

  </body>
</html>

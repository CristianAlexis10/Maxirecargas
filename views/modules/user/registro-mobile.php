<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title> Maxirecargas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="views/assets/image/icn-maxi.png">
    <link rel="stylesheet" href="views/assets/css/main-user.css">
    <link rel="stylesheet" href="views/assets/css/responsive.css">
  </head>
  <body>
    <div class="registrar--mobile">
      <h1>Crea tu cuenta</h1>
      <p>Registrate y conoce los beneficios que tenemos para ti</p>
      <div class="form-group type--user">
        <label for="tipo_usu" class="select" >Tipo de Usuario:</label>
        <select class="input"  id="tipo_usu" required>
          <option value="natural">persona natural</option>
          <option value="juridico">persona juridica</option>
        </select>
      </div>
      <div class="customers--normal">
        <div id="customers--normal--part1">
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
        <div id="customers--normal--part2">
          <div class="form-group">
            <label for="correo" class="label">Correo:</label>
            <input type="email" class=" input" id="correo" name="data" required>
          </div>
          <div class="form-group">
            <label for="tel" class="label">Telefono:</label>
            <input type="number" class="input" id="tel"  name="data" required>
          </div>

          <div id="selectAutocomplete">
                  <select class="input"  id="cuidad" required>
                    <?php
                      foreach ($this->master->selectAll("ciudad") as $row) {?>
                        <option value="<?php   echo $row['id_ciudad']; ?>"><?php  echo $row['ciu_nombre'] ?></option>
                    <?php    } ?>
                  </select>
          </div>

          <div class="form-group">
            <label for="dir" class="label">Dirección:</label>
            <input type="text" name="data"  id="dir" class="input"  required>
          </div>
          <button type="button"  id="irAtras">atras</button>
          <button type="button" id="normalIrParte3">siguiente</button>

        </div>

      </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="views/assets/js/registro.js"></script>
    <script type="text/javascript" src="views/assets/js/main-user.js"></script>
    <script type="text/javascript" src="views/assets/js/contact.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>

  </body>
  </html>

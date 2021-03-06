<link rel="stylesheet" href="views/assets/css/setting.css">
<div class="title">
  <p>CONFIGURACIONES</p>
</div>
<div id="tabsConf">
  <ul>
    <!-- <li><a href="#config-permisos">Permisos</a></li> -->
    <li><a href="#contacto">Datos de contacto</a></li>
    <li><a href="#maxi">Acerca de Maxirecargas</a></li>
    <li><a href="#general">General</a></li>
  </ul>
  <div id="config-permisos">
      <form id="frmNewRol">
          <div class="wrap--config">
              <div class="config--rol">

              </div>
          </div>
      </div>
      <div id="general">
        <?php
          if ($_SESSION['CUSTOMER']['STYLE']['est_usu_menu']!=' ') {?>
            <div class="modo--color">
              <h1>Elige tu estilo </h1>
              <label>Color
                <input type="checkbox" name="checkcolor" id="styleButton" checked class="swich green"  >
                <div>
                  <div>
                  </div>
                </div>
              </label>
            </div>
          <?PHP }else{?>
            <div class="modo--color">
              <label>Color
                <input type="checkbox" name="checkcolor" id="styleButton"  class="swich green"  >
                <div>
                  <div>
                  </div>
                </div>
              </label>
            </div>
          <?php }  ?>
          <input type="button" id="saveStyle" value="Guardar Cambios">


      </div>
      </form>
      <div id="contacto">
        <form id="form_contacto">
          <div class="form-group">
            <label for="numer1" class="label">Número de teléfono</label>
            <input type="number" id="numer1" class="input">
          </div>
          <div class="form-group">
            <label for="numer2" class="label">Número de teléfono 2</label>
            <input type="number" id="numer2" class="input">
          </div>
          <div class="form-group">
            <label for="wpp" class="label">Whatsapp</label>
            <input type="number" id="wpp" class="input">
          </div>
          <div class="form-group">
            <label for="correocos" class="label">Correo</label>
            <input type="email" id="correocos" class="input">
          </div>
          <div class="form-group">
            <label for="direccion" class="label">Dirección</label>
            <input type="text" id="direccion" class="input">
          </div>
          <div class="form-group">
            <label for="inicio" class="label">Hora inicio jornada laboral</label>
            <input type="time" id="inicio" class="input">
          </div>
          <div class="form-group">
            <label for="fin" class="label">Hora fin jornada laboral</label>
            <input type="time" id="fin" class="input">
          </div>
          <div class="form-group">
            <input type="submit" id="btn-coso" class="btn">
          </div>
        </form>
      </div>
      <div id="maxi">
        <?php
        $data = $this->master->selectAll("gestion_web");
        ?>
        <div class="modules profileDetalle">
          <p>Cambia los datos de la página principal de Maxirecargas, tales como la descripción inicial de la empresa, misión, visión y las políticas de medio ambiente</p>
          <div class="maxContainer_profile">
            <?php if($_SESSION['CUSTOMER']['ROL']==2){?>
            <div class="frmprofile">
              <form id="frmProfileBusi">
                  <div class="form-group">
                    <label for="micro_des" class="label">Micro Descripción:</label>
                    <textarea maxlength="100" class=" dataUptadeBusi textareaupdate" id="micro_des"   required><?php echo $data[0]['gw_micro_des']?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="mision" class=" label">Misión:</label>
                    <textarea maxlength="300"class=" dataUptadeBusi textareaupdate" id="mision" required><?php echo $data[0]['gw_mision']?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="vision" class="label">Visión:</label>
                    <textarea maxlength="340" class="dataUptadeBusi textareaupdate" id="vision"   required><?php echo $data[0]['gw_vision']?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="pma" class="label">Políticas de medio ambiente:</label>
                    <textarea maxlength="300" class=" dataUptadeBusi textareaupdate" id="pma" required><?php echo $data[0]['gw_politicas']?></textarea>
                  </div>

                <div class="wrap_two_formgroup">
                    <div class="form-group">
                    <!-- <a href="configuraciones#contacto">Actualizar datos de contacto</a> -->
                    </div>

              </div>
              <div class="form-group">
                  <button type="submit" class="btn">Hacer cambios</button>
              </div>
            </div>
          <?php }else{?>
                <h1>Misión</h1>
                <p><?php echo $data[0]['gw_mision']?></p>
                <h1>Visión</h1>
                <p><?php echo $data[0]['gw_vision']?></p>
                <h1>Política de medio ambiente</h1>
                <p><?php echo $data[0]['gw_politicas']?></p>
          <?php  } ?>
          </div>
        </form>

        </div>

      </div>
</div>

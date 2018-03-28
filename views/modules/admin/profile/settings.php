<link rel="stylesheet" href="views/assets/css/setting.css">
<div class="title">
  <p>CONFIGURACIONES</p>
</div>
<div id="tabsConf">
  <ul>
    <li><a href="#config-permisos">Permisos</a></li>
    <li><a href="#general">General</a></li>
    <li><a href="#contacto">Datos de contacto</a></li>
  </ul>
  <div id="config-permisos">
      <form id="frmNewRol">
          <div class="wrap--config">
              <div class="config--rol">
                  <h1>Crear un nuevo Rol</h1>
                  <div class="config--form">
                    <div class="wrap--chmodule">
                        <label>Este Rol pertenece a Maxirecargas
                            <input type="checkbox" name="data-rol-maxi" class="swich green">
                            <div>
                                <div>
                                </div>
                            </div>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="namerol" class="label">nombre del rol</label>
                      <input type="text" name="data-rol-name" class="input" id="namerol"required>
                  </div>
                  <h1>Asirnar Permisos</h1>
                  <p>Este rol tendra permisos para los siguientes modulos:</p>
                  <div class="config--form" id="module-cliente">
                      <div class="wrap--chmodule">
                          <label>usuarios
                              <input type="checkbox" name="checkcliente" class="swich green">
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--perms perms--hide" >
                        <label for="usu--crear">Crear</label>
                         <input type="checkbox"  name="data-rol-users"  disabled  value="1" id="usu--crear">
                         <label for="usu--modificar">Modificar</label>
                        <input type="checkbox" name="data-rol-users" disabled  value="1" id="usu--modificar">
                        <label for="usu--eliminar">Eliminar</label>
                        <input type="checkbox" name="data-rol-users" disabled value="1" id="usu--eliminar" >
                      </div>
                  </div>
                  <div class="config--form" id="module-producto">
                      <div class="wrap--chmodule">
                          <label>productos
                              <input type="checkbox" name="checkpro" class="swich green"  >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permsprod perms--prod" >
                        <label for="prod--crear">Crear</label>
                        <input type="checkbox"  name="data-rol-products"  disabled  value="1" id="prod--crear">
                        <label for="prod--modificar">Modificar </label>
                        <input type="checkbox" name="data-rol-products" disabled value="1" id="prod--modificar">
                        <label for="prod--eliminar">  Eliminar </label>
                        <input type="checkbox" name="data-rol-products" disabled  value="1" id="prod--eliminar">
                      </div>
                  </div>
                  <div class="config--form" id="module-pedido">
                      <div class="wrap--chmodule">
                          <label>pedidos
                              <input type="checkbox" name="checkpedido" class="swich green"  >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permspedi perms--pedi" >
                        <label for="pedi--crear">Crear </label>
                        <input type="checkbox"  name="data-rol-order"  disabled  value="1" id="pedi--crear">
                        <label for="pedi--modificar">Modificar</label>
                        <input type="checkbox" name="data-rol-order" disabled  value="1" id="pedi--modificar">
                        <label for="pedi--eliminar">Eliminar </label>
                        <input type="checkbox" name="data-rol-order" disabled  value="1" id="pedi--eliminar">
                      </div>
                  </div>
                  <div class="config--form" id="module-cotizaciones">
                      <div class="wrap--chmodule">
                          <label>cotizaciones
                              <input type="checkbox" name="checkcotiza" class="swich green"  >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permscot perms--cot" >
                        <label for="cot--crear"> Crear </label>
                        <input type="checkbox"  name="data-rol-quoation"  disabled  value="1" id="cot--crear">
                        <label for="cot--modificar">  Modificar </label>
                        <input type="checkbox" name="data-rol-quoation" disabled value="1" id="cot--modificar">
                        <label for="cot--eliminar">  Eliminar</label>
                         <input type="checkbox" name="data-rol-quoation" disabled value="1" id="cot--eliminar">
                      </div>
                  </div>
                  <div class="config--form" id="module-ruta">
                      <div class="wrap--chmodule">
                          <label>rutas
                              <input type="checkbox" name="checkruta" class="swich green"  >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permsruta perms--ruta" >
                        <label for="rut--crear">  Crear </label>
                        <input type="checkbox"  name="data-rol-routes"  disabled value="1" id="rut--crear">
                        <label for="rut--modificar">  Modificar </label>
                        <input type="checkbox" name="data-rol-routes" disabled value="1" id="rut--modificar">
                        <label for="rut--eliminar">Eliminar</label>
                        <input type="checkbox" name="data-rol-routes" disabled value="1" id="rut--eliminar">
                      </div>
                  </div>
                  <!-- asistencia virtual -->
                  <div class="config--form" id="module-assistance">
                      <div class="wrap--chmodule">
                          <label>Asistencia virtual
                              <input type="checkbox" id="checkassistance" class="swich green"  value="1">
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                  </div>
                  <button type="submit" name="button" class="saverol">Guargar</button>
              </div>
          </div>
      </div>
      <div id="general">
        <?php
          if ($_SESSION['CUSTOMER']['STYLE']['est_usu_menu']!=' ') {?>
            <div class="modo--color">
              <label>color
                <input type="checkbox" name="checkcolor" id="styleButton" checked class="swich green"  >
                <div>
                  <div>
                  </div>
                </div>
              </label>
            </div>
          <?PHP }else{?>
            <div class="modo--color">
              <label>color
                <input type="checkbox" name="checkcolor" id="styleButton"  class="swich green"  >
                <div>
                  <div>
                  </div>
                </div>
              </label>
            </div>
          <?php }  ?>
          <input type="button" id="saveStyle" value="Guardar Cambios">
          <h1>Elige tu estilo</h1>

      </div>
      </form>
      <div id="contacto">
        <form id="form_contacto">
          <div class="form-group">
            <label for="numer1" class="label">numero de telefono</label>
            <input type="number" id="numer1" class="input">
          </div>
          <div class="form-group">
            <label for="numer2" class="label">numero de telefono 2</label>
            <input type="number" id="numer2" class="input">
          </div>
          <div class="form-group">
            <label for="wpp" class="label">whatsapp</label>
            <input type="number" id="wpp" class="input">
          </div>
          <div class="form-group">
            <label for="correocos" class="label">correo</label>
            <input type="email" id="correocos" class="input">
          </div>
          <div class="form-group">
            <label for="direccion" class="label">direccion</label>
            <input type="text" id="direccion" class="input">
          </div>
          <div class="form-group">
            <label for="inicio" class="label">Hora Inicio Jornada laboral</label>
            <input type="time" id="inicio" class="input">
          </div>
          <div class="form-group">
            <label for="fin" class="label">Hora Fin Jornada laboral</label>
            <input type="time" id="fin" class="input">
          </div>
          <div class="form-group">
            <input type="submit" id="btn-coso" class="btn">
          </div>
        </form>
      </div>
</div>

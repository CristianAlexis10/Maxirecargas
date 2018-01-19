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
                  <p class="">crear un nuevo rol</p>
                  <div class="config--form">
                      <label for="">pertenece a Maxirecargas</label>
                      <input type="checkbox" name="data-rol-maxi" >
                  </div>
                  <div class="config--form">
                      <label for="">nombre del rol</label>
                      <input type="text" name="data-rol-name" class="" required>
                  </div>
                  <p>asirnar permisos</p>
                  <p>el rol tendra permisos para los siguientes modulos</p>
                  <div class="config--form" id="module-cliente">
                      <div class="wrap--chmodule">
                          <label>usuarios
                              <input type="checkbox" name="checkcliente" class="swich green"  >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--perms perms--hide" >
                          Crear <input type="checkbox"  name="data-rol-users"  disabled  value="1" >
                          Modificar <input type="checkbox" name="data-rol-users" disabled  value="1" >
                          Eliminar <input type="checkbox" name="data-rol-users" disabled value="1"  >
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
                          Crear <input type="checkbox"  name="data-rol-products"  disabled  value="1">
                          Modificar <input type="checkbox" name="data-rol-products" disabled value="1" >
                          Eliminar <input type="checkbox" name="data-rol-products" disabled  value="1">
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
                          Crear <input type="checkbox"  name="data-rol-order"  disabled  value="1">
                          Modificar <input type="checkbox" name="data-rol-order" disabled  value="1">
                          Eliminar <input type="checkbox" name="data-rol-order" disabled  value="1">
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
                          Crear <input type="checkbox"  name="data-rol-quoation"  disabled  value="1">
                          Modificar <input type="checkbox" name="data-rol-quoation" disabled value="1">
                          Eliminar <input type="checkbox" name="data-rol-quoation" disabled value="1">
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
                          Crear <input type="checkbox"  name="data-rol-routes"  disabled value="1">
                          Modificar <input type="checkbox" name="data-rol-routes" disabled value="1">
                          Eliminar <input type="checkbox" name="data-rol-routes" disabled value="1">
                      </div>
                  </div>
                  <button type="submit" name="button">Guargar</button>
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
      </div>
      </form>
      <div id="contacto">
        <form id="form_contacto">
          <div class="coso">
            <label for="numer1">numero de telefono</label>
            <input type="number" id="numer1">
          </div>
          <div class="coso">
            <label for="numer2">numero de telefono 2</label>
            <input type="number" id="numer2">
          </div>
          <div class="coso">
            <label for="wpp">whatsapp</label>
            <input type="number" id="wpp">
          </div>
          <div class="coso">
            <label for="correocos">correo</label>
            <input type="email" id="correocos">
          </div>
          <div class="coso">
            <label for="direccion">direccion</label>
            <input type="number" id="direccion">
          </div>
          <div class="btn-coso">
            <input type="submit" id="btn-coso">
          </div>
        </form>
      </div>
</div>

<link rel="stylesheet" href="views/assets/css/setting.css">
<div class="title">
  <p>CONFIGURACIONES</p>
</div>
<div id="tabsConf">
  <ul>
    <li><a href="#config-permisos">Nuevo rol</a></li>
    <li><a href="#list">Lista de roles</a></li>
  </ul>
  <div id="config-permisos">
      <form id="frmNewRol">
          <div class="wrap--config">
              <div class="config--rol">
                  <h1>Crear un nuevo rol</h1>
                  <div class="config--form">
                    <div class="wrap--chmodule">
                        <label>Este rol pertenece a Maxirecargas
                            <input type="checkbox" name="data-rol-maxi" class="swich green">
                            <div>
                                <div>
                                </div>
                            </div>
                        </label>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="namerol" class="label">Nombre del rol</label>
                      <input type="text" name="data-rol-name" class="input" id="namerol"required>
                  </div>
                  <h1>Asignar Permisos</h1>
                  <p>Este rol tendrá permisos en los siguientes módulos:</p>
                  <div class="config--form" id="module-cliente">
                      <div class="wrap--chmodule">
                          <label>Usuarios
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
                          <label>Productos
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
                          <label>Pedidos
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
                          <label>Cotizaciones
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
                          <label>Rutas
                              <input type="checkbox" name="checkruta" class="swich green"  >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permsruta perms--ruta" >
                        <label for="rut--crear">Crear</label>
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
                  <button type="submit" name="button" class="saverol">Guardar</button>
              </div>
          </div>
        </form>
      </div>

      <div id="list">
       <?php require_once "views/modules/config/datatables/datatable-roles.php"; ?>
      </div>
</div>

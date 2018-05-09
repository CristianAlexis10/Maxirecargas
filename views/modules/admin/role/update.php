<link rel="stylesheet" href="views/assets/css/setting.css">
<?php
$_SESSION['update_rol'] = base64_decode($_GET['data']);
$user = false;
$products = false;
$orders = false;
$qoutation = false;
$routes = false;
$av = false;
$result = $this->master->selectBy("tipo_usuario",array("tip_usu_codigo",base64_decode($_GET['data'])));
$permits = $this->master->selectAllBy("permiso",array("tip_usu_codigo",base64_decode($_GET['data'])));
// print_r($permits);
foreach ($permits as $row) {
  if ($row['id_modulo']==1) {
    $user = true;
    $p_c = $row['per_crear'];
    $p_u = $row['per_modificar'];
    $p_d = $row['per_eliminar'];
  }
  if ($row['id_modulo']==2) {
    $products = true;
    $pro_c = $row['per_crear'];
    $pro_u = $row['per_modificar'];
    $pro_d = $row['per_eliminar'];
  }
  if ($row['id_modulo']==3) {
    $orders = true;
    $o_c = $row['per_crear'];
    $o_u = $row['per_modificar'];
    $o_d = $row['per_eliminar'];
  }
  if ($row['id_modulo']==4) {
    $qoutation = true;
    $q_c = $row['per_crear'];
    $q_u = $row['per_modificar'];
    $q_d = $row['per_eliminar'];
  }
  if ($row['id_modulo']==5) {
    $routes = true;
    $r_c = $row['per_crear'];
    $r_u = $row['per_modificar'];
    $r_d = $row['per_eliminar'];
  }
  if ($row['id_modulo']==6) {
    $av = true;
  }
}

?>
<div class="title">
  <p>MODIFICAR ROL </p>
</div>
<form id="frmUpdateRol">
    <div class="wrap--config">
        <div class="config--rol">
            <div class="config--form">
              <div class="wrap--chmodule">
                  <label>Este rol pertenece a Maxirecargas
                      <input type="checkbox" name="data-rol-maxi" class="swich green" <?php if($result['tip_usu_maxi']=="false"){}else{echo "checked";} ?>>
                      <div>
                          <div>
                          </div>
                      </div>
                  </label>
              </div>
            </div>
                  <div class="form-group">
                      <label for="namerol" class="label">Nombre del rol</label>
                      <input type="text" name="data-rol-name" class="input" id="namerol" value="<?php echo $result['tip_usu_rol'] ?>" required>
                  </div>
                  <h1>Asignar Permisos</h1>
                  <p>Este rol tendrá permisos en los siguientes módulos:</p>
                  <div class="config--form" id="module-cliente">
                      <div class="wrap--chmodule">
                          <label>Usuarios
                              <input type="checkbox" name="checkcliente" class="swich green" <?php if($user == true){echo "checked";} ?>>
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--perms <?php if($user != true){echo "perms--hide";} ?>" >
                        <label for="usu--crear">Crear</label>
                         <input type="checkbox"  name="data-rol-users"    value="1" id="usu--crear" <?php if($user==true){if($p_c==1){echo "checked";}} ?>>
                         <label for="usu--modificar">Modificar</label>
                        <input type="checkbox" name="data-rol-users"   value="1" id="usu--modificar" <?php if($user==true){if($p_u==1){echo "checked";}} ?>>
                        <label for="usu--eliminar">Eliminar</label>
                        <input type="checkbox" name="data-rol-users"  value="1" id="usu--eliminar" <?php if($user==true){if($p_d==1){echo "checked";}} ?>>
                      </div>
                  </div>
                  <div class="config--form" id="module-producto">
                      <div class="wrap--chmodule">
                          <label>Productos
                              <input type="checkbox" name="checkpro" class="swich green" <?php if($products == true){echo "checked";} ?> >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permsprod <?php if($products != true){echo "perms--prod";} ?>" >
                        <label for="prod--crear">Crear</label>
                        <input type="checkbox"  name="data-rol-products"  <?php if($products==true){if($pro_c==1){echo "checked";}} ?>  value="1" id="prod--crear">
                        <label for="prod--modificar">Modificar </label>
                        <input type="checkbox" name="data-rol-products" <?php if($products==true){if($pro_u==1){echo "checked";}} ?> value="1" id="prod--modificar">
                        <label for="prod--eliminar">  Eliminar </label>
                        <input type="checkbox" name="data-rol-products" <?php if($products==true){if($pro_d==1){echo "checked";}} ?>  value="1" id="prod--eliminar">
                      </div>
                  </div>
                  <div class="config--form" id="module-pedido">
                      <div class="wrap--chmodule">
                          <label>Pedidos
                              <input type="checkbox" name="checkpedido" class="swich green" <?php if($orders == true){echo "checked";} ?>>
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permspedi <?php if($orders != true){echo "perms--pedi";} ?>" >
                        <label for="pedi--crear">Crear </label>
                        <input type="checkbox"  name="data-rol-order"  <?php if($orders==true){if($o_c==1){echo "checked";}} ?>  value="1" id="pedi--crear">
                        <label for="pedi--modificar">Modificar</label>
                        <input type="checkbox" name="data-rol-order" <?php if($orders==true){if($o_u==1){echo "checked";}} ?>  value="1" id="pedi--modificar">
                        <label for="pedi--eliminar">Eliminar </label>
                        <input type="checkbox" name="data-rol-order" <?php if($orders==true){if($o_d==1){echo "checked";}} ?>  value="1" id="pedi--eliminar">
                      </div>
                  </div>
                  <div class="config--form" id="module-cotizaciones">
                      <div class="wrap--chmodule">
                          <label>Cotizaciones
                              <input type="checkbox" name="checkcotiza" class="swich green"  <?php if($qoutation == true){echo "checked";} ?>>
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permscot <?php if($qoutation != true){echo "perms--cot";} ?>" >
                        <label for="cot--crear"> Crear </label>
                        <input type="checkbox"  name="data-rol-quoation"  <?php if($qoutation==true){if($q_c==1){echo "checked";}} ?>   value="1" id="cot--crear">
                        <label for="cot--modificar">  Modificar </label>
                        <input type="checkbox" name="data-rol-quoation" <?php if($qoutation==true){if($q_u==1){echo "checked";}} ?>  value="1" id="cot--modificar">
                        <label for="cot--eliminar">  Eliminar</label>
                         <input type="checkbox" name="data-rol-quoation" <?php if($qoutation==true){if($q_d==1){echo "checked";}} ?>  value="1" id="cot--eliminar">
                      </div>
                  </div>
                  <div class="config--form" id="module-ruta">
                      <div class="wrap--chmodule">
                          <label>Rutas
                              <input type="checkbox" name="checkruta" class="swich green" <?php if($routes == true){echo "checked";} ?> >
                              <div>
                                  <div>
                                  </div>
                              </div>
                          </label>
                      </div>
                      <div class="wrap--permsruta <?php if($routes != true){echo "perms--ruta";} ?>" >
                        <label for="rut--crear">Crear</label>
                        <input type="checkbox"  name="data-rol-routes"  <?php if($routes==true){if($r_c==1){echo "checked";}} ?> value="1" id="rut--crear">
                        <label for="rut--modificar">  Modificar </label>
                        <input type="checkbox" name="data-rol-routes" <?php if($routes==true){if($r_u==1){echo "checked";}} ?> value="1" id="rut--modificar">
                        <label for="rut--eliminar">Eliminar</label>
                        <input type="checkbox" name="data-rol-routes" <?php if($routes==true){if($r_d==1){echo "checked";}} ?> value="1" id="rut--eliminar">
                      </div>
                  </div>
                  <!-- asistencia virtual -->
                  <div class="config--form" id="module-assistance">
                      <div class="wrap--chmodule">
                          <label>Asistencia virtual
                              <input type="checkbox" id="checkassistance" class="swich green"  value="1" <?php if($av == true){echo "checked";} ?>>
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

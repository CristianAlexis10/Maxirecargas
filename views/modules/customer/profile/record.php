
<span class="menuProduct"><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
<?php
if (isset($_SESSION['user_new_order'])) {
  echo "<div class='modales'><div class='new_order_token'><span id='closeOrderListo'>&times;</span><div class='check'></div><p class='textmodal'>Tu Order se ha Realizado Exitosamente, para realizarle seguimiento puedes usar este codigo de orden: <b>".$_SESSION['user_new_order']."</b></p><button type='button' class='checkBtn'>¡Entendido!</button></div></div>";
  unset($_SESSION['user_new_order']);
}
if (isset($_SESSION['user_quotation_new'])) {
  echo "<div class='modales'><div class='new_order_token'><span id='closeOrderListo'>&times;</span><div class='check'></div><p class='textmodal'>Tu Cotización se ha Realizado Exitosamente, para realizarle seguimiento puedes usar este codigo de tu cotización: <b>".$_SESSION['user_quotation_new']."</b></p><button type='button' class='checkBtn'>¡Entendido!</button></div></div>";
  unset($_SESSION['user_quotation_new']);
}
?>
<div class="record--container">
  <div class="banner">
    <h1 class="title_banner">historial</h1>
  </div>
  <div id="tabs">
    <ul>
      <li><a href="#tabs-2">Pedidos</a></li>
      <li><a href="#tabs-3">Cotizaciones</a></li>
    </ul>
        <div id="tabs-2">
          <h2 class="record--title">Pedidos Realizados</h2>
          <p class="record--subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
          <?php require_once "views/modules/config/datatables/datatable-orders-users.php"; ?>
        </div>
        <div id="tabs-3">
          <h2 class="record--title">Cotizaciones Realizadas</h2>
          <p class="record--subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
          <?php require_once "views/modules/config/datatables/datatable-quotation-users.php"; ?>
        </div>
    </div>
</div>
<div id="modalCancel" class="modal">
      <div class="modal--container cancel">
      <span class="close--modal" id="closeCancel">&times;</span>
      <h1 class="title--modal">cancelar servicio</h1>
      <form id="frmCancelOrder">
        <div class="form-groupuser">
          <label for="motivo" class="labelblue">¿Porque deseas cancelar el servicio?</label>
          <textarea id="motivo" class="inputblue"rows="8" cols="80" placeholder="Motivo de cancelación del pedido"></textarea>
        </div>
        <div class="form-groupuser">
          <input type="submit" value="Cancelar Pedido" class="btnblue">
        </div>
      </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="views/assets/js/table.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="views/assets/js/record.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
  </body>
</html>

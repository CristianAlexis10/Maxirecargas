<style>
  #modalCancel{
    display: none;
  }
</style>
<span class="menuorder"><i class="fa fa-bars" aria-hidden="true" id="menu" style="color:black"></i></span>
<?php
if (isset($_SESSION['user_new_order'])) {
  echo "<div class='new_order_token'>Tu Order se ha Realizado Exitosamente, para realizarle seguimiento puedes usar este codigo de orden: <b>".$_SESSION['user_new_order']."</b></div>";
  unset($_SESSION['user_new_order']);
}
if (isset($_SESSION['user_quotation_new'])) {
  echo "<div class='new_order_token'>Tu Cotización se ha Realizado Exitosamente, para realizarle seguimiento puedes usar este codigo de tu cotización: <b>".$_SESSION['user_quotation_new']."</b></div>";
  unset($_SESSION['user_quotation_new']);
}
?>
    <div id="tabs">
        <ul>
          <li><a href="#tabs-2">Pedidos</a></li>
          <li><a href="#tabs-3">Cotizaciones</a></li>
        </ul>
        <div id="tabs-2">
          <?php require_once "views/modules/config/datatables/datatable-orders-users.php"; ?>
        </div>
        <div id="tabs-3">
          <?php require_once "views/modules/config/datatables/datatable-quotation-users.php"; ?>
        </div>
    </div>
    <div id="modalCancel">
      <form id="frmCancelOrder">
        <div class="frm-group">
          <label for="motivo">Motivo</label>
          <textarea id="motivo" rows="8" cols="80" placeholder="Motivo de cancelación del pedido"></textarea>
        </div>
        <div class="frm-group">
          <input type="submit" value="Cancelar Pedido">
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="views/assets/js/record.js"></script>
    <script type="text/javascript" src="views/assets/js/menu.js"></script>
  </body>
</html>

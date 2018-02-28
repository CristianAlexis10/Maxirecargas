
<?php
if ($crud[1]==true) {
  if ($data_order==array()) {
      die("No existe este pedido");
  }
 $_SESSION['ped_detail_token'] = $data_order[0]['ped_token'];
?>
<div class="mudules orders detail" id="detail-reload">
	<div class="wrap--info">
		<div class="detail">
			<p class="item--detail">Codigo del pedido:</p>
			<p class="data--detail"><?php echo $data_order[0]['ped_token'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Cliente:</p>
			<p class="data--detail"><?php echo $data_order[0]['usu_primer_nombre']." ".$data_order[0]['usu_primer_apellido'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Fecha de realización:</p>
			<p class="data--detail"><?php echo $data_order[0]['ped_fecha'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Dirección:</p>
			<p class="data--detail"><?php echo $data_order[0]['ciu_nombre'].", ".$data_order[0]['ped_direccion'];?>  </p>
		</div>
		<div class="detail">
			<p class="item--detail">Telefono:</p>
			<p class="data--detail"><?php echo $data_order[0]['usu_telefono'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Fecha de entrega:</p>
			<p class="data--detail"><?php echo $data_order[0]['ped_fecha_entrega'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Hora Aproximada de entrega:</p>
			<p class="data--detail"><?php echo $data_order[0]['ped_hora_entrega'];?> </p>
		</div>
		<?php if ($data_order[0]['ped_encargado']!=null) {
			$data_employe = $this->master->selectBy('usuario',array('usu_codigo',$data_order[0]['ped_encargado']))
			?>
				<div class="detail">
					<p class="item--detail">Encargado:</p>
					<p class="data--detail"><?php echo $data_employe['usu_primer_nombre']." ".$data_employe['usu_primer_apellido'] ?> </p>
				</div>
		<?php } ?>
		<div class="detail">
			<p class="item--detail">Estado:</p>
			<p class="data--detail"><?php echo $data_order[0]['ped_estado'];?> </p>
		</div>
    <?php
     if ($data_order[0]['ped_estado']=="Terminado") {
        $dataVen= $this->master->selectBy("ventas",array("ped_codigo",$data_order[0]['ped_codigo']));
       ?>
       <div class="detail">
         <p class="item--detail">Total:</p>
         <p class="data--detail"><?php echo $dataVen['ven_total'] ?> </p>
       </div>
       <?php   } ?>
    <?php
     if ($data_order[0]['ped_estado']=="Aplazado" || $data_order[0]['ped_estado']=="Cancelado") {
        $dataReport= $this->master->selectBy("reporte",array("ped_codigo",$data_order[0]['ped_codigo']));
       ?>
       <div class="detail">
         <p class="item--detail">Motivo:</p>
         <p class="data--detail"><?php echo $dataReport['rep_observacion'] ?> </p>
       </div>
       <?php   } ?>
			<li class="item mapa">
				 <div id="map"></div>
				 <div id="directions"></div>
			 </li>
		</ul>
	</div>
	<div class="wrap--btns">
		<ul>
			<li class="opcins--order"><a id="viewAllProducts">ver articulos</a></li>
			<?php
				if ($data_order[0]['ped_encargado']==null) {?>
						<li class="opcins--order"><a id="assigEncargado" onclick="assign(<?php echo $data_order[0]['ped_codigo']; ?>)" >Asignar encargado</a></li>
					<?php }else{ ?>
						<li class="opcins--order"><a href="#"  class="contact--customer" id="<?php echo $data_order[0]['ped_encargado']; ?>">Contactar encargado</a></li>
						<?php
						if ($data_order[0]['ped_estado']=='Terminado') {?>

						<?php }else{?>
							<li class="opcins--order"> <a href="#" onclick="assign(<?php echo $data_order[0]['ped_codigo']; ?>)"> Cambiar encargado</a></li>
						<?php } ?>
						<?php } ?>

						<li class="opcins--order"><a href="#" class="contact--customer" id="<?php echo $data_order[0]['usu_codigo']; ?>">Contactar  Cliente</a></li>
		</ul>
	</div>
</div>
<div id="modal--detail--products" class="modales">
	<div class="container--modales order">
		<span id="close_modal_producto" class="closemodales">&times;</span>
		<h1>detalles de productos</h1>
    <div class="container_table">
      <table>
      <tr>
        <th>producto</th>
        <th>referencia</th>
        <th>Servicio</th>
        <th>cant</th>
        <th>Observación</th>
      </tr>
    <?php
  		foreach ($data_order as $row) {
      echo "<tr>";
  		 echo "<td>".$row['tip_pro_nombre']."</td>";
       echo "<td>".$row['pro_referencia']."</td>";
       echo "<td>".$row['tip_ser_nombre']."</tb>";
       echo "<td>".$row['pedxpro_cantidad']."</tb>";
       echo "<td>".$row['pedxpro_observacion']."</tb>";
       echo "</tr>";
  		}
  		?>

    </table>
    </div>
	</div>
</div>

<div id="modal-assign" class="modales">
	<div class="container--modales">
		<span id="closeAssig" class="closemodales">&times;</span>
		<h1>Elegir encargado</h1>
    <div class="container_select">
    <div class="form-group">
      <select id="addOrder" class="input normal">
  			<option value="null">Pendiente</option>
  			<?php foreach ($this->master->selectAllBy('usuario',array('tip_usu_codigo',5)) as $row) {?>
  			<option value="<?php echo $row['usu_codigo'] ?>"><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ?></option>
  			<?php }?>
  		</select>
    </div>
    <input type="button" id="confirmAssign" class="btn" value="Seleccionar">
    </div>
	</div>
</div>
<!-- contacto -->
<div id="contact"></div>

      </article>
    </div>
  </section>
 	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="views/assets/js/main.js"></script>
   <script src="views/assets/js/config.js"></script>
   <script src="views/assets/js/orders-admin.js"></script>
	 <script type="text/javascript" src="views/assets/js/gmaps.js"></script>
	  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYIb-jxF2zZivhG13bGeEKI9gJthF4Ovg&libraries=adsense&sensor=false&language=es"></script>
    <script type="text/javascript" src="views/assets/js/map-order.js"></script>
    </body>
</html>
<?php } ?>

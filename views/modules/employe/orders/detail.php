
<?php
if ($crud[1]==true) {
 $_SESSION['ped_detail_token'] = $data_order[0]['ped_token'];
 $data_employe = $this->master->selectBy('usuario',array('usu_codigo',$data_order[0]['ped_encargado']))
?>
<div class="mudules orders detail" id="detail-reload">
	<div class="wrap--info">
		<div class="detail">
			<p class="item--detail">Código del pedido:</p>
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
			<p class="item--detail">Teléfono:</p>
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
		<div class="detail">
			<p class="item--detail">Encargado:</p>
			<p class="data--detail"><?php echo $data_employe['usu_primer_nombre']." ".$data_employe['usu_primer_apellido'] ?> </p>
		</div>
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
			<li class="opcins--order"><a id="viewAllProducts">Ver artículos</a></li>
		   <li class="opcins--order"><a href="#" class="contact--customer" id="<?php echo $data_order[0]['usu_codigo']; ?>">Contactar  Cliente</a></li>
       <?php
        if ($data_order[0]['ped_estado']=="Aplazado" || $data_order[0]['ped_estado']=="En Proceso") {?>
          <li><a href="#" id="chan" onclick="changeStatus(<?php echo $data_order[0]['ped_codigo']; ?>)"><i class="fa fa-refresh"></i></a></li>
      <?php   } ?>
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

<!-- contacto -->
<div id="contact"></div>

<!-- modales -->
<div class="modal-status modales">
	<div class="container--modales">
		<span class="closemodales" id="closeStatus">&times;</span>
		<h2 class="elegir">Verifica el estado de los pedidos</h2>
		<div class="infomodal">
			<select id="newStatus">
        <!-- en proceso -->
        <?php  if ($data_order[0]['ped_estado']=="En Proceso") {?>
            <option value="2" selected>En Proceso</option>
          <?php }else{ ?>
            <option value="2">En Proceso</option>
          <?php } ?>
          <!-- Aplazado -->
          <?php  if ($data_order[0]['ped_estado']=="Aplazado") {?>
            <option value="3" selected>Aplazado</option>
          <?php }else{ ?>
            <option value="3">Aplazado</option>
          <?php } ?>
          <!-- Aplazado -->
          <?php  if ($data_order[0]['ped_estado']=="Cancelado") {?>
            <option value="5" selected>Cancelado</option>
          <?php }else{ ?>
            <option value="5">Cancelado</option>
          <?php } ?>
				<option value="4">Terminado</option>
			</select>
			<div  id="modal-motive" >
						<label for="motive">Motivo:</label>
						<textarea id="motive" rows="3" cols="80"></textarea>
			</div>
			<div id="modal-total">
				<label for="total"> Total Pagado: </label>
				<input type="number" onkeypress="return eliminarLetras(event)" id="total">
			</div>
			<input type="button" id="saveStarus" value="Guardar">
		</div>
	</div>
</div>
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

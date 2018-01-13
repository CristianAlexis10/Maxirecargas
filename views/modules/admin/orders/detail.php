<style>
	#modal--detail--products{
		display: none;
	}
</style>
<?php
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
			<li class="item mapa">
				 <div id="map"></div>
				 <div id="directions"></div>
			 </li>
		</ul>
	</div>
	<div class="wrap--btns">
		<ul>
			<li class="opcins--order"><a href="#" id="viewAllProducts">ver articulos</a></li>
			<?php
				if ($data_order[0]['ped_encargado']==null) {?>
						<li class="opcins--order"><a href=""> <a href="#" onclick="assign(<?php echo $data_order[0]['ped_codigo']; ?>)" >Asignar encargado</a></li>
					<?php }else{ ?>
						<li class="opcins--order"> <a href="#" onclick="assign(<?php echo $data_order[0]['ped_codigo']; ?>)" >Cambiar encargado</a></li>
						<li class="opcins--order"><a href="#"  class="contact--customer" id="<?php echo $data_order[0]['ped_encargado']; ?>">Contactar encargado</a></li>
						<?php } ?>
			<li class="opcins--order"><a href="#" class="contact--customer" id="<?php echo $data_order[0]['usu_codigo']; ?>">Contactar  Cliente</a></li>
		</ul>
	</div>
</div>
<div id="modal--detail--products">
	<?php
	foreach ($data_order as $row) {
	 echo "<b>Producto:</b> ".$row['tip_pro_nombre']." ".$row['pro_referencia']." <b>Servicio</b>: ".$row['tip_ser_nombre']." <b>Cantidad: </b>".$row['pedxpro_cantidad']." <b>Observación: </b>".$row['pedxpro_observacion']."<br>";
	}
	?>
</div>

<div id="modal-assign">
	Elige el encargado:
	<select id="addOrder">
		<option value="null">Pendiente</option>
		<?php foreach ($this->master->selectAllBy('usuario',array('tip_usu_codigo',5)) as $row) {?>
		<option value="<?php echo $row['usu_codigo'] ?>"><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ?></option>
		<?php }?>
	</select>
	<input type="button" id="confirmAssign" value="Seleccionar">
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

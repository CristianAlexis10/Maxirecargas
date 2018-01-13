<style>
	#modal--detail--products,#modalStatus,#modalViewResp{
		display: none;
	}
</style>
<?php
 $_SESSION['cod_detail_id'] = base64_decode($_GET['data']);
 $_SESSION['usu_cot'] = $data_quo[0]['usu_codigo'];
?>
<div class="mudules orders detail" id="detail-reload">
	<div class="wrap--info">
		<div class="detail">
			<p class="item--detail">Codigo de Cotización:</p>
			<p class="data--detail"><?php echo $data_quo[0]['cot_token'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Cliente:</p>
			<p class="data--detail"><?php echo $data_quo[0]['usu_primer_nombre']." ".$data_quo[0]['usu_primer_apellido'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Fecha de realización:</p>
			<p class="data--detail"><?php echo $data_quo[0]['cot_fecha'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Dirección:</p>
			<p class="data--detail"><?php echo $data_quo[0]['ciu_nombre'].", ".$data_quo[0]['cot_dir'];?>  </p>
		</div>
		<div class="detail">
			<p class="item--detail">Telefono:</p>
			<p class="data--detail"><?php echo $data_quo[0]['usu_telefono'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Estado:</p>
			<p class="data--detail"><?php echo $data_quo[0]['cot_estado'];?> </p>
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
				if ($data_quo[0]['cot_estado']=="En Recepcion") {?>
					<a href="#" id="changeStatus" >Marcar como Terminado</a>
				<?php }else{?>
					<li><a href="#" id="viewResponse" >Ver Respuesta</a></li>
					<li><a href="#" id="changeStatus" >Cambiar Respuesta</a></li>
				<?php } ?>
			<li class="opcins--order"><a href="#" class="contact--customer" id="<?php echo $data_quo[0]['usu_codigo']; ?>">Contactar  Cliente</a></li>
		</ul>
	</div>
</div>
<div id="modal--detail--products">
	<?php
	foreach ($data_quo as $row) {
	 echo "<b>Producto:</b> ".$row['tip_pro_nombre']." ".$row['pro_referencia']." <b>Servicio</b>: ".$row['tip_ser_nombre']." <b>Cantidad: </b>".$row['proxcot_cantidad']." <b>Observación: </b>".$row['proxcod_observacion']."<br>";
	}
	?>
</div>

<!-- changeStatus -->
<div id="modalStatus">
	<div class="item-frm">
		<label for="cotRes">Respuesta:</label>
		<textarea id="cotRes" rows="8" cols="80"><?php if ($data_quo[0]['cot_estado']=="Terminado"){ echo $data_quo[0]['cot_respuesta']; }?></textarea>
	</div>
	<div class="item-frm">
		<label for="sendCotMail">Enviar Respuesta al correo: </label>
		<input type="checkbox" id="sendCotMail" value="1">
	</div>
	<div class="item-frm">
		<input type="button" id="sendRes" value="Responder">
	</div>
</div>
<?php
if ($data_quo[0]['cot_estado']=="Terminado"){?>
	 <!-- ver respuesta -->
<div id="modalViewResp">
		<p><?php echo $data_quo[0]['cot_respuesta'] ;?></p>
</div>
<?php } ?>
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
    <script type="text/javascript" src="views/assets/js/map-quotation.js"></script>
    </body>
</html>

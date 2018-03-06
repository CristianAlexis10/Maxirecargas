
<?php
 $_SESSION['cod_detail_id'] = base64_decode($_GET['data']);
 $_SESSION['usu_cot'] = $data_quo[0]['usu_codigo'];
?>
<span class="menuorder"><i class="fa fa-bars" aria-hidden="true" id="menu" style="color:black"></i></span>
<div class="container--detail">
	<div class="content--detail">
		<h1>Detalles de la Cotización</h1>
		<div class="detail">
			<p class="item--detail">Código de Cotización:</p>
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
			<p class="item--detail">Estado:</p>
			<p class="data--detail"><?php echo $data_quo[0]['cot_estado'];?> </p>
		</div>
		<?php if ($data_quo[0]['cot_estado']=="Terminado"){?>
			<div class="detail">
				<p class="item--detail">Respuesta:</p>
				<p class="data--detail"><?php echo $data_quo[0]['cot_respuesta'];?> </p>
			</div>
		<?php } ?>
		<div class="wrap--btns">
				<a href="#" id="viewAllProducts" class="detail--btn">Ver artículos</a>
		</div>
	 </div>
	 <div class="content--detailRight">
		 <img src="views/assets/image/flat/check.png">
		 <h2>Estamos feliz de trabajar para usted</h2>
		 <h1>¡Gracias por trabajar con nosotros!</h1>
	 </div>
	<div class="detail--figure">
	</div>
</div>

<div id="modal--detail--products">
	<?php
	foreach ($data_quo as $row) {
	 echo "<b>Producto:</b> ".$row['tip_pro_nombre']." ".$row['pro_referencia']." <b>Servicio</b>: ".$row['tip_ser_nombre']." <b>Cantidad: </b>".$row['proxcot_cantidad']." <b>Observación: </b>".$row['proxcod_observacion']."<br>";
	}
	?>
</div>


<!-- contacto -->
<div id="contact"></div>

  </article>
  </div>
  </section>
 	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="views/assets/js/orders-admin.js"></script>
   <script src="views/assets/js/menu.js"></script>
	 <script type="text/javascript" src="views/assets/js/gmaps.js"></script>
	  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYIb-jxF2zZivhG13bGeEKI9gJthF4Ovg&libraries=adsense&sensor=false&language=es"></script>
    <script type="text/javascript" src="views/assets/js/map-quotation.js"></script>
    </body>
</html>

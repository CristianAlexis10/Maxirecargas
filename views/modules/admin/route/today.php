<?php
if ($crud[1]==true) {
$count = $this->master->ContarRutasParaHoyPorUsuario(base64_decode($_GET['data']),date('Y-m-d'));
$data = $this->master->verDetalleRuta(date('Y-m-d'),base64_decode($_GET['data']));
$_SESSION['mapRouteToday']= $data;
if($data!=array()){
?>
<div class="route">
	<h1><?php echo $data[0]['usu_primer_nombre']." ".$data[0]['usu_primer_apellido'];?> </h1>
	<p><?php echo $data[0]['usu_correo']?></p>
	<p><?php echo $data[0]['usu_celular'];?></p>
</div>
<div class="visit today">
	<h1>visitas para hoy <?php echo $count['total'];?></h1>
	<table>
		<tr>
			<th>cliente</th>
			<th>direccion</th>
		</tr>
		<tr>
			<td>tales s.a.s</td>
			<td>carrera 45 aa nro. 86b-123</td>
		</tr>
	</table>

</div>
<!-- <div class="mudules orders detail" id="detail-reload">
	<div class="wrap--info">
		<div class="detail">
			<p class="item--detail">Numero de visitas para hoy:</p>
			<p class="data--detail"><?php echo $count['total'];?> </p>
		</div>
		<div class="detail">
			<a href="#"  class="contact--customer" id="<?php echo $data[0]['usu_codigo']; ?>">Contactar encargado</a>
		</div>
		<ul>
			<li class="item mapa">
				 <div id="map"></div>
				 <div id="directions"></div>
			</li>
		</ul>
	</div>
	<div class="wrap--btns">
		<h2>Visitas para hoy</h2>
		<ul>
			<?php
				foreach($data as $row){?>
				<li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>

			<?php } ?>
			</ul>
	</div>
</div> -->
<!-- contacto -->
<div id="contact"></div>
<?php }else{
	$result = $this->master->selectBy('usuario',array('usu_codigo',base64_decode($_GET['data'])));
	echo "<b>".$result['usu_primer_nombre']." ".$result['usu_primer_apellido']."</b> no tiene ninguna visita programada para hoy. <a href='pedidos'>Programar Visita</a>";
}
?>
<div class="orders-future">
	<?php
	$data_future = $this->master->verDetalleRutaFutura(date('Y-m-d'),base64_decode($_GET['data']));
	if ($data_future!=array()) { ?>
		<h1>Visitas Futuras</h1>
		<?php foreach($data_future as $row){?>
			<li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>
		<?php }
	}else{
		echo "<h1>No hay visitas Futuras</h1>";
	}
		?>
</div>
<div class="orders-pending">
	<?php
	$data_future = $this->master->verDetalleRutaAplazada(date('Y-m-d'),base64_decode($_GET['data']));
	if ($data_future!=array()) { ?>
		<h1>Visitas Pendientes</h1>
		<?php foreach($data_future as $row){?>
			<li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>
		<?php }
	}else{
		echo "<h1>No hay visitas Pendientes</h1>";
	}
		?>
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
    <script type="text/javascript" src="views/assets/js/draw-route.js"></script>
    </body>
</html>
<?php }else{
	echo "No Tienes permiso para acceder a este  modulo";
}?>

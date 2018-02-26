<?php
if ($crud[1]==true) {
$count = $this->master->ContarRutasParaHoyPorUsuario(base64_decode($_GET['data']),date('Y-m-d'));
$data = $this->master->verDetalleRuta(date('Y-m-d'),base64_decode($_GET['data']));
$_SESSION['mapRouteToday']= $data;
if($data!=array()){ ?>
<div class="route">
		<h1><?php echo $data[0]['usu_primer_nombre']." ".$data[0]['usu_primer_apellido'];?> </h1>
		<p><?php echo $data[0]['usu_correo']?></p>
		<p><?php echo $data[0]['usu_celular'];?></p>
		<a href="#" class="contact--customer" id="<?php echo $data[0]['usu_codigo']; ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</div>
<div class="visit today">
	<h1>visitas para hoy <?php echo $count['total'];?></h1>
<?php }else{
	$result = $this->master->selectBy('usuario',array('usu_codigo',base64_decode($_GET['data'])));
	echo "<b>".$result['usu_primer_nombre']." ".$result['usu_primer_apellido']."</b> no tiene ninguna visita programada para hoy. <a href='pedidos'>Programar Visita</a>";
}
?>
	<table>
		<tr>
			<th>cliente</th>
			<th>Codigo</th>
			<th>direccion</th>
			<th>Hora Aprox.</th>
		</tr>
<<<<<<< HEAD
		<tr>
			<td>tales s.a.s</td>
			<td>carrera 45 aa nro. 86b-123</td>
		</tr>
		<tr>
			<td>tales s.a.s</td>
			<td>carrera 45 aa nro. 86b-123</td>
		</tr>
		<tr>
			<td>tales s.a.s</td>
			<td>carrera 45 aa nro. 86b-123</td>
		</tr>
=======
		<?php
			foreach($data as $row){
				$user = $this->master->selectBy("usuario",array('usu_codigo',$row['usu_codigo']));
				?>
				<tr>
					<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $user['usu_primer_nombre']." ".$user['usu_primer_apellido']; ?></a></td>
					<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
					<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_direccion']?></a></td>
					<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_hora_entrega']?></a></td>

				</tr>

		<?php } ?>
>>>>>>> e78f349609bdfe5649d4bbe2f4a46b6dfe262242
	</table>
</div>
<<<<<<< HEAD
<div class="visitMaps">
	<p>mapa de ruta</p>
	<div id="map"></div>
	<div id="directions"></div>
</div>
<div class="visit future">
	<div class="orders-future">
		<?php
		$data_future = $this->master->verDetalleRutaFutura(date('Y-m-d'),base64_decode($_GET['data']));
		if ($data_future!=array()) { ?>
			<h1> Futuras visitas</h1>
			<?php foreach($data_future as $row){?>
				<table>
					<tr>
						<th>codido</th>
						<th>cliente</th>
						<th>direccion</th>
					</tr>
					<tr>
						<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
						<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
						<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
					</tr>
				</table>

			<?php }
		}else{
			echo "<h1>No hay visitas Futuras</h1>";
		}
			?>
	</div>
=======
<!-- <a href="#"  class="contact--customer" id="<?php echo $data[0]['usu_codigo']; ?>">Contactar encargado</a> -->

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
>>>>>>> e78f349609bdfe5649d4bbe2f4a46b6dfe262242
</div>
<div class="visit postpone">
	<div class="orders-pending">
		<?php
		$data_future = $this->master->verDetalleRutaAplazada(date('Y-m-d'),base64_decode($_GET['data']));
		if ($data_future!=array()) { ?>
			<h1>Visitas Pendientes</h1>
			<table>
				<tr>
					<th>codigo</th>
					<th>cliente</th>
					<th>direccion</th>
				</tr>
					<?php foreach($data_future as $row){?>
						<tr>
						<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
						<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
						<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
					</tr>
					<?php }?>
			</table>
		<?php }else{
			echo "<h1>No hay visitas Pendientes</h1>";
		}
			?>
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
    <script type="text/javascript" src="views/assets/js/draw-route.js"></script>
    </body>
</html>
<?php }else{
	echo "No Tienes permiso para acceder a este  modulo";
}?>

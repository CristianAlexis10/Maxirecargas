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
</div>
<div class="visit today">
	<h1>Visitas para hoy <?php echo $count['total'];?></h1>
	<table>
		<tr>
			<th>Cliente</th>
			<th>Código</th>
			<th>Dirección</th>
			<th>Hora Aprox.</th>
			<th>Estado</th>
		</tr>
		<?php
			foreach($data as $row){
				$user = $this->master->selectBy("usuario",array('usu_codigo',$row['usu_codigo']));
				?>
				<tr>
					<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $user['usu_primer_nombre']." ".$user['usu_primer_apellido']; ?></a></td>
					<td><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></td>
					<td><?php echo $row['ped_direccion']?></td>
					<td><?php echo $row['ped_hora_entrega']?></td>
					<td><?php echo $row['ped_estado']?></td>

				</tr>

		<?php } ?>
	</table>

</div>
<!-- <a href="#"  class="contact--customer" id="<?php echo $data[0]['usu_codigo']; ?>">Contactar encargado</a> -->

<!-- contacto -->
<div id="contact"></div>
<?php }else{
	$result = $this->master->selectBy('usuario',array('usu_codigo',base64_decode($_GET['data'])));
	echo "<b>".$result['usu_primer_nombre']." ".$result['usu_primer_apellido']."</b> no tiene ninguna visita programada para hoy. <a href='pedidos'>Programar Visita</a>";
}
?>


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
	echo "No tienes permiso para acceder a este  módulo";
}?>

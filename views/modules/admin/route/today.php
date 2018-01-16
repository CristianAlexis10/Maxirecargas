<?php
$count = $this->master->ContarRutasParaHoyPorUsuario(date('Y-m-d'),base64_decode($_GET['data']));
$data = $this->master->verDetalleRuta(date('Y-m-d'),base64_decode($_GET['data']));
// print_r($data);
?>
<div class="mudules orders detail" id="detail-reload">
	<div class="wrap--info">
		<div class="detail">
			<p class="item--detail">Nombre Encargado:</p>
			<p class="data--detail"><?php echo $data[0]['usu_primer_nombre']." ".$data[0]['usu_primer_apellido'];?>  </p>
		</div>
		<div class="detail">
			<p class="item--detail">Correo:</p>
			<p class="data--detail"><?php echo $data[0]['usu_correo']?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Numero de Celular:</p>
			<p class="data--detail"><?php echo $data[0]['usu_celular'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Numero de visitas:</p>
			<p class="data--detail"><?php echo $count['total'];?> </p>
		</div>
		<div class="detail">
			<a href="#"  class="contact--customer" id="<?php echo $data[0]['usu_codigo']; ?>">Contactar encargado</a>
		</div>
			<li class="item mapa">
				 <div id="map"></div>
				 <div id="directions"></div>
			 </li>
		</ul>
	</div>
	<div class="wrap--btns">
		<h2>Visitas Asignadas</h2>
		<ul>
			<?php
				foreach($data as $row){?>
					<li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>

				<?php }
			?>
			</ul>
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

<?php
	if ($_SESSION['CUSTOMER']['ROL']==2) {?>
		<div class="modules">
			<div class="title">
				<p>ESTADÍSTICAS</p>
			</div>
		</div>
		<div class="container--charts">
			<div class="num--users">
					<h2>usuarios registrados</h2>
					<p id="userRegistrado"></p>
				</div>
			<div class="num--orders">
					<h2>total pedidos solicitados</h2>
					<p id="totalPed"></p>
				</div>
			<div class="num--quotation">
					<h2>cotizaciones solicitadas</h2>
					<p id="totalCot"></p>
				</div>
			<div class="liner">
				<canvas id="linerGraphy"></canvas>
			</div>
			<div class="ventasDia">
				<h2>ventas del día</h2>
				<p id="ventaDiaria"></p>
			</div>
			<div class="ventasMes">
				<h2>ventas del mes</h2>
				<p id="ventaMes"></p>
			</div>
			<div class="visitas">
				<h2>Pedidos del día</h2>
				<p id="pedDay"></p>
			</div>
			<div class="pedidopend">
				<h2>pedidos pendientes</h2>
				<p id="pedidosPendientes"></p>
			</div>
			<div class="pedidoterm">
				<h2>pedidos terminados</h2>
				<p id="pedidosTerminados"></p>
			</div>
			<div class="pedidoapla">
				<h2>Pedidos En Proceso</h2>
				<p id="pedidosEnProceso"></p>
			</div>
		</div>
		<div class="wrap--pie">
			<div class="graphyPie1">
				<canvas id="first--pie"></canvas>
			</div>
		</div>
		<div class="graphyData">
			<h1>Clientes Premium </h1>
			<?php require_once "views/modules/config/datatables/datatable-client-star.php"; ?>

			</div>
			<div class="container--map">
				<h1>mapa de Cliente</h1>
				<div id="map"></div>
			</div>
		<?php }else{?>
			<div class="modules">
				<div class="title">
					<p>Bienvenido <?php echo $_SESSION['CUSTOMER']['NAME'];?></p>
				</div>
				<div class="employeMessage">
					<p>Gracias por ser parte de la familia maxirecargas. Recuerda verificar tu ruta diariamente</p>
				</div>
			</div>

		<?php } ?>
</article>
<script>
var menuMobile =document.getElementById('menu--mobile');
var nav = document.getElementById('navigator') ;
menuMobile.onclick = function() {
	nav.style.transform = "translateX(0px)";


}

</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
<script src="views/assets/lib/chart/utils.js"></script>
<script src="views/assets/js/widgets.js"></script>
<script type="text/javascript" src="views/assets/js/gmaps.js"></script>
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYIb-jxF2zZivhG13bGeEKI9gJthF4Ovg&libraries=adsense&sensor=false&language=es"></script>
    <script type="text/javascript" src="views/assets/js/maps.js"></script>
</body>
</html>

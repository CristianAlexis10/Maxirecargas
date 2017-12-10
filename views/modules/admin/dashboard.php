		<div class="modules">
			<div class="title">
				<p>ESTADISITICAS</p>
			</div>
		</div>
		<div class="container--charts">

				<div class="num--users">
					<h2>usuarios registrados</h2>
					<p id="userRegistrado" clientesRegistrados()></p>
				</div>
				<div class="num--orders">
					<h2>pedidos solicitados</h2>
					<p>2342352</p>
				</div>
				<div class="num--quotation">
					<h2>cotizaciones solicitadas</h2>
					<p>14352435</p>
				</div>

			<div class="liner">
				<canvas id="linerGraphy"></canvas>
			</div>
			<div class="ventasDia">
				<h2>ventas del dia</h2>
				<p>23343</p>
			</div>
			<div class="ventasMes">
				<h2>ventas del mes</h2>
				<p>23343</p>
			</div>
			<div class="visitas">
				<h2>numero de vistas</h2>
				<p>23343</p>
			</div>
		</div>
		<div class="wrap--pie">
			<div class="graphyPie1">
				<canvas id="first--pie"></canvas>
			</div>
			<div class="graphyPie2">
				<canvas id="second--pie"></canvas>
			</div>
		</div>
		<div class="graphyData">
				<table id="dataGrid">
					<thead>
						<tr>
							<th>Cliente</th>
							<th>Nro. Pedidos</th>
							<th>Nron. prpductos</th>
							<th>ultimo pedido</th>
							<th>ver mas</th>
						</tr>
					</thead>
					<tbody>
							<tr>
									<td>maxirecagas</td>
									<td>34</td>
									<td>99</td>
									<td>12/07/2017</td>
									<td><i class="fa fa-external-link" aria-hidden="true"></i></td>
							</tr>
					</tbody>
				</table>
			</div>

			<div class="container--map">
				 <div id="map"></div>
				 <style >
					  #map{
					  width: 100%;
					  height: 350px;
					  margin: 0 auto;

					}
				</style>
			</div>

</article>
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

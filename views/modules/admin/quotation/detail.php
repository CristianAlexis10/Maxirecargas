<div class="modules">
	<div class="title">
			<p>Crea la Cotización</p>
		</div>
		<div class="container--cotizacion">
			<?php
				$dataQuo = $this->master->datosCotizacion(base64_decode($_GET['data']));
				print_r($dataQuo);
			?>
			<div class="visit today">
			<table>
				<tr>
					<th>cliente</th>
					<th>Codigo</th>
					<th>Estado</th>
				</tr>
						<tr>
							<td><?php echo $dataQuo[0]['usu_primer_nombre']." ".$dataQuo[0]['usu_primer_apellido']; ?></td>
							<td><?php echo $dataQuo[0]['cot_token']?></td>
							<td><?php echo $dataQuo[0]['cot_estado']?></td>
						</tr>
			</table>
		</div>
		<?php
			foreach ($dataQuo as $item) {
				$dataPro = $this->master->selectBy("producto",array());
			}
		?>
		<div class="">
			 Producto: A12
		</div>
		<div class="">
						<label for="nad">Recarga</label>
			<input type="text" id="nada" name="" value="" >
		</div>
	</div>
</div>

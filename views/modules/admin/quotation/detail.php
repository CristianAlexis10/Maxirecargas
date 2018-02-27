<div class="modules">
	<div class="title">
			<p>Datos del usuario</p>
		</div>
		<div class="container--cotizacion">
			<?php
				$dataQuo = $this->master->datosCotizacion(base64_decode($_GET['data']));
				$_SESSION['cod_detail_id'] = $dataQuo[0]['cot_codigo'];
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
					<!-- datos -->
					<div class="title">
							<p>Responder Cotización</p>
					</div>
					<table>
						<tr>
							<th>N°</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Servicio</th>
							<th>Obs</th>
							<th>Total</th>
						</tr>
				<?php
				$i = 0;
				$n = 1;
					foreach ($dataQuo as $item) {?>
						<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $item['pro_referencia']; ?></td>
								<td><?php echo $item['proxcot_cantidad'] ;?></td>
								<td><?php echo $item['tip_ser_nombre']; ?></td>
								<td><?php echo $item['proxcod_observacion']; ?></td>
								<td><input type="number" onkeypress="return eliminarLetras(event)" name="dataQuotation" id="<?php echo $i ;?>" class="<?php echo $item['pro_referencia']; ?> <?php echo $item['proxcot_cantidad'] ;?> <?php echo $item['Tip_ser_cod'];?> EvelinAcaTuClase" placeholder="Ingresa la respuesta"></td>
						</tr>
					<?php
					  $i++;
						$n++;
					}		?>
				</table>
				<div class="frm-group">
					<label for="aditionalObs">Nota Adicional:</label>
					<textarea id="aditionalObs" rows="8" cols="80"></textarea>
				</div>
					<input type="button" name="" id="saveResponse" value="Responder">
			</div>
	</div>
</div>

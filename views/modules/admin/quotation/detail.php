<div class="modules">
	<div class="title">
			<p>Responder Cotización</p>
		</div>
		<div class="container--cotizacion">
			<?php
				$dataQuo = $this->master->datosCotizacion(base64_decode($_GET['data']));
				$_SESSION['cod_detail_id'] = $dataQuo[0]['cot_codigo'];
			?>
			<div class="visit today">
				<h1 class="title--customer--detail">datos del cliente</h1>
				<div class="data--customer--detail">
					<p class="firthP">Cliente:</p>
					<p class="secondP"><?php echo $dataQuo[0]['usu_primer_nombre']." ".$dataQuo[0]['usu_primer_apellido']; ?></p>
				</div>
				<div class="data--customer--detail">
					<p class="firthP">Codigo:</p>
					<p class="secondP"><?php echo $dataQuo[0]['cot_token']?> </p>
				</div>
				<div class="data--customer--detail">
					<p class="firthP">Estado: </p>
					<p class="secondP"><?php echo $dataQuo[0]['cot_estado']?> </p>
				</div>

					<?php if ($dataQuo[0]['cot_estado']=="Terminado"){ ?>
						<a href="generar-cotizacion-<?php echo $dataQuo[0]['cot_codigo'] ?>">Ver formato</a>
					<?php }?>
					<!-- datos -->
					<h1 class="title--customer--detail other">datos de los productos</h1>
					<div class="containerTable">
						<table>
						<tr>
							<th>N°</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Servicio</th>
							<th>Obs</th>
							<th>Total</th>
						</tr>
					</div>
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
								<?php if ($dataQuo[0]['cot_estado']=="Terminado"){ ?>
									<td><input type="number" onkeypress="return eliminarLetras(event)" name="dataQuotation" id="<?php echo $i ;?>" class="<?php echo  str_replace(" ","__",$item['pro_referencia']); ?> <?php echo $item['proxcot_cantidad'] ;?> <?php echo $item['Tip_ser_cod'];?> inputRespuesta" placeholder="Ingresa la respuesta" value="<?php echo $item['proxcod_res'] ?>" ></td>
								<?php }else{ ?>
									<td><input type="number" onkeypress="return eliminarLetras(event)" name="dataQuotation" id="<?php echo $i ;?>" class="<?php echo  str_replace(" ","__",$item['pro_referencia']); ?> <?php echo $item['proxcot_cantidad'] ;?> <?php echo $item['Tip_ser_cod'];?> inputRespuesta" placeholder="Ingresa la respuesta"></td>
								<?php } ?>
						</tr>
					<?php
					  $i++;
						$n++;
					}		?>
				</table>
				<div class="form-group">
					<label for="aditionalObs" class="label">Nota Adicional:</label>
					<?php if ($dataQuo[0]['cot_estado']=="Terminado"){ ?>
						<textarea id="aditionalObs" rows="4" cols="80" class="input grande"><?php echo $dataQuo[0]['cot_observacion'] ?></textarea>
				</div>
					<div class="form-group">
						<input type="button" name="" id="saveResponse" value="Modificar" class="btn">
					</div>
						<?php }else{ ?>
					<div class="form-group">
						<textarea id="aditionalObs" rows="4" cols="80" class="input grande"></textarea>

					</div>
						</div>
						<div class="form-group">
							<input type="button" name="" id="saveResponse" value="Responder" class="btn">
						</div>
						<?php } ?>
			</div>
	</div>
</div>

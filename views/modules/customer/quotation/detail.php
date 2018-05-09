
<?php
 $_SESSION['cod_detail_id'] = base64_decode($_GET['data']);
 $_SESSION['usu_cot'] = $data_quo[0]['usu_codigo'];
?>
<div class="container--detail">
  <span><i class="fa fa-bars menuDetail" aria-hidden="true" id="menu"></i><i class="fa fa-bars menuDetail" aria-hidden="true" id="menu-mobile"></i></span>
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
				<a href="generar-cotizacion-<?php echo $data_quo[0]['cot_codigo'] ?>">Ver formato</a>
			</div>
		<?php } ?>
		<div class="wrap--btns">
				<a href="#" id="viewAllProducts" class="detail--btn">Ver artículos</a>
		</div>
	 </div>
	 <div class="content--detailRight">
		 <img src="views/assets/image/flat/check.png">
		 <h2>¡Estamos felices de trabajar para usted!</h2>
		 <!-- <h1>¡Gracias por trabajar con nosotros!</h1> -->
	 </div>
	<div class="detail--figure">
	</div>
</div>

<div class='modal' id="modalProductsCustomer">
  <div class='modal--container detail'>
    <span id="close_modal_producto" class="close--modal">&times;</span>
    <h1 class="title--modalDetail">Detalles Del Productos</h1>
    <div class="container_table">
      <table>
      <tr>
        <th>Producto</th>
        <th>Referencia</th>
        <th>Servicio</th>
        <th>Cant</th>
        <th class="nodata-Observacion">Observación</th>
      </tr>
    <?php
      foreach ($data_quo as $row) {
      echo "<tr>";
       echo "<td>".$row['tip_pro_nombre']."</td>";
       echo "<td>".$row['pro_referencia']."</td>";
       echo "<td>".$row['tip_ser_nombre']."</tb>";
       echo "<td>".$row['proxcot_cantidad']."</tb>";
       echo "<td class='nodata-Observacion'>".$row['proxcod_observacion']."</tb>";
       echo "</tr>";
      }
      ?>
    </table>
    </div>
  </div>
</div>

<!-- contacto -->
<div id="contact"></div>

  </article>
  </div>
  </section>
 	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script type="text/javascript" src="views/assets/js/quotation-customer.js"></script>
   <script src="views/assets/js/menu.js"></script>
    </body>
</html>

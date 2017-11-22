<?php
	$result = $this->readBy(base64_decode($_GET['data']));
	$inner = $this->master->innerJoinBy(array('usuario','tipo_documento'),array('id_tipo_documento','id_tipo_documento'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner2 = $this->master->innerJoinBy(array('usuario','ciudad'),array('id_ciudad','id_ciudad'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner3 = $this->master->innerJoinBy(array('usuario','tipo_usuario'),array('tip_usu_codigo','tip_usu_codigo'),array('usu_codigo',base64_decode($_GET['data'])));

	$inner5 = $this->master->innerJoinBy(array('usuario','estado'),array('id_estado','id_estado'),array('usu_codigo',base64_decode($_GET['data'])));
?>
<div class="modules customers">
	<div class="title">
		<p>INFORMACIÓN EMPRESARIAL</p>
	</div>
	<div class="user--info">
		<div class="detail">
			<p class="item--detail">Nombre Empresa:</p>
			<p class="data--detail"> <?php echo  $result['usu_primer_nombre'].' '.   $result['usu_segundo_nombre'].' '.$result['usu_primer_apellido'].' '.$result['usu_segundo_apellido'];?></p></li>
		</div>
		<div class="detail">
			<p class="item--detail">Nit:</p>
			<p class="data--detail"><?php echo $inner['tip_doc_nombre']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Razón social:</p>
			<p class="data--detail"><?php echo  $result['usu_num_documento'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Nombre Sede:</p>
			<p class="data--detail"><?php echo  $result['usu_correo'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Telefono:</p>
			<p class="data--detail"><?php echo $inner2['ciu_nombre']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Logo:</p>
			<p class="data--detail"> <img src="views/assets/image/profile/<?php echo  $result['foto'];?>" alt="Foto  no Disponible"></p>
		</div>
		<a href="modificar-cliente-<?php echo $_GET['data']?>">Modificar Datos Empresariales</a>

	</div>
</div>

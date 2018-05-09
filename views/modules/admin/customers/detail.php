<?php
	$result = $this->readBy(base64_decode($_GET['data']));
	$inner = $this->master->innerJoinBy(array('usuario','tipo_documento'),array('id_tipo_documento','id_tipo_documento'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner2 = $this->master->innerJoinBy(array('usuario','ciudad'),array('id_ciudad','id_ciudad'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner3 = $this->master->innerJoinBy(array('usuario','tipo_usuario'),array('tip_usu_codigo','tip_usu_codigo'),array('usu_codigo',base64_decode($_GET['data'])));

	$inner5 = $this->master->innerJoinBy(array('usuario','estado'),array('id_estado','id_estado'),array('usu_codigo',base64_decode($_GET['data'])));
?>
<div class="modules customers">
	<div class="title">
		<p>INFORMACIÓN</p>
	</div>
	<div class="wrap--btns">
		<ul>
			<?php
			$modulo = 'usuarios';
			$crud = permisos($modulo,$permit);
			 if($crud[2]==1){?>
			<li class="item"><a href="modificar-cliente-<?php echo $_GET['data']?>" class="btn_empr">Modificar</a></li>
			<?php }  ?>
		</ul>
	</div>
	<div class="user--info">
		<div class="detail">
			<p class="item--detail">Nombre Completo:</p>
			<p class="data--detail"> <?php echo  $result['usu_primer_nombre'].' '.   $result['usu_segundo_nombre'].' '.$result['usu_primer_apellido'].' '.$result['usu_segundo_apellido'];?></p></li>
		</div>
		<div class="detail">
			<p class="item--detail">Tipo De Documento:</p>
			<p class="data--detail"><?php echo $inner['tip_doc_nombre']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Número De Documento:</p>
			<p class="data--detail"><?php echo  $result['usu_num_documento'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Correo:</p>
			<p class="data--detail"><?php echo  $result['usu_correo'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Ciudad:</p>
			<p class="data--detail"><?php echo $inner2['ciu_nombre']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Dirección:</p>
			<p class="data--detail"><?php echo  $result['usu_direccion'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Sexo:</p>
			<p class="data--detail"><?php echo  $result['usu_sexo'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Celular:</p>
			<p class="data--detail"><?php echo  $result['usu_celular'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Teléfono:</p>
			<p class="data--detail"><?php echo  $result['usu_telefono'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Fecha de Nacimiento:</p>
			<p class="data--detail"> <?php echo  $result['usu_fecha_nacimiento'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Rol: </p>
			<p class="data--detail"><?php echo $inner3['tip_usu_rol']?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Fecha de Registro en el Sistema:</p>
			<p class="data--detail"><?php echo  $result['usu_fechas_registro'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Último Ingreso en el Sistema:</p>
			<p class="data--detail"><?php echo  $result['usu_ult_inicio_sesion'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Estado:</p>
			<p class="data--detail"><?php echo  $inner5['est_estado'];?></p>
		</div>
		<div class="detail">
			<p class="item--detail">Foto de perfil:</p>
			<p class="data--detail"> <img src="views/assets/image/profile/<?php echo  $result['foto'];?>" alt="Foto de perfil no Disponible"></p>
		</div>
	</div>

</div>

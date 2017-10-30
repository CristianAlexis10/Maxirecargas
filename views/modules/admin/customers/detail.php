<?php 
	$result = $this->readBy(base64_decode($_GET['data']));
	$inner = $this->master->innerJoinBy(array('usuario','tipo_documento'),array('id_tipo_documento','id_tipo_documento'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner2 = $this->master->innerJoinBy(array('usuario','ciudad'),array('id_ciudad','id_ciudad'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner3 = $this->master->innerJoinBy(array('usuario','tipo_usuario'),array('tip_usu_codigo','tip_usu_codigo'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner4 = $this->master->innerJoinBy(array('usuario','sexo'),array('id_sexo','id_sexo'),array('usu_codigo',base64_decode($_GET['data'])));
	$inner5 = $this->master->innerJoinBy(array('usuario','estado'),array('id_estado','id_estado'),array('usu_codigo',base64_decode($_GET['data'])));
?>
<div class="modules customers">
	<div class="title">
		<p>INFORMACIÓN</p>
	</div>
	<div class="user--info">
		<ul>
			<li class="item"><p>Nombre Completo: <?php echo  $result['usu_primer_nombre'].' '.   $result['usu_segundo_nombre'].' '.$result['usu_primer_apellido'].' '.$result['usu_segundo_apellido'];?></p></li>
			<li class="item"><p>Tipo De Documento: <?php echo $inner['tip_doc_nombre']?> </p></li>
			<li class="item"><p>Numero De Documento: <?php echo  $result['usu_num_documento'];?></p></li>
			<li class="item"><p>Correo: <?php echo  $result['usu_correo'];?></p></li>
			<li class="item"><p>Cuidad: <?php echo $inner2['ciu_nombre']?></p></li>
			<li class="item"><p>Dirección: <?php echo  $result['usu_direccion'];?></p></li>
			<li class="item"><p>Sexo: <?php echo  $inner4['sexo'];?></p></li>
			<li class="item"><p>Celular: <?php echo  $result['usu_celular'];?></p></li>
			<li class="item"><p>Telefono: <?php echo  $result['usu_telefono'];?></p></li>
			<li class="item"><p>Fecha de Nacimiento: <?php echo  $result['usu_fecha_nacimiento'];?></p></li>
			<li class="item"><p>Rol: <?php echo $inner3['tip_usu_rol']?></p></li>
			<li class="item"><p>Fecha de Registro en el Sistema: <?php echo  $result['usu_fecha_registro'];?></p></li>
			<li class="item"><p>Último Ingreso en el Sistema: <?php echo  $result['usu_ult_inicio_sesion'];?></p></li>
			<li class="item"><p>Estado: <?php echo  $inner5['est_estado'];?></p></li>
			<li class="item"><p>Foto de perfil: <img src="views/assets/image/profile/<?php echo  $result['foto'];?>" alt="Foto de perfil no Disponible"></p></li>
		</ul>
	</div>
	<div class="wrap--btns">
		<ul>
			<?php
			$modulo = 'usuarios';
			$crud = permisos($modulo,$permit);
			 if($crud[2]==1){?>
			<li class="item"><a href="modificar-cliente-<?php echo $_GET['data']?>">Modificar</a></li>
			<?php }  if($crud[3]==1){?>
			<li class="item"><a href="eliminar-cliente-<?php echo $_GET['data']?>" onclick="return confirmDelete()">Eliminar</a></li>
			<?php } ?>
		</ul>
	</div>
</div>

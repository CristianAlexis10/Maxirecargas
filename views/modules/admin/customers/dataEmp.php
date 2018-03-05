<?php
	$result = $this->master->consultaClienteEmpresarial(base64_decode($_GET['data']));
	$sede= $this->master->consultaSedeByCodi($result['sed_codigo']);
	$empresa= $this->master->ConsultaEmpresaByCod($sede['emp_codigo']);
	// print_r($result);
?>
<div class="modules customers">
	<div class="title">
		<p>INFORMACIÓN EMPRESARIAL</p>
	</div>
	<div class="wrap--btns">
		<?php
		$modulo = 'usuarios';
		$crud = permisos($modulo,$permit);
		if($crud[2]==1){?>
			<a href="modificar-cliente-empresarial-<?php echo $_GET['data']?>" class="btn_empr">Modificar Datos Empresariales</a>
		<?php }?>
	</div>
	<div class="user--info">
		<div class="detail">
			<p class="item--detail">Nombre Empresa:</p>
			<p class="data--detail"> <?php echo  $empresa['emp_nombre'];?></p></li>
		</div>
		<div class="detail">
			<p class="item--detail">Nit:</p>
			<p class="data--detail"><?php echo $empresa['emp_nit']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Razón social:</p>
			<p class="data--detail"><?php echo  $empresa['emp_razon_social'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Nombre Sede:</p>
			<p class="data--detail"><?php echo  $sede['sed_nombre'];?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Telefono de la Sede:</p>
			<p class="data--detail"><?php echo $sede['sed_telefono']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Direccion de la Sede:</p>
			<p class="data--detail">lopera colocar el php aca</p>
		</div>
		<div class="detail">
			<p class="item--detail">Cargo en la sede:</p>
			<p class="data--detail"><?php echo $result['cli_emp_cargo']?> </p>
		</div>
		<div class="detail">
			<p class="item--detail">Logo:</p>
			<p class="data--detail"> <img src="views/assets/image/profile/<?php echo  $result['foto'];?>" alt="Foto  no Disponible"></p>
		</div>

	</div>
</div>

<?php
	$result = $this->master->selectBy('cliente_empresarial',array('usu_codigo',base64_decode($_GET['data'])));

	$sede= $this->master->selectBy('sede',array('sed_codigo',$result['sed_codigo']));
	$empresa= $this->master->selectBy('empresa',array('emp_codigo',$sede['emp_codigo']));
	// print_r($result);
	$_SESSION['emp_code']=$empresa['emp_codigo'];
	$_SESSION['sed_code']=$sede['sed_codigo'];
	$_SESSION['cli_code']=$result['id_cliente_empresarial'];
?>
<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>
		<form id="frmUpdaDataEmp" >
			<div class="wrap_two_formgroup">
				<div class="form-group">
					<label class="label">Nombre Empresa:</label>
					<input type="text" class="dataEmp input" value="<?php echo  $empresa['emp_nombre'];?>">
				</div>
				<div class="form-group">
					<label class="label">Nit:</label>
					<input type="text" class="dataEmp input" value="<?php echo  $empresa['emp_nit'];?>">
				</div>
			</div>
			<div class="wrap_two_formgroup">
				<div class="form-group">
					<label class="label">Razón social:</label>
					<input type="text" class="dataEmp input" value="<?php echo  $empresa['emp_razon_social'];?>">
				</div>
				<div class="form-group">
					<label class="label">Nombre Sede:</label>
					<input type="text" class="dataEmp input" value="<?php echo  $sede['sed_nombre'];?>">
				</div>
			</div>
			<div class="wrap_two_formgroup">
				<div class="form-group">
					<label class="label">Dirección Sede:</label>
					<input type="text" class="dataEmp input" value="<?php echo  $sede['sed_direccion'];?>">
				</div>
				<div class="form-group">
					<label class="label">Teléfono sede:</label>
					<input type="text" class="dataEmp input" value="<?php echo  $sede['sed_telefono'];?>">
				</div>
			</div>
						<div class="form-group">
							<label class="label">Cargo :</label>
							<input type="text" class="dataEmp input grande" value="<?php echo  $result['cli_emp_cargo'];?>">
						</div>
						<div class="form-group">
							<input type="submit" name="" value="Modificar" class="btn">
						</div>

		  </form>
</div>

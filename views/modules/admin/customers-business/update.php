<?php
	$result = $this->master->selectBy('cliente_empresarial',array('usu_codigo',base64_decode($_GET['data'])));

	$sede= $this->master->selectBy('sede',array('sed_codigo',$result['sed_codigo']));
	$empresa= $this->master->selectBy('empresa',array('emp_codigo',$sede['emp_codigo']));
	// print_r($result);
	$_SESSION['emp_code']=$empresa['emp_codigo'];
?>
<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>


		    	<form id="frmUpdaDataEmp" >
					<div class="user--info">
						<div class="detail">
							<p class="item--detail">Nombre Empresa:</p>
							<input type="text" class="dataEmp" value="<?php echo  $empresa['emp_nombre'];?>">
						</div>
						<div class="detail">
							<p class="item--detail">Nit:</p>
							<input type="text" class="dataEmp" value="<?php echo  $empresa['emp_nit'];?>">
						</div>
						<div class="detail">
							<p class="item--detail">Razón social:</p>
							<input type="text" class="dataEmp" value="<?php echo  $empresa['emp_razon_social'];?>">
						</div>
						<div class="detail">
							<p class="item--detail">Nombre Sede:</p>
							<input type="text" class="dataEmp" value="<?php echo  $sede['sed_nombre'];?>">
						</div>
						<div class="detail">
							<p class="item--detail">Dirección Sede:</p>
							<input type="text" class="dataEmp" value="<?php echo  $sede['sed_direccion'];?>">
						</div>
						<div class="detail">
							<p class="item--detail">Telefono sede:</p>
							<input type="text" class="dataEmp" value="<?php echo  $sede['sed_telefono'];?>">
						</div>
						<div class="detail">

							<input type="submit" name="" value="Modificar">
						</div>
					</div>
		    	</form>
</div>

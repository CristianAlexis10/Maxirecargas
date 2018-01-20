<?php
$result =$this->readBy(base64_decode($_GET['data']));
$_SESSION['service_update']=base64_decode($_GET['data']);
?>
<div class="modules services">
	<div class="title">
		<p>MODIFICAR SERVICIO</p>
	</div>
		<form class="frmServices" id="frmUpdateService">
		  <div class="form-group">
			  <label for="nombre" class="label">Nombre:</label>
			  <input type="text" name="dataUpdateService" id="nombre" class="input grande" value="<?php echo $result['tip_ser_nombre']?>" required>
			<div>
			<div class="form-group">
			  <label for="des" class="label">Descripción:</label>
			  <textarea name="data[]" id="des" class="textarea"><?php echo $result['tip_ser_descripcion']?></textarea>
		  </div>
			<div class="form-group">
			   <button class="btn">Actualizar Servicio</button>
			</div>
		</form>
</div>

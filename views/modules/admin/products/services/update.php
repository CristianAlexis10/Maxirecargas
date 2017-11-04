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
			                <label for="nombre" class="required">Nombre:</label>
			                <input type="text" name="dataUpdateService" id="nombre" value="<?php echo $result['tip_ser_nombre']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="des" class="required">Descripción:</label>
			                <textarea name="data[]" id="des"><?php echo $result['tip_ser_descripcion']?></textarea>
			            </div>
			             
			            <div class="form-group">
			                <button class="btn">Actualizar Servicio</button>
			            </div>
		    	</form>
</div>

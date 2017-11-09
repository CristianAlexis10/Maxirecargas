<?php
$result =$this->master->selectBy('marca',array('mar_codigo',base64_decode($_GET['data'])));
$_SESSION['trademark_update']=base64_decode($_GET['data']);
?>
<div class="modules services">
	<div class="title">
		<p>MODIFICAR MARCA</p>
	</div>

		    	<form class="frmServices" action="guardar-modificacion-marca" method="post">
		    		 <div class="form-group">
			                <label for="nombre" class="required">Nombre:</label>
			                <input type="text" name="data[]" id="nombre" value="<?php echo $result['mar_nombre']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="des" class="required">Descripción:</label>
			                <textarea name="data[]" id="des"><?php echo $result['mar_descripcion']?></textarea>
			            </div>

			            <div class="form-group">
			                <button class="btn">Actualizar Marca</button>
			            </div>
		    	</form>
</div>

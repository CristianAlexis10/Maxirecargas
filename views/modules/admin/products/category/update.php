<?php
$result =$this->readBy(base64_decode($_GET['data']));
$_SESSION['category_update']=base64_decode($_GET['data']);
?>
<div class="modules services">
	<div class="title">
		<p>MODIFICAR CATEGORIA</p>
	</div>
		 <form class="frmServices" action="guardar-modificacion-categoria" method="post">
		   <div class="form-group">
			    <label for="nombre" class="label">Nombre:</label>
			    <input type="text" name="data[]" id="nombre" class="input grande" value="<?php echo $result['tip_pro_nombre']?>" required>
			 </div>
			 <div class="form-group">
			   	<label for="des" class="label">Descripción:</label>
			   	<textarea name="data[]" id="des" class="textarea"><?php echo $result['tip_pro_descripcion']?></textarea>
			 </div>

			            <div class="form-group">
			                <button class="btn">Actualizar Categoria</button>
			            </div>
		    	</form>
</div>

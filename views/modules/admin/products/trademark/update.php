<?php
$result =$this->master->selectBy('marca',array('mar_codigo',base64_decode($_GET['data'])));
$_SESSION['trademark_update']=base64_decode($_GET['data']);
?>
<div class="modules services">
	<div class="title">
		<p>MODIFICAR MARCA</p>
	</div>
		 <form class="frmServices"  id='frmUpdateMark'>
		   <div class="form-group">
			    <label for="nombre" class="label">Nombre:</label>
			    <input type="text" name="dataUpdateMark" id="nombre" class="input grande" value="<?php echo $result['mar_nombre']?>" required>
			  </div>
			  <div class="form-group">
			    <label for="des" class="label">Descripción:</label>
			    <textarea  id="desMark" class="textarea"><?php echo $result['mar_descripcion']?></textarea>
			  </div>
			  <div class="form-group">
			    <button class="btn">Actualizar Marca</button>
			  </div>
		  </form>
</div>

<?php
$result =$this->readBy(base64_decode($_GET['data']));
$_SESSION['product_update']=base64_decode($_GET['data']);
?>
<div class="modules services">
	<div class="title">
		<p>MODIFICAR PRODUCTO</p>
	</div>


<div class="form--left">

	<form  id="frmNerProduct">
		  <div class="form-group">
				<label for="marca" class="required ">Marca:</label>
			   <select name="data[]" id="marca" class="data-new-pro input" required >
				<?php foreach($this->master->selectAll("marca") AS $row) {?>
					<option value="<?php echo $row['mar_codigo']?>"><?php echo $row['mar_nombre'] ?></option>
				<?php } ?>
				<option value="newMark">Otra</option>
			   </select>
			</div>
			<div class="form-group">
				<label for="categoria" class="required">Categoria:</label>
			   <select  id="categoria" class="data-new-pro input " required>
				<?php foreach($this->master->selectAll("tipo_producto") AS $row) {?>
					<option value="<?php echo $row['tip_pro_codigo']?>"><?php echo $row['tip_pro_nombre'] ?></option>
				<?php } ?>
				<option value="newCategory">Otra</option>
			   </select>
			</div>
		 <div class="form-group">
				<label for="rf" class="label">Referencia:</label>
				<input type="text" name="data[]" id="rf" class="input data-new-pro" required>
			</div>

			<?php
			foreach ($this->master->selectAll("tipo_servicio") AS $row) {?>
		  <label><?php echo $row['tip_ser_nombre'] ?>
			<input type="checkbox"  name="ch-tip-ser" value="<?php echo $row['Tip_ser_cod']?>"  >
		  </label>

			<?php }  ?>
			 <div class="form-group">
				<label for="caracteristica" class="label">Caracteristicas:</label>
								<textarea name="data[]" id="caracteristica" class="input data-new-pro"></textarea>

			</div>
			<div class="form-group">
				<input type="taxt" id="img" class="data-new-pro" value="icn-maxi.png">
			</div>


		</div>
					<div class="form--rigth rigth--product">
						<div class="form-group Cambiar--img">
						 <div id="wrap-result"><img src="views/assets/image/icn-maxi.png" ></div>
						 <span class="" id="cropp-img">Cambiar foto</span>
					 </div>
				<div class="form-group">
					<button class="btn" >Modificar</button>
				</div>
					</div>
	</form>



	<div class="img-product">
		<div class="newMark--img">
			<div id="uploadImage">
				<div id="wrap-upload" style="width:350px"></div>
				<input type="file" id="upload">
				<button class="btn btn-success upload-result">Recortar Imagen</button>
			  </div>
		</div>
	</div>
</div>

<?php
$result =$this->readBy(base64_decode($_GET['data']));
$services = $this->master->selectAllBy("servicioxproducto",array("pro_codigo",base64_decode($_GET['data'])));
// print_r($services);
$_SESSION['product_update']=base64_decode($_GET['data']);
$servies_real;
foreach ($services as $key => $value) {
	$servies_real[] = $value['tip_ser_cod'];
}
?>
<link type="text/css" rel="stylesheet" href="views/assets/css/multiple-select.css"  media="screen,projection"/>
<div class="modules services">
	<div class="title">
		<p>MODIFICAR PRODUCTO</p>
	</div>
	<div class="update">
	<div class="form--left">
		<form  id="frmUpdateProduct">
				<div class="form-group">
					<label for="marca" class="label">Marca:</label>
					<select name="data[]" id="marca" class="data-new-pro input" required >
						<?php foreach($this->master->selectAll("marca") AS $row) {
							if ($result['mar_codigo']==$row['mar_codigo']) {?>
								<option value="<?php echo $row['mar_codigo']?>" selected><?php echo $row['mar_nombre'] ?></option>
							<?php }else{?>
								<option value="<?php echo $row['mar_codigo']?>"><?php echo $row['mar_nombre'] ?></option>
							<?php }  }?>
						</select>
					</div>
					<div class="form-group">
						<label for="categoria" class="select">Categoria:</label>
						<select  id="categoria" class="data-new-pro input " required>
							<?php foreach($this->master->selectAll("tipo_producto") AS $row) {
								if ($result['tip_pro_codigo']==$row['tip_pro_codigo']) { ?>
									<option value="<?php echo $row['tip_pro_codigo']?> " selected><?php echo $row['tip_pro_nombre'] ?></option>
								<?php }else{?>
									<option value="<?php echo $row['tip_pro_codigo']?>"><?php echo $row['tip_pro_nombre'] ?></option>
								<?php } } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="rf" class="label">Referencia:</label>
							<input type="text" name="data[]" id="rf" class="input data-new-pro " required value="<?php echo $result['pro_referencia']?>">
						</div>
						<div class="form-group">
							<label for="selectMul" class="select">Servicios: </label>
							<select multiple="multiple" id="selectMul">
								<?php
								$i = 0;
								foreach ($this->master->selectAll("tipo_servicio") AS $row) {
									if (in_array($row['Tip_ser_cod'],$servies_real)) {?>
										<option value="<?php echo $row['Tip_ser_cod']?>" selected><?php echo $row['tip_ser_nombre'] ?></option>
									<?php }else{?>
										<option value="<?php echo $row['Tip_ser_cod']?>"  ><?php echo $row['tip_ser_nombre'] ?></option>
									<?php  }
									$i++;
								}  ?>
							</select>
						</div>
						<div class="form-group">
							<label for="caracteristica" class="label">Caracteristicas:</label>
							<textarea name="data[]" id="caracteristica" class="input data-new-pro"><?php echo $result['pro_descripcion']?>
							</textarea>
						</div>
						<div class="form-group">
							<input type="hidden" id="img" class="data-new-pro input" value="<?php echo $result['pro_imagen'] ?>">
						</div>
						<div class="form-group">
						<label class="select">Estado</label>
						<select class="data-new-pro input">
							<?php
							if ($result['pro_estado']==1) {?>
								<option value="1" selected>Activo</option>
								<option value="2">Inactivo</option>
							<?php }else{?>
								<option value="1">Activo</option>
								<option value="2" selected>Inactivo</option>
							<?php } ?>
						</select>
					</div>
		</div>
	<div class="form--rigth rigth--product">
			<div class="form-group Cambiar--img">
				<div id="wrap-result"><img src="views/assets/image/products/<?php echo $result['pro_imagen']; ?>" ></div>
				<span class="" id="cropp-img">Cambiar foto</span>
			</div>
			<div class="form-group">
				<button class="btn" >Modificar</button>
			</div>
	</div>
	</form>
	</div>


	<div id="img-product">
			<div class="newMark--img">
				<span id="closeImg">&times;</span>
				<div id="uploadImage">
					<div id="wrap-upload" style="width:300px"></div>
					<input type="file" id="upload">
					<button class="btn btn-success upload-result">Recortar Imagen</button>
				</div>
			</div>
		</div>
</div>

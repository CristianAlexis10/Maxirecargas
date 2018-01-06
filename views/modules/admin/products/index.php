
<link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="views/assets/css/multiple-select.css"  media="screen,projection"/>
<style media="screen">
	#modal--new,#modal--newCt{
		display: none;
	}
</style>
<div class="modules customers">
	<div class="title">
		<p>PRODUCTOS</p>
	</div>
	<?php
		$modulo = 'productos';
		$crud = permisos($modulo,$permit);
		if ($crud[0]==true) {?>

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

<?php } ?>

</div>
	<div id="tabs">
		  <ul>
		    <?php if ($crud[0]==true) {?>
		   	 <li><a href="#tabs-1">Nuevo Producto</a></li>
		   <?php } ?>
		  <?php if ($crud[1]==true) {?>
		  	  <li><a href="#tabs-2">Lista de Productos</a></li>
			    <li><a href="#tabs-3">Categorias</a></li>
			    <li><a href="#tabs-4">Marcas</a></li>
			    <li><a href="#tabs-5">Servicios</a></li>
		 <?php } ?>
		  </ul>


		  <?php if ($crud[1]==true) {?>
			  <div id="tabs-2">
			  		<?php require_once "views/modules/config/datatables/datatable-products.php"; ?>
			  </div>
		<?php }?>
		  <?php if ($crud[0]==true) {?>
		  <div id="tabs-1" class="new products">
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
									Servicios: <select multiple="multiple" id="selectMul">
			            <?php
			            foreach ($this->master->selectAll("tipo_servicio") AS $row) {?>
										<option value="<?php echo $row['Tip_ser_cod']?>"><?php echo $row['tip_ser_nombre'] ?></option>

			            <?php }  ?>
								</select>
			             <div class="form-group">
			                <label for="caracteristica" class="label">Caracteristicas:</label>
											<textarea name="data[]" id="caracteristica" class="input data-new-pro"></textarea>

			            </div>
						<div class="form-group">
							<input type="hidden" id="img" class="data-new-pro" value="icn-maxi.png">
						</div>




			           <!--  <div class="form-group">
			                <label for="img" class="required">Logo:</label>
			                <input type="file" name="file" id="img-new-pro"  required>
			            </div> -->
					</div>
								<div class="form--rigth rigth--product">
									<div class="form-group Cambiar--img">
			 						 <div id="wrap-result"><img src="views/assets/image/icn-maxi.png" ></div>
			 						 <span class="" id="cropp-img">Cambiar foto</span>
			 					 </div>
				            <div class="form-group">
				                <button class="btn" >Registrar</button>
				            </div>
								</div>
		    	</form>
		  </div>
		  <?php } ?>



		  <div id="tabs-3">
		  	<?php if ($crud[0]==true) {?>
			  	<div class="new--obj">
						<i class="fa fa-plus" aria-hidden="true"></i>
			  		<a href="nueva-categoria">Nueva Categoria</a>
			  	</div>
		  	<?php } if ($crud[1]==true) {
		  	 require_once "views/modules/config/datatables/datatable-categories.php";
		  	} ?>

		  </div>
		  <div id="tabs-4">
		  	<?php if ($crud[0]==true) {?>
			  	<div class="new--obj">
						<i class="fa fa-plus" aria-hidden="true"></i>
			  		<a href="nueva-marca">Nueva Marca</a>
			  	</div>
			<?php }  if ($crud[1]==true) {
				require_once "views/modules/config/datatables/datatable-trademark.php";
			} ?>
		  </div>
		  <div id="tabs-5">
		  	<?php if ($crud[0]==true) {?>
		  	<div class="new--obj">
					<i class="fa fa-plus" aria-hidden="true"></i>
		  		 <a href="nuevo-servicio">Nuevo Servicio</a>
		  	</div>

            	<?php }  if ($crud[1]==true) {
            		require_once "views/modules/config/datatables/datatable-services.php";
            	} ?>

		  </div>

	</div>
</div>
<div class="newMark--modal" id="modal--new">
	<div class="container--newMark">
			<span id="closeNew">&times;</span>
			<form id="frmNewMar">
			<h1>crea una nueva marca</h1>
			<div class="form-group">
				 <label for="nombre" class="required label">Nombre:</label>
				 <input type="text" name="dataNewMark" id="nombre" class="input" required>
			</div>
			<div class="form-group">
				 <label for="des" class="required label">Descripción:</label>
					<textarea  id="desMar" class="input"></textarea>
			</div>
			<div class="form-group">
				<button class="btn">Registrar</button>
			</div>
		</form>
		</div>
	</div>
<div class="new--category" id="modal--newCt">
	<div class="container--newcategory">
			<span id="closeNewCt">&times;</span>
			<h1>Registra una nueva categoria</h1>
			<form class="form Services" id="frmNewCategorie">
				<div class="form-group">
					<label for="nombre" class="required label">Nombre:</label>
					<input type="text" name="dataNewCate" id="nombre" class="input" required>
				</div>
				<div class="form-group">
					<label for="des" class="required label">Descripción:</label>
					<textarea  id="desCat" class="input"></textarea>
				</div>
				<div class="form-group">
					<button class="btn">Registrar</button>
				</div>
			</form>
		</div>
	</div>

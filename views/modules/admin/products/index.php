
<link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"  media="screen,projection"/>
<div class="modules customers">
	<div class="title">
		<p>PRODUCTOS</p>
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




</div>
	<div id="tabs">
		  <ul>
		    <li><a href="#tabs-2">Lista de Productos</a></li>
		    <li><a href="#tabs-1">Nuevo Producto</a></li>
		    <li><a href="#tabs-3">Categorias</a></li>
		    <li><a href="#tabs-4">Marcas</a></li>
		    <li><a href="#tabs-5">Servicios</a></li>
		  </ul>
		  <div id="tabs-2">
		  	<table class="datatable">
            			<thead>
                				<tr>
                    					<th>Referencia</th>
                    					<!-- <th>Marca</th> -->
                    					<th>Descripción</th>
                    					<th>Acciones</th>
                				</tr>
           			 </thead>
            			<tbody>
            				<?php foreach ($this->readAll() as $row) {?>
                   				 <tr>
                       				 <td><?php echo $row['pro_referencia'];?></td>
                        				<!-- <td><?php //echo $row['id_marca'];?></td> -->
                        				<td><?php echo $row['pro_descripcion'];?></td>
				                       <td>
				                       	<a href="modificar-producto-<?php echo rtrim(strtr(base64_encode($row['ite_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
				                       	<a href="eliminar-producto-<?php echo rtrim(strtr(base64_encode($row['ite_codigo']), '+/', '-_'), '=');?>" onclick="return confirmDelete()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				                       </td>
                  				  </tr>

            				<?php	} ?>
            			</tbody>
      			  </table>
		  </div>

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

		  <div class="img-product">
			  <div class="newMark--img">
				  <div id="uploadImage">
					  <div id="wrap-upload" style="width:350px"></div>
					  <input type="file" id="upload">
					  <button class="btn btn-success upload-result">Recortar Imagen</button>
					</div>
			  </div>
		  </div>


		  <div id="tabs-3">
		  	<div class="new--obj">
					<i class="fa fa-plus" aria-hidden="true"></i>
		  		<a href="nueva-categoria">Nueva Categoria</a>
		  	</div>
				<?php require_once "views/modules/config/datatables/datatable-categories.php"; ?>

		  </div>
		  <div id="tabs-4">
		  	<div class="new--obj">
					<i class="fa fa-plus" aria-hidden="true"></i>
		  		<a href="nueva-marca">Nueva Marca</a>
		  	</div>
				<?php require_once "views/modules/config/datatables/datatable-trademark.php"; ?>
		  </div>
		  <div id="tabs-5">
		  	<div class="new--obj">
					<i class="fa fa-plus" aria-hidden="true"></i>
		  		 <a href="nuevo-servicio">Nuevo Servicio</a>
		  	</div>

            	<?php require_once "views/modules/config/datatables/datatable-services.php"; ?>

		  </div>

	</div>
</div>

<div class="modules customers">
	<div class="title">
		<p>PRODUCTOS</p>
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
                    					<th>Marca</th>
                    					<th>Servicio</th>
                    					<th>Acciones</th>
                				</tr>
           			 </thead>
            			<tbody>
            				<?php foreach ($this->readAll() as $row) {?>
                   				 <tr>
                       				 <td><?php echo $row['referencia'];?></td>
                        				<td><?php echo $row['id_marca'];?></td>
                        				<td><?php echo $row['id_servicio'];?></td>
				                       <td>
				                       	<a href="modificar-producto-<?php echo rtrim(strtr(base64_encode($row['tip_pro_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
				                       	<a href="eliminar-producto-<?php echo rtrim(strtr(base64_encode($row['id_producto']), '+/', '-_'), '=');?>" onclick="return confirmDelete()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				                       </td>
                  				  </tr>

            				<?php	} ?>
            			</tbody>
      			  </table>
		  </div>
		  <div id="tabs-1" class="new products">
			<div class="form--left">

		    	<form class="frmBusiness" action="guardar-producto" method="post" enctype="multipart/form-data">
			            <div class="form-group">
			                <label for="categoria" class="required">Categoria:</label>
			               <select name="data[]" id="categoria" required>
			               	<?php foreach($this->master->selectAll("tipo_producto") AS $row) {?>
			               		<option value="<?php echo $row['tip_pro_codigo']?>"><?php echo $row['nombre'] ?></option>
			               	<?php } ?>
			               </select>
			            </div>
		    		 <div class="form-group-liner">
			                <label for="rf" class="label--liner">Referencia:</label>
			                <input type="text" name="data[]" id="rf" class="input--liner" required>
			            </div>
			             <div class="form-group">
			                <label for="marca" class="required">Marca:</label>
			               <select name="data[]" id="marca" required>
			               	<?php foreach($this->master->selectAll("marca") AS $row) {?>
			               		<option value="<?php echo $row['id_marca']?>"><?php echo $row['nombre'] ?></option>
			               	<?php } ?>
			               </select>
			            </div>
			             <div class="form-group">
			                <label for="servicio" class="required">Servicio:</label>
			               <select name="data[]" id="servicio" required>
			               	<?php foreach($this->master->selectAll("tipo_servicio") AS $row) {?>
			               		<option value="<?php echo $row['id_servicio']?>"><?php echo $row['nombre'] ?></option>
			               	<?php } ?>
			               </select>
			            </div>
			             <div class="form-group-liner">
			                <label for="caracteristica" class="label--liner">Caracteristicas:</label>
											<textarea name="data[]" id="caracteristica" class="input--liner"></textarea>

			            </div>
			            <div class="form-group">
			                <label for="img" class="required">Logo:</label>
			                <input type="file" name="file" id="img" required>
			            </div>
			</div>
								<div class="form--rigth">
				            <div class="form-group">
				                <button class="btn" >Registrar</button>
				            </div>
								</div>
		    	</form>
		  </div>
		  <div id="tabs-3">
		  	<div class="wrap--btns">
		  		<ul>
		  			<li class="item"><a href="nueva-categoria">Nueva Categoria</a></li>
		  		</ul>
		  	</div>
		  	<table class="datatable">
            			<thead>
                				<tr>
                    					<th>Nombre</th>
                    					<th>Descripcion</th>
                    					<th>Acciones</th>
                				</tr>
           			 </thead>
            			<tbody>
            				<?php foreach ($this->master->selectAll('tipo_producto') as $row) {?>
                   				 <tr>
                       				 <td><?php echo $row['nombre'];?></td>
                        				<td><?php echo $row['descripcion'];?></td>
				                       <td>
				                       	<a href="modificar-categoria-<?php echo rtrim(strtr(base64_encode($row['tip_pro_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
				                       	<a href="eliminar-categoria-<?php echo rtrim(strtr(base64_encode($row['tip_pro_codigo']), '+/', '-_'), '=');?>" onclick="return confirmDelete()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				                       </td>
                  				  </tr>

            				<?php	} ?>
            			</tbody>
      			  </table>
		  </div>
		  <div id="tabs-4">
		  	<div class="wrap--btns">
		  		<ul>
		  			<li class="item"><a href="nueva-marca">Nueva Marca</a></li>
		  		</ul>
		  	</div>
		  	<table class="datatable">
            			<thead>
                				<tr>
                    					<th>Nombre</th>
                    					<th>Descripcion</th>
                    					<th>Acciones</th>
                				</tr>
           			 </thead>
            			<tbody>
            				<?php foreach ($this->master->selectAll('marca') as $row) {?>
                   				 <tr>
                       				 <td><?php echo $row['nombre'];?></td>
                        				<td><?php echo $row['descripcion'];?></td>
				                       <td>
				                       	<a href="modificar-marca-<?php echo rtrim(strtr(base64_encode($row['id_marca']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
				                       	<a href="eliminar-marca-<?php echo rtrim(strtr(base64_encode($row['id_marca']), '+/', '-_'), '=');?>" onclick="return confirmDelete()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				                       </td>
                  				  </tr>

            				<?php	} ?>
            			</tbody>
      			  </table>
		  </div>
		  <div id="tabs-5">
		  	<div class="wrap--btns">
		  		<ul>
		  			<li class="item"><a href="nuevo-servicio">Nuevo Servicio</a></li>
		  		</ul>
		  	</div>
		  	<table class="datatable">
            			<thead>
                				<tr>
                    					<th>Nombre</th>
                    					<th>Descripcion</th>
                    					<th>Acciones</th>
                				</tr>
           			 </thead>
            			<tbody>
            				<?php foreach ($this->master->selectAll('tipo_servicio') as $row) {?>
                   				 <tr>
                       				 <td><?php echo $row['tip_ser_nombre'];?></td>
                        				<td><?php echo $row['tip_ser_descripcion'];?></td>
				                       <td>
				                       	<a href="modificar-servicio-<?php echo rtrim(strtr(base64_encode($row['Tip_ser_cod']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
				                       	<a href="eliminar-servicio-<?php echo rtrim(strtr(base64_encode($row['Tip_ser_cod']), '+/', '-_'), '=');?>" onclick="return confirmDelete()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				                       </td>
                  				  </tr>

            				<?php	} ?>
            			</tbody>
      			  </table>
		  </div>

	</div>
</div>

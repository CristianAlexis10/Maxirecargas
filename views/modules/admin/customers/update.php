<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>
		 <form id="frmUpdtateUser">
			 <div class="wrap_two_formgroup">
				 <div class="form-group">
					 <label for="tip_doc" class="label">Tipo de Documento:</label>
					 <select name="data[]"  id="tip_doc" required class="userUpdate input">
						 <?php
						 $_SESSION['user_update']=base64_decode($_GET['data']);
						 $result = $this->readBy(base64_decode($_GET['data']));
						 foreach ($this->master->selectAll('tipo_documento') as $row) {
							 if ($row['id_tipo_doc']==$result['id_tipo_doc']) {?>
								 <option value="<?php echo $row['id_tipo_doc']?>" selected><?php echo $row['nombre']?></option>
								 <?php
							 }else{?>
								 <option value="<?php echo $row['id_tipo_doc']?>"><?php echo $row['nombre']?></option>
								 <?php
							 } } ?>
						 </select>
					 </div>
					 <div class="form-group">
						 <label for="numDoc" class="label">Número de Documento:</label>
						 <input type="number" name="data[]" id="numDoc" class="userUpdate input" value="<?php echo $result['usu_num_documento']?>" required>
					 </div>

			 </div>
			 <div class="wrap_two_formgroup">
				 <div class="form-group">
					 <label for="priNom" class="label">Primer Nombre:</label>
					 <input type="text" name="data[]" id="priNom" class="userUpdate input" value="<?php echo $result['usu_primer_nombre']?>" required>
				 </div>
				 <div class="form-group">
					 <label for="priApe" class="label">Primer Apellido:</label>
					 <input type="text" name="data[]" id="priApe" class="userUpdate input" value="<?php echo $result['usu_primer_apellido']?>" required>
				 </div>


			 </div>
			 <div class="wrap_two_formgroup">
				 <div class="form-group">
					 <label for="correo" class="label">Correo:</label>
					 <input type="email" name="data[]" id="correo" class="userUpdate input" value="<?php echo $result['usu_correo']?>" required>
				 </div>
				 <div class="form-group">
					 <label for="tel" class="label">Teléfono:</label>
					 <input type="number" name="data[]" id="tel" onkeypress="return eliminarLetras(event)" class="userUpdate input" value="<?php echo $result['usu_telefono']?>" required>
				 </div>


			 </div>
			 <div class="wrap_two_formgroup">
				 <div class="form-group">
					 <label for="ciudad" class="label">Ciudad:</label>
					 <select name="data[]"  id="ciudad" class="userUpdate input" required>
						 <?php
						 foreach ($this->master->selectAll('ciudad') as $row) {
							 if ($row['id_ciudad']==$result['id_ciudad']) {?>
								 <option value="<?php echo $row['id_ciudad']?>" selected><?php echo $row['ciu_nombre']?></option>
								 <?php
							 }else{?>
								 <option value="<?php echo $row['id_ciudad']?>"><?php echo $row['ciu_nombre']?></option>
								 <?php
							 } } ?>
						 </select>
					 </div>
					 <div class="form-group">
						 <label for="fecha_naci" class="label">Fecha de Nacimiento:</label>
						 <input type="date" name="data[]" id="fecha_naci" class="userUpdate input" value="<?php echo $result['usu_fecha_nacimiento']?>"  required>
					 </div>
			 </div>
			 <div class="wrap_two_formgroup">
				 <div class="form-group">
					 <label for="sexo" class="label">Sexo:</label>
					 <select name="data[]"  id="sexo" required class="userUpdate input">
						<?php
							if ($result['usu_sexo']=="masculino") {?>
								<option value="masculino" selected>Masculino</option>
								<option value="femenino" >Femenino</option>
								<option value="otro" >Otro</option>
								<?php
							}elseif($result['usu_sexo']=="femenino"){?>
								<option value="masculino" >Masculino</option>
								<option value="femenino" selected>Femenino</option>
								<option value="otro" >Otro</option>
							<?php }else{?>
								<option value="masculino" >Masculino</option>
								<option value="femenino" >Femenino</option>
								<option value="otro" selected>Otro</option>

							 <?php }  ?>
						</select>
				 </div>
				 <div class="form-group">
					 <label for="direccion" class="label">Direccion:</label>
					 <input type="text" name="data[]" id="direccion" class="userUpdate input" value="<?php echo $result['usu_direccion']?>">
				 </div>
			 </div>
			 <div class="wrap_two_formgroup">
			 	<div class="form-group">
			 		<label for="celphone" class="label">Celular</label>
					<input type="number" class="userUpdate input" id="celphone" value="<?php echo $result['usu_celular']?>">
			 	</div>
				 <div class="form-group">
			     <label for="estado" class="label">Estado:</label>
			     <select name="data[]"  id="estado" class="userUpdate input" required>
			               	<<?php
			               	 foreach ($this->master->selectAll('estado') as $row) {
			               		if ($row['id_estado']==$result['id_estado']) {?>
			               		<option value="<?php echo $row['id_estado']?>" selected><?php echo $row['est_estado']?></option>
			               		<?php
			               		}else{?>
			               			<option value="<?php echo $row['id_estado']?>"><?php echo $row['est_estado']?></option>
			               		<?php
			               		} } ?>
			               </select>
			            </div>
			 </div>
			 <div class="form-group">
			     <button class="btn" id="updateUser">Actualizar Cliente</button>
			 </div>
		 </form>
</div>

<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>


		    	<form id="frmUpdtateUser" >
		    		 <div class="form-group">
			                <label for="tip_doc" class="required">Tipo de Documento:</label>
			               <select name="data[]"  id="tip_doc" required class="userUpdate">
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
			                <label for="numDoc" class="required">Numero de Documento:</label>
			                <input type="number" name="data[]" id="numDoc" class="userUpdate" value="<?php echo $result['usu_num_documento']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="priNom" class="required">Primer Nombre:</label>
			                <input type="text" name="data[]" id="priNom" class="userUpdate" value="<?php echo $result['usu_primer_nombre']?>" required>
			            </div>
			           <div class="form-group">
			                <label for="priApe" class="required">Primer Apellido:</label>
			                <input type="text" name="data[]" id="priApe" class="userUpdate" value="<?php echo $result['usu_primer_apellido']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="correo" class="required">Correo:</label>
			                <input type="email" name="data[]" id="correo" class="userUpdate" value="<?php echo $result['usu_correo']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="tel" class="required">Telefono:</label>
			                <input type="number" name="data[]" id="tel" class="userUpdate" value="<?php echo $result['usu_telefono']?>" required>
			            </div>
		    		 <div class="form-group">
			                <label for="ciudad" class="required">Ciudad:</label>
			                <select name="data[]"  id="ciudad" class="userUpdate" required>
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
			                <label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
			                <input type="date" name="data[]" id="fecha_naci" class="userUpdate" value="<?php echo $result['usu_fecha_nacimiento']?>"  required>
			            </div>
			            <div class="form-group">
			                <label for="sexo" class="required">Sexo:</label>
			               		<input type="text" name="data[]" idi="sexo" class="userUpdate" value="<?php echo $result['usu_sexo']?>">
			            </div>
		    		 <div class="form-group">
			                <label for="tipo_usu" class="required">Tipo de Usuario:</label>
			               <select name="data[]"  id="tipo_usu" class="userUpdate" required>
			               	<<?php
			               	 foreach ($this->master->selectAll('tipo_usuario') as $row) {
			               		if ($row['tip_usu_codigo']==$result['tip_usu_codigo']) {?>
			               		<option value="<?php echo $row['tip_usu_codigo']?>" selected><?php echo $row['rol']?></option>
			               		<?php
			               		}else{?>
			               			<option value="<?php echo $row['tip_usu_codigo']?>"><?php echo $row['rol']?></option>
			               		<?php 
			               		} } ?>
			               </select>
			            </div>
			            <div class="form-group">
			                <label for="estado" class="required">Estado:</label>
			               <select name="data[]"  id="estado" class="userUpdate" required>
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
			            <div class="form-group">
			                <button class="btn" id="updateUser">Actualizar Cliente</button>
			            </div>
		    	</form>
</div>

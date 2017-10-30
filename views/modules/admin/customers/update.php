<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>


		    	<form class="frmCustomers" action="guardar-modificacion-cliente" method="post">
		    		 <div class="form-group">
			                <label for="tip_doc" class="required">Tipo de Documento:</label>
			               <select name="data[]"  id="tip_doc" required>
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
			                <input type="number" name="data[]" id="numDoc" value="<?php echo $result['num_documento']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="priNom" class="required">Primer Nombre:</label>
			                <input type="text" name="data[]" id="priNom" value="<?php echo $result['primer_nombre']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="segNom">Segundo Nombre:</label>
			                <input type="text" name="data[]" id="segNom" value="<?php echo $result['segundo_nombre']?>"required>
			            </div>
			           <div class="form-group">
			                <label for="priApe" class="required">Primer Apellido:</label>
			                <input type="text" name="data[]" id="priApe" value="<?php echo $result['primer_apellido']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="segApe" >Segundo Apellido:</label>
			                <input type="text" name="data[]" id="segApe" value="<?php echo $result['segundo_apellido']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="correo" class="required">Correo:</label>
			                <input type="email" name="data[]" id="correo" value="<?php echo $result['correo']?>" required>
			            </div>
			             <div class="form-group">
			                <label for="tel" class="required">Telefono:</label>
			                <input type="number" name="data[]" id="tel" value="<?php echo $result['telefono']?>" required>
			            </div>
		    		 <div class="form-group">
			                <label for="ciudad" class="required">Ciudad:</label>
			                <select name="data[]"  id="ciudad" required>
			               	<?php
			               	 foreach ($this->master->selectAll('ciudad') as $row) {
			               		if ($row['id_ciudad']==$result['id_ciudad']) {?>
			               		<option value="<?php echo $row['id_ciudad']?>" selected><?php echo $row['nombre']?></option>
			               		<?php
			               		}else{?>
			               			<option value="<?php echo $row['id_ciudad']?>"><?php echo $row['nombre']?></option>
			               		<?php 
			               		} } ?>
			               </select>
			            </div>
			             <div class="form-group">
			                <label for="dir" class="required">Dirección:</label>
			                <input type="text" name="data[]" id="dir" value="<?php echo $result['direccion']?>" required>
			            </div>
			            <div class="form-group">
			                <label for="sexo" class="required">Sexo:</label>
			               <select name="data[]"  id="sexo" required>
			               	<?php
			               	 foreach ($this->master->selectAll('sexo') as $row) {
			               		if ($row['id_sexo']==$result['id_sexo']) {?>
			               		<option value="<?php echo $row['id_sexo']?>" selected><?php echo $row['sexo']?></option>
			               		<?php
			               		}else{?>
			               			<option value="<?php echo $row['id_sexo']?>"><?php echo $row['sexo']?></option>
			               		<?php 
			               		} } ?>

			               </select>
			            </div>
			             <div class="form-group">
			                <label for="cel" class="required">Celular:</label>
			                <input type="number" name="data[]" id="cel" value="<?php echo $result['celular']?>"  required>
			            </div>
			             <div class="form-group">
			                <label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
			                <input type="date" name="data[]" id="fecha_naci" value="<?php echo $result['fecha_nacimiento']?>"  required>
			            </div>
		    		 <div class="form-group">
			                <label for="tipo_usu" class="required">Tipo de Usuario:</label>
			               <select name="data[]"  id="tipo_usu" required>
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
			               <select name="data[]"  id="estado" required>
			               	<<?php
			               	 foreach ($this->master->selectAll('usu_estado') as $row) {
			               		if ($row['id_estado']==$result['id_estado']) {?>
			               		<option value="<?php echo $row['id_estado']?>" selected><?php echo $row['estado']?></option>
			               		<?php
			               		}else{?>
			               			<option value="<?php echo $row['id_estado']?>"><?php echo $row['estado']?></option>
			               		<?php 
			               		} } ?>
			               </select>
			            </div>
			            <div class="form-group">
			                <button class="btn">Actualizar Cliente</button>
			            </div>
		    	</form>
</div>

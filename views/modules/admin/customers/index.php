<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>
	<div id="tabs">
		  <ul>
		  <?php
		  	//permisos-permit de scope.navigator
		  	$modulo = 'clientes';
			$crud = permisos($modulo,$permit);
			if ($crud[0]==true) {?>
		    		<li><a href="#tabs-1">Registrar Clientes</a></li>
			<?php }
			if ($crud[1]==true) { ?>
		  		  <li><a href="#tabs-2">Clientes Registrados</a></li>
			<?php } ?>
		  </ul>
		  <?php
		  if ($crud[1]==true) {?>
		  <div id="tabs-2">
			  <?php require_once "views/modules/config/datatables/datatable-user.php"; ?>
		  </div>
		  <?php } ?>
		 <?php if ($crud[0]==true) {?>
		  <div id="tabs-1">
		    	
					<form>
						<div class="form-group">
								<label for="tipo_usu" class="select" >Tipo de Usuario:</label>
								<select name="dataCl"  id="tipo_usu" required></select>
						</div>

		    		 <div class="form-group-liner">
			                <label for="tip_doc" class="select">Tipo de Documento:</label>
			               <select name="dataCl" id="tip_doc"   required></select>
			           </div>
		    		 <div class="form-group-liner">
			                <label for="numDoc" class="label--liner">Numero de Documento:</label>
			                <input type="number" name="dataCl" id="numDoc" class="input--liner" required>
			            </div>
			            <div id="answer-user"></div>
			             <div class="form-group-liner">
			                <label for="priNom" class="label--liner">Primer Nombre:</label>
			                <input type="text" name="dataCl" id="priNom" class="input--liner"  required>
			            </div>

			           <div class="form-group-liner">
			                <label for="priApe" class="label--liner">Primer Apellido:</label>
			                <input type="text" name="dataCl" id="priApe" class="input--liner" required>
			            </div>

			             <div class="form-group-liner">
			                <label for="correo" class="label--liner">Correo:</label>
			                <input type="email" name="dataCl" id="correo" class="input--liner" required>
			            </div>
			             <div class="form-group-liner">
			                <label for="tel" class="label--liner">Telefono:</label>
			                <input type="number" name="dataCl" id="tel" class="input--liner" required>
			            </div>
		    		 <div class="form-group">
			                <label for="cuidad" class="required">Ciudad:</label>
			               <select name="dataCl"  id="cuidad" required> </select>
			            </div>
			             <div class="form-group-liner">
			                <label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
			                <input type="date" name="dataCl" id="fecha_naci" class="input--liner" required>
			            </div>
			            <div class="form-group">
			                <label for="sexo" class="required">Sexo:</label>
			               <select name="dataCl"  id="sexo" required>
							   <option value="femenino">Femenino</option>
   			               	<option value="masculino">Masculino</option>
			               </select>
			            </div>
		    		 <div class="form-group">
			                <label for="tipo_usu" class="required" >Tipo de Usuario:</label>
			               <select name="dataCl"  id="tipo_usu" required></select>
			            </div>

			             <div class="form-group-liner">
			                <label for="contra" class="label--liner">Contraseña:</label>
			                <input type="password" name="dataCl" id="contra" class="input--liner" required>
			            </div>
			            <div class="answer"></div>
			             <div class="form-group-liner">
			                <label for="rep_contra" class="label--liner">Repetir Contraseña:</label>
			                <input type="password" name="dataCl" id="rep_contra" class="input--liner" required disabled>
			            </div>
			            <div class="answer2"></div>

			            <div class="form-group">
			                <button class="btn" disabled id="registrar">Registrar Cliente</button>
			            </div>
		    	</form>

		  </div>
		<?php }  ?>
	</div>
</div>

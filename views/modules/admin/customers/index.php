<div class="modules customers">
	<div class="title">
		<p>USUARIOS</p>
	</div>
	<div id="tabs">
		  <ul>
		  <?php
		  	//permisos-permit de scope.navigator
		  	$modulo = 'usuarios';
				$crud = permisos($modulo,$permit);
			if ($crud[0]==true) {?>
		    		<li><a href="#tabs-1">Registrar Usuario</a></li>
			<?php }
			if ($crud[1]==true) { ?>
		  		  <li><a href="#tabs-2">Clientes Registrados</a></li>
			<?php } ?>
						<li><a href="#tabs-3">Empleados Registrados</a></li>
		  </ul>
		  <?php
		  if ($crud[1]==true) {?>
		  <div id="tabs-2">
			  <?php require_once "views/modules/config/datatables/datatable-user.php"; ?>
		  </div>
		  <?php } ?>
		 <?php if ($crud[0]==true) {?>
		  <div id="tabs-1">
					<form id="frmNewUser">
						<div class="form-group type--user">
								<label for="tipo_usu" class="select" >Tipo de Usuario:</label>
								<select class="dataCl"  id="tipo_usu" required></select>
						</div>
						<div class="customers--normal">
							<div class="form-group">
								<label for="tip_doc" class="select">Tipo de Documento:</label>
								<select class="dataCl" id="tip_doc"   required></select>
							</div>
							<div class="form-group">

								<label for="numDoc" class="label-">Numero de Documento:</label>
								<input type="number"  id="numDoc" class="input- dataCl" required>  

							</div>
							<div class="form-group">
								<label for="priNom" class="label">Primer Nombre:</label>
								<input type="text"  id="priNom" class="input dataCl"  required> 
							</div>
							<div class="form-group">
								<label for="priApe" class="label">Primer Apellido:</label>
								<input type="text" id="priApe" class="input dataCl" required>
							</div>
							<div class="form-group">
								<label for="correo" class="label">Correo:</label>
								<input type="email" class=" input dataCl" id="correo" required>
							</div>
							<div class="form-group">
								<label for="tel" class="label">Telefono:</label>
								<input type="number" class="input dataCl" id="tel"  required>
							</div>

							<div class="form-group">
								<label for="cuidad" class="required">Ciudad:</label>
								<select class="dataCl"  id="cuidad" required> </select>
							</div>
							<div class="form-group">
								<label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
								<input type="date"  id="fecha_naci" class="input- dataCl" max="2005-01-01" min="1950-01-01" required>
							</div>
							<div class="form-group">
								<label for="sexo" class="required ">Sexo:</label>
								<select class="dataCl"  id="sexo" required>
									<option value="femenino">Femenino</option>
									<option value="masculino">Masculino</option>
								</select>
							</div>
							<div class="customers--password">
							<div class="form-group">
								<label for="contra" class="label">Contraseña:</label>
								<input type="password"  id="contra" class="input dataCl" required>
							</div>
							<div class="form-group">
								<label for="rep_contra" class="label">Repetir Contraseña:</label>
								<input type="password"  id="rep_contra" class="input dataCl" required disabled>
							</div>
							</div>
						      <div class="form-group">
						        <button class="btn" disabled id="registrar">Registrar Cliente</button>
						       </div>
						</div>
		    	</form>

		    	<div class="customers--business">
		    	<form id="frmNewBusi">
							<h1>Datos de la empresa</h1>
							<div class="form-group">
								<label for="nit">NIT</label>
								<input type="text" class="dataEmp" id="nit" required>
							</div>
							<div class="form-group">
								<label for="social">Razon social</label>
								<input type="text" class="dataEmp" id="social"required>
							</div>
							<div class="form-group">
								<label for="namebus">Nombre de la empresa</label>
								<input type="text" class="dataEmp" id="namebus" required>
							</div>
							<h1>datos de la sede</h1>
							<div class="form-group">
								<label for="sede-enc">Nombre del contacto</label>
								<input type="text" class="dataEmp"  id="sede-enc"required>
							</div>
							<div class="form-group">
								<label for="sede-enca">Apellido del contacto</label>
								<input type="text" class="dataEmp"  id="sede-enca"required>
							</div>
							<div class="form-group">
								<label for="sede-sexo">sexo</label>
								<input type="text" class="dataEmp"  id="sede-sexo"required>
							</div>

							<div class="form-group">
								<label for="sede-tel">Telefono</label>
								<input type="text" class="dataEmp" id="sede-tel" required>
							</div>
							<div class="form-group">
								<label for="sede-enc">Ext</label>
								<input type="text" class="dataEmp"  id="sede-ext" required>
							</div>
							<div class="form-group">
								<label for="sede-dir">Direccion</label>
								<input type="text" class="dataEmp" id="sede-dir" required>
							</div>
							<div class="form-group">
								<label for="sede-correo">Correo</label>
								<input type="text" class="dataEmp"  id="sede-correo"required>
							</div>
							<div class="form-group">
								<label for="contra" class="label">Contraseña:</label>
								<input type="password"  id="contra" class="input dataEmp" required>
							</div>
							<div class="form-group">
								<label for="rep_contra" class="label">Repetir Contraseña:</label>
								<input type="password"  id="rep_contra" class="input dataEmp" required >
							</div>
							<div class="form-group">
			        					<button class="btn"  id="registrar">Registrar Empresa</button>
			       				</div>
		    	</form>
						</div>	
						
					
		  </div>
			<div id="tabs-3">
				<!--  lopera aca va la direccion de php -->
			</div>

		<?php }  ?>
	</div>
</div>

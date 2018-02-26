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
		    		<li><a href="#regis-user">Registrar Usuario</a></li>
			<?php }
			if ($crud[1]==true) { ?>
		  		  <li><a href="#tabs-2">Clientes </a></li>
		  		  <li><a href="#tabs-4">Empresariales</a></li>
				<li><a href="#tabs-3">Empleados </a></li>
			<?php } ?>
		  </ul>
		  <?php
		  if ($crud[1]==true) {?>
		  <div id="tabs-2">
			  <?php require_once "views/modules/config/datatables/datatable-user.php"; ?>
		  </div>
		  <?php } ?>
		 <?php if ($crud[0]==true) {?>
		  <div id="regis-user" >
					<form id="frmNewUser">
						<div class="form-group type--user">
							<label for="tipo_usu" class="select" >Tipo de Usuario:</label>
							<select class="dataCl dataEmp input grande"  id="tipo_usu" required>
								<?php
									foreach ($this->master->selectAllBy('tipo_usuario',array('tip_usu_maxi','false')) as $row) {?>
										<option value="<?php echo $row['tip_usu_codigo']; ?>"><?php echo $row['tip_usu_rol']; ?></option>
									<?php } ?>
									<option value="maxi">Maxirecaragas</option>
							</select>
						</div>

				<div class="customers--normal">
							<div class="form-group type--user employe-rol">
								<label for="type_user" class="select" >Rol:</label>
								<select class=" input grande"  id="type_user" required></select>
							</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="tip_doc" class="select">Tipo de Documento:</label>
								<select class="dataCl input" id="tip_doc"   required></select>
							</div>
							<div class="form-group">
								<label for="numDoc" class="label">Numero de Documento:</label>
								<input type="number"  id="numDoc"  onkeypress="return eliminarLetras(event)" class="input dataCl" required>
							</div>
						</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="priNom" class="label">Primer Nombre:</label>
								<input type="text"  id="priNom" class="input dataCl"  required>
							</div>
							<div class="form-group">
								<label for="priApe" class="label">Primer Apellido:</label>
								<input type="text" id="priApe" class="input dataCl" required>
							</div>
						</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="correo" class="label">Correo:</label>
								<input type="email" class=" input dataCl" id="correo" required>
							</div>
							<div class="form-group">
								<label for="tel" class="label">Telefono:</label>
								<input type="number" class="input dataCl" onkeypress="return eliminarLetras(event)" id="tel"  required>
							</div>
						</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="cuidad" class="select">Ciudad:</label>
								<select class="dataCl input"  id="cuidad" required> </select>
							</div>
							<div class="form-group">
								<label for="dir" class="label">Direccion:</label>
								<input type="text" class="input dataCl" id="dir"  required>
							</div>
						</div>
							<div class="form-group">
								<label for="sexo" class="select">Sexo:</label>
								<select class="dataCl input grande"  id="sexo" required>
									<option value="femenino">Femenino</option>
									<option value="masculino">Masculino</option>
								</select>
							</div>
						<div class="wrap_two_formgroup">
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
						</div>
						   <div class="form-group">
						     <button class="btn" disabled id="registrar">Registrar Cliente</button>
						   </div>
						</div>
		    	</form>

		    	<form id="frmNewBusi">
						<div class="customers--business">
							<h1>Datos de la empresa</h1>
							<div class="wrap_two_formgroup">
								<div class="form-group">
								<label for="nit" class="label">NIT</label>
								<input type="text" class="dataEmp input" id="nit" required>
							</div>
								<div class="form-group">
								<label for="social" class="label">Razon social</label>
								<input type="text" class="dataEmp input" id="social"required>
							</div>
							</div>
							<div class="form-group">
								<label for="namebus" class="label">Nombre de la empresa</label>
								<input type="text" class="dataEmp input grande" id="namebus" required>
							</div>
							<h1>datos de la sede</h1>
							<div class="form-group">
								<label for="sed-nom" class="label">Nombre de la sede</label>
								<input type="text" class="dataEmp input grande" id="sed-nom" required>
							</div>
							<div class="wrap_two_formgroup">
								<div class="form-group">
								<label for="sede-dir" class="label">Direccion</label>
								<input type="text" class="dataEmp input" id="sede-dir" required>
								</div>
								<div class="form-group">
									<label for="sede-tel" class="label">Telefono</label>
									<input type="number" class="dataEmp input" onkeypress="return eliminarLetras(event)"  id="sede-tel" required>
								</div>
							</div>
							<h1>datos del contacto</h1>
							<div class="wrap_two_formgroup">
								<div class="form-group">
								<label for="tip_doc" class="label">Tipo de documento</label>
								<select class="dataEmp input" id="tip_docBusi">
									<option value="1">Cedula</option>
								</select>
							</div>
								<div class="form-group">
								<label for="numDoc" class="label">Numero de documento</label>
								<input type="text" class="dataEmp input" onkeypress="return eliminarLetras(event)"  id="numDocEmp" required>
							</div>
							</div>
							<div class="wrap_two_formgroup">
								<div class="form-group">
									<label for="sede-enc" class="label">Nombre del contacto</label>
									<input type="text" class="dataEmp input"  id="sede-enc"required>
								</div>
								<div class="form-group">
								<label for="sede-enca" class="label">Apellido del contacto</label>
								<input type="text" class="dataEmp input"  id="sede-enca"required>
							</div>
						</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="cuidad" class="select">Ciudad</label>
								<select class="dataEmp input" id="cuidadBusi">
									<option value="1">Medellin</option>
								</select>
							</div>
							<div class="form-group">
								<label for="sede-enc" class="label">Ext</label>
								<input type="number" class="dataEmp input" onkeypress="return eliminarLetras(event)" id="sede-ext" required>
							</div>
						</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="sede-correo" class="label">Correo</label>
								<input type="email" class="dataEmp input"  id="sede-correo" required>
							</div>
							<div class="form-group">
								<label for="cargo" class="label">Cargo:</label>
								<input type="text"  id="cargo" class="input dataEmp" required>
							</div>
						</div>
						<div class="wrap_two_formgroup">
							<div class="form-group">
								<label for="contraEmp" class="label">Contraseña:</label>
								<input type="password"  id="contraEmp" class="input dataEmp" required>
							</div>
							<div class="form-group">
								<label for="rep_contraEmp" class="label">Repetir Contraseña:</label>
								<input type="password"  id="rep_contraEmp" class="input dataEmp" required >
							</div>
						</div>
							<div class="form-group">
			        	<button class="btn"  id="registrarEmp">Registrar Empresa</button>
			       	</div>
						</div>
		    	</form>


		  </div>
		 <?php if ($crud[1]==true) { ?>
			<div id="tabs-3">
			 <?php require_once "views/modules/config/datatables/datatable-employee.php"; ?>
			</div>
			<div id="tabs-4">
			 <?php require_once "views/modules/config/datatables/datatable-cliEmp.php"; ?>
			</div>

		<?php } } ?>
	</div>
</div>

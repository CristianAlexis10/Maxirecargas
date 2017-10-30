<div class="modules customers">
	<div class="title">
		<p>CLIENTES</p>
	</div>
	<div id="tabs">
		  <ul>

		  <?php
		  	//permisos-permit de scope.navigator
		  	$modulo = 'usuarios';
			$crud = permisos($modulo,$permit);
			if ($crud[0]==true) {?>
		    		<li><a href="#tabs-1">Registrar Clientes</a></li>	
			<?php }
			if ($crud[1]==true) { ?>
		  		  <li><a href="#tabs-2">Clientes Registrados</a></li>
			<?php } ?>
		  </ul>
		<!-- inicio mensajes de exito o error -->
		  <?php if(isset($_SESSION['message'])){?>
			<div class="msn">
				<?php 
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				?>
			</div>
		  <?php } 
		  	if ( isset($_SESSION['message_error'])) {?>
		  	<div class="msn-error">
				<?php 
					echo $_SESSION['message_error'];
					unset($_SESSION['message_error']);
				?>
			</div>
		<!-- fin mensajes de exito o error -->
		  <?php }
		  if ($crud[1]==true) {?>
		  <div id="tabs-2">
		    	<table id="dataGrid">
            			<thead>
                				<tr>
                    					<th>Nombre</th>
                    					<th>Dirección</th>
                    					<th>Telefono</th>
                    					<th>Ver mas</th>
                				</tr>
           			 </thead>
            			<tbody>
            				<?php foreach ($this->readAll() as $row) {?>  
                   				 <tr>
                       				 <td><?php echo $row['usu_primer_nombre']?></td>
                        				<td><?php echo $row['usu_direccion']?></td>
				                       <td><?php echo $row['usu_telefono']?></td>

				                       <td><a href="ver-cliente-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                  				  </tr>
                  				  <?php } ?>
            			</tbody>
      			  </table>
		  </div>
		  <?php } ?>
		 <?php if ($crud[0]==true) {?>
		  <div id="tabs-1">
		    	<form class="frmCustomers" action="guardar-cliente" method="post" enctype="multipart/form-data">
		    		 <div class="form-group">
			                <label for="tip_doc" class="required">Tipo de Documento:</label>
			               <select name="data[0]"  id="tip_doc" required>
			               	<?php foreach ($this->master->selectAll('tipo_documento') as $row) {?>  
			               		<option value="<?php echo $row['id_tipo_documento']?>"><?php echo $row['tip_doc_nombre']?></option>
			               	<?php } ?>
			               </select>
			           </div>
		    		 <div class="form-group">
			                <label for="numDoc" class="required">Numero de Documento:</label>
			                <input type="number" name="data[1]" id="numDoc" placeholder="Ingrese El numero de documento" required>
			            </div>
			            <div id="answer-user"></div>
			             <div class="form-group">
			                <label for="priNom" class="required">Primer Nombre:</label>
			                <input type="text" name="data[2]" id="priNom" placeholder="Ingrese el primer nombre del cliente" required>
			            </div>
			             <div class="form-group">
			                <label for="segNom">Segundo Nombre:</label>
			                <input type="text" name="data[3]" id="segNom" placeholder="Ingrese el segundo nombre del cliente" required>
			            </div>
			           <div class="form-group">
			                <label for="priApe" class="required">Primer Apellido:</label>
			                <input type="text" name="data[4]" id="priApe" placeholder="Ingrese el primer apellido del cliente" required>
			            </div>
			             <div class="form-group">
			                <label for="segApe" >Segundo Apellido:</label>
			                <input type="text" name="data[5]" id="segApe" placeholder="Ingrese el segundo apellido del cliente" required>
			            </div>
			             <div class="form-group">
			                <label for="correo" class="required">Correo:</label>
			                <input type="email" name="data[6]" id="correo" placeholder="Ingrese el correo  del cliente" required>
			            </div>
			             <div class="form-group">
			                <label for="tel" class="required">Telefono:</label>
			                <input type="number" name="data[7]" id="tel" placeholder="Ingrese el telefono del cliente" required>
			            </div>
		    		 <div class="form-group">
			                <label for="cuidad" class="required">Ciudad:</label>
			               <select name="data[8]"  id="cuidad" required>
			               	<?php foreach ($this->master->selectAll('ciudad') as $row) {?>  
			               		<option value="<?php echo $row['id_ciudad']?>"><?php echo $row['ciu_nombre']?></option>
			               	<?php } ?>
			               </select>
			            </div>
			             <div class="form-group">
			                <label for="dir" class="required">Dirección:</label>
			                <input type="text" name="data[9]" id="dir" placeholder="Ingrese la dirección del cliente" required>
			            </div>
			             <div class="form-group">
			                <label for="cel" class="required">Celular:</label>
			                <input type="number" name="data[10]" id="cel" placeholder="Ingrese el numero del celular del cliente" required>
			            </div>
			             <div class="form-group">
			                <label for="fecha_naci" class="required">Fecha de Nacimiento:</label>
			                <input type="date" name="data[11]" id="fecha_naci" placeholder="Ingrese la fecha de nacimiento  del  del cliente" required>
			            </div>
			            <div class="form-group">
			                <label for="sexo" class="required">Sexo:</label>
			               <select name="data[12]"  id="sexo" required>
			               	<?php foreach ($this->master->selectAll('sexo') as $row) {?>  
			               		<option value="<?php echo $row['id_sexo']?>"><?php echo $row['sexo']?></option>
			               	<?php } ?>
			               </select>
			            </div>
		    		 <div class="form-group">
			                <label for="tipo_usu" class="required" >Tipo de Usuario:</label>
			               <select name="data[13]"  id="tipo_usu" required>
			               	<?php foreach ($this->master->selectAll('tipo_usuario') as $row) {?>  
			               		<option value="<?php echo $row['tip_usu_codigo']?>"><?php echo $row['tip_usu_rol']?></option>
			               	<?php } ?>
			               </select>
			            </div>
			            <div class="frm-bussiness">
			            	<div class="form-group">
						                <label for="nit" class="required">NIT de la empresa:</label>
						                <input type="number" name="data[16]" id="nit" placeholder="Ingrese el nit de la empresa" >
			            	</div>
			            	<div class="form-group">
						                <label for="cargo" class="required">Cargo:</label>
						                <input type="number" name="data[17]" id="cargo" placeholder="Ingrese el cargo  en la empresa" >
			            	</div>
			            </div>
			             <div class="form-group">
			                <label for="contra" class="required">Contraseña:</label>
			                <input type="password" name="data[14]" id="contra" placeholder="Ingrese la contraseña" required>
			            </div>
			            <div class="answer"></div>
			             <div class="form-group">
			                <label for="rep_contra" class="required">Repetir Contraseña:</label>
			                <input type="password" name="data[15]" id="rep_contra" placeholder="Repita la contraseña" required disabled>
			            </div>
			            <div class="answer2"></div>
			             <div class="form-group">
			                <label for="rep_contra" class="required">Foto de perfil:</label>
			                <input type="file" name="file" >
			            </div>
			            <div class="form-group">
			                <button class="btn" disabled id="registrar">Registrar Cliente</button>
			            </div>
		    	</form>
		    	
		  </div>
		<?php }  ?>
	</div>
</div>

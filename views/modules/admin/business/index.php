<div class="modules business">
	<div class="title">
		<p>EMPRESAS</p>
	</div>
	<div id="tabs">
		  <ul>
		    <li><a href="#tabs-2">Empresas Registradas</a></li>
		    <li><a href="#tabs-1">Registrar Empresas</a></li>
		  </ul>
		  <div id="tabs-2">
		    	<table id="dataGrid">
            			<thead>
                				<tr>
                    					<th>Nombre</th>
                  					<th>NIT</th>
                    					<th>Dirección</th>
                    					<th>Telefono</th>
                    					<th>Ver mas</th>
                				</tr>
           			 </thead>
            			<tbody>
                   				 <tr>
                       				 <td>MaxiRecargas</td>
                        				<td>5454</td>
                        				<td>Ninguna</td>
				                       <td>55555</td>
				                       <td><a href="#"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                  				  </tr>
            			</tbody>
      			  </table>
		  </div>
		  <div id="tabs-1">
				<div class="form--left">

		    	<form class="frmBusiness" action="#" method="post" enctype="multipart/form-data">
		    		 <div class="form-group">
			                <label for="nombreEmp" class="required">Nombre de la Empresa:</label>
			                <input type="text" name="data[]" id="nombreEmp" placeholder="Ingrese El nombre de la empresa" required>
			            </div>
			             <div class="form-group">
			                <label for="nitEmp" class="required">NIT de la Empresa:</label>
			                <input type="text" name="data[]" id="nitEmp" placeholder="Ingrese el NIT de la empresa" required>
			            </div>
			             <div class="form-group">
			                <label for="dirEmp" class="required">Dirección de la Empresa:</label>
			                <input type="text" name="data[]" id="dirEmp" placeholder="Ingrese la dirección de la empresa" required>
			            </div>
			             <div class="form-group">
			                <label for="telEmp" class="required">Telefono de la Empresa:</label>
			                <input type="text" name="data[]" id="telEmp" placeholder="Ingrese el telefono de la empresa" required>
			            </div>
			             <div class="form-group">
			                <label for="logoEmp" class="required">Logo de la Empresa:</label>
			                <input type="file" name="file" id="logoEmp" placeholder="Ingrese el logo de la empresa" required>
			            </div>
								</div>
								<div class="form--rigth">							
			            <div class="form-group">
			                <button class="btn">Guardar Empresa</button>
			            </div>
								</div>
		    	</form>
		  </div>

	</div>
</div>

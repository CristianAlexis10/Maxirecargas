<div class="modules orders">
	<div class="title">
		<p>PEDIDOS</p>
	</div>
	<div id="tabs">
		  <ul>
				<li><a href="#tabs-4">Pendientes</a></li>
		    <li><a href="#tabs-2">Lista de Pedidos</a></li>
		    <li><a href="#tabs-1">Nuevo Pedido</a></li>
		    <li><a href="#tabs-3">Historial</a></li>
		  </ul>
			<div id="tabs-4">
				<h1>aqui van los pendientes</h1>
			</div>
		  <div id="tabs-2">
		    	<table id="dataGrid">
            			<thead>
                				<tr>
                    					<th>Cod</th>
                    					<th>Cliente</th>
                    					<th>Fecha de Realización</th>
                    					<th>Estado</th>
                    					<th>Detalles</th>
                				</tr>
           			 </thead>
            			<tbody>
                   				 <tr>
                       				 <td>5555</td>
                        				<td>Nadie</td>
				                       <td>99/99/9999</td>
				                       <td>Recepción</td>
				                       <td><a href="detalles-pedido-cod"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                  				  </tr>
            			</tbody>
      			  </table>
		  </div>
		  <div id="tabs-1" class="new orders">
				<div class="form--left">
		    	<form class="form Business" action="#" method="post" enctype="multipart/form-data">
		    		 <div class="form-group-liner">
			                <label for="rf" class="label--liner">Referencia:</label>
			                <input type="text" name="data[]" class="input--liner" id="rf" required>
			            </div>
			             <div class="form-group-liner">
			                <label for="caracteristica" class="label--liner">Caracteristicas:</label>
			                <textarea name="data[]" id="caracteristica" class="input--liner"></textarea>
			            </div>
			            <div class="form-group-liner">
			                <label for="precio_venta" class="label--liner">Precio de Venta:</label>
			                <input type="number" name="data[]" class="input--liner" id="precio_venta" required>
			            </div>
			            <div class="form-group-liner">
			                <label for="precio_compra" class="label--liner">Precio de Compra:</label>
			                <input type="number" name="data[]" class="input--liner" id="precio_compra" required>
			            </div>
			            <div class="form-group">
			                <label for="categoria" class="required">Categoria:</label>
			               <select name="data[]" id="categoria" required>
			               	<option value="toner">Toner</option>
			               	<option value="cartucho">Cartucho</option>
			               </select>
			            </div>
			             <div class="form-group">
			                <label for="marca" class="required">Marca:</label>
			               <select name="data[]" id="marca" required>
			               	<option value="hp">Hp</option>
			               	<option value="dell">Dell</option>
			               </select>
			            </div>
								</div>
								<div class="form--rigth">
			            <div class="form-group">
			                <button class="btn">Registrar</button>
			            </div>
								</div>
		    	</form>
		  </div>
		  <div id="tabs-3">
		    	<table id="dataGrid1">
            			<thead>
                				<tr>
                    					<th>Cod del Pedido</th>
                    					<th>Dirección</th>
                    					<th>Encargado</th>
                    					<th>Estado</th>
                    					<th>Detalles</th>
                				</tr>
           			 </thead>
            			<tbody>
                   				 <tr>
                       				 <td>5555</td>
                        				<td>calle 99 n 99</td>
                        				<td>Nadie</td>
                        				<td>En Camino</td>
				                       <td><a href="#"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                  				  </tr>
            			</tbody>
      			  </table>
		  </div>

	</div>
</div>

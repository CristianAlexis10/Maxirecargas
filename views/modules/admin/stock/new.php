<div class="modules customers">
	<div class="title">
		<p>INVENTARIO</p>
	</div>
		    	<form class="form Services" action="guardar-inventario" method="post" >
		    		 <div class="form-group">
			                <label for="cantida" class="required">Cantidad:</label>
			                <input type="number" name="data[]" id="cantida" placeholder="Ingrese la cantidad" required>
			            </div>
			             <div class="form-group">
			                <label for="valor_compra" class="required">Valor de compra:</label>
			                <input type="number" name="data[]" id="valor_compra" placeholder="Ingrese el valor de compra"   step="0.01" required>
			            </div> <div class="form-group">
			                <label for="valor_venta" class="required">Valor de venta Base:</label>
			                <input type="number" name="data[]" id="valor_venta" placeholder="Ingrese el valor de venta" step="0.01"  required>
			            </div>
			            <div class="form-group">
			                <button class="btn">Registrar</button>
			            </div>
		    	</form>

</div>

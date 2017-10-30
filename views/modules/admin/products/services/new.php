<div class="modules customers">
	<div class="title">
		<p>NUEVO SERVICIO</p>
	</div>
		    	<form class="form Services" action="guardar-servicio" method="post" >
		    		 <div class="form-group">
			                <label for="nombre" class="required">Nombre:</label>
			                <input type="text" name="data[]" id="nombre" placeholder="Ingrese el nombre del servicio" required>
			            </div>
			             <div class="form-group">
			                <label for="des" class="required">Descripción:</label>
			                <textarea name="data[]" id="des"></textarea>
			            </div>

			            <div class="form-group">
			                <button class="btn">Registrar</button>
			            </div>
		    	</form>

</div>

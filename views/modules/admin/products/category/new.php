<style media="screen">
	#ocultar{
		display: none;
	}
</style>
<div class="modules customers">
	<div class="title">
		<p>NUEVA CATEGORIA</p>
	</div>
		 <form class="form Services" id="frmNewCategorie"  >
		   <div class="form-group">
			   <label for="nombre" class="label">Nombre:</label>
			   <input type="text" name="dataNewCate" id="nombre" class="input grande" required>
			 </div>
			 <div class="form-group">
			  <label for="des" class="label">Descripción:</label>
			  <textarea  id="desCat" class="textarea"></textarea>
			 </div>
				 <div class="Cambiar--img">
					<div id="wrap-result">
						<img class="imagen--croppie"src="views/assets/image/icn-maxi.png">
					</div>
					<span class="" id="cropp-img">Cambiar foto</span>
				</div>

				<div class="form-group" id="ocultar">
					<input type="text" id="img" class="data-new-pro" name="dataNewCate" value="icn-maxi.png">
				</div>
			 <div class="form-group">
			   <button class="btn">Registrar</button>
			 </div>
		 </form>
</div>
<div id="img-product">
		<div class="newMark--img">
			<span id="closeImg">&times;</span>
			<div id="uploadImage">
				<div id="wrap-upload" style="width:300px"></div>
				<input type="file" id="upload">
				<button class="btn btn-success upload-result">Recortar Imagen</button>
			</div>
		</div>
	</div>

	                </article>
	        	</div>
	        </section>
	 	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
	     <script src="views/assets/js/croppie.js"></script>
	     <script src="views/assets/js/cropp-category.js"></script>
	   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	   <script src="views/assets/lib/parsley/parsley.min.js"></script>
	   <script src="views/assets/lib/parsley/es.js"></script>
	   <script src="views/assets/js/main.js"></script>
	   <script src="views/assets/js/config.js"></script>
	   <script src="views/assets/js/settings.js"></script>

	    </body>
	</html>

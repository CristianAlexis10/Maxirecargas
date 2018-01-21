<div class="modules profile">
  <div class="title">
    <p>MAXIRECARGAS</p>
  </div>
  <div class="maxContainer_profile">
    <div class="frmprofile">
      <form>
        <div class="wrap_two_formgroup">
          <div class="form-group">
            <label for="tip_doc" class="select">Tipo de Documento:</label>
            <select class="dataCl input" id="tip_doc"   required></select>
          </div>
          <div class="form-group">
            <label for="numDoc" class="label">Numero de Documento:</label>
            <input type="number"  id="numDoc" class="input dataCl" required>
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
            <input type="number" class="input dataCl" id="tel"  required>
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
      </form>
    </div>
    <div class="imgprofile">
      <div class="form-group Cambiar--img">
        <div id="wrap-result"></div>
        <span class="" id="cropp-img">Cambiar foto</span>
      </div>
      <div class="form-group">
        <button class="btn">hacer cambios</button>
      </div>
    </div>
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
</div>

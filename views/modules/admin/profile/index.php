<?php
$data = $this->master->selectBy("usuario",array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
?>
<div class="modules profile">
  <div class="title">
    <p>EDITA TUS DATOS</p>
  </div>
  <div class="maxContainer_profile">
    <div class="frmprofile">
      <form id="frmUpdateProfile">
        <div class="wrap_two_formgroup">
          <div class="form-group">
            <label for="priNom" class="label">Primer Nombre:</label>
            <input type="text"  id="priNom" class="input dataCl" value="<?php echo $data['usu_primer_nombre'];?>"  required>
          </div>
          <div class="form-group">
            <label for="segNom" class="label">Segundo nombre:</label>
            <input type="text" id="segNom" class="input dataCl" value="<?php echo $data['usu_segundo_nombre'];?>" >
          </div>
        </div>
        <div class="wrap_two_formgroup">
          <div class="form-group">
            <label for="priApe" class="label">Primer Apellido:</label>
            <input type="text"  id="priApe" class="input dataCl" value="<?php echo $data['usu_primer_apellido'];?>"  required>
          </div>
          <div class="form-group">
            <label for="segApe" class="label">Segundo Apellido:</label>
            <input type="text" id="segApe" class="input dataCl" value="<?php echo $data['usu_segundo_apellido'];?>" >
          </div>
        </div>
        <div class="wrap_two_formgroup">
          <div class="form-group">
            <label for="correo" class="label">Correo:</label>
            <input type="email" class=" input dataCl" id="correo" value="<?php echo $data['usu_correo'];?>" required>
          </div>
          <div class="form-group">
            <label for="tel" class="label">Telefono:</label>
            <input type="number" class="input dataCl" id="tel" value="<?php echo $data['usu_telefono'];?>"  required>
          </div>
        </div>
        <div class="wrap_two_formgroup">
          <div class="form-group">
            <label for="cuidad" class="select">Ciudad:</label>
            <select class="dataCl input"  id="newCuidad" required>
              <?php foreach ($this->master->selectAll("ciudad") as $row) {
                if ($data['id_ciudad']==$row['id_ciudad']) {
                  echo "<option value='".$row['id_ciudad']."' selected>".$row['ciu_nombre']."</option>";
                }else{
                  echo "<option value='".$row['id_ciudad']."'>".$row['ciu_nombre']."</option>";
                }
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="dir" class="label">Direccion:</label>
            <input type="text" class="input dataCl" id="dir"  value="<?php echo $data['usu_direccion'];?>" required>
          </div>
        </div>
        <div class="wrap_two_formgroup">
          <div class="form-group">
            <label for="celular" class="label">Celular:</label>
            <input type="text" class=" input dataCl" id="celular" value="<?php echo $data['usu_celular'];?>" required>
          </div>
          <div class="form-group">
            <label for="tel" class="label">Fecha de nacimiento:</label>
            <input type="date" class="input dataCl" id="fecha" value="<?php echo $data['usu_fecha_nacimiento'];?>"  required>
          </div>
        </div>
          <div class="form-group">
            <label for="sexo" class="select">Sexo:</label>
            <select class="dataCl input grande"  id="sexo" required>
              <?php if ($data['usu_sexo']=="masculino") {?>
                  <option value="femenino">Femenino</option>
                  <option value="masculino" selected>Masculino</option>
              <?php }else{ ?>
                <option value="femenino" selected>Femenino</option>
                <option value="masculino">Masculino</option>
            <?php } ?>
            </select>
          </div>


    </div>
  <div class="imgprofile">
      <div class="form-group Cambiar--img">
        <div id="wrap-result">
              <img src="views/assets/image/profile/<?php echo $data['usu_foto']; ?>" >
        </div>
        <span class="" id="cropp-img">Cambiar foto</span>
      </div>
      <div class="form-group">
        <button class="btn">hacer cambios</button>
      </div>
    </div>
  </form>
  </div>
  <form>
    <div class="wrap_two_formgroup">
      <div class="form-group">
        <label for="contra" class="label">Contraseña:</label>
        <input type="password"  id="contra" class="input" required>
      </div>
      <div class="form-group">
        <label for="rep_contra" class="label">Repetir Contraseña:</label>
        <input type="password"  id="rep_contra" class="input" required disabled>
      </div>
    </div>


  </form>
  <div id="img-product">
			<div class="newMark--img">
				<span id="closeImg">&times;</span>
				<div id="uploadImage" class="modal">
					<div id="wrap-upload" style="width:350px"></div>
					<input type="file" id="upload">
					<button class="btn btn-success upload-result">Recortar Imagen</button>
				</div>
			</div>
		</div>
</div>

    </article>
  </div>
</section>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script src="views/assets/js/croppie.js"></script>
<script src="views/assets/js/cropp-profile.js"></script>
<script src="views/assets/js/main.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="views/assets/js/config.js"></script>
<script src="views/assets/js/settings.js"></script>
</body>
</html>

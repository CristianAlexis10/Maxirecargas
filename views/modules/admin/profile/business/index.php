<?php
$data = $this->master->selectAll("gestion_web");
?>
<div class="modules profile">
  <div class="title">
    <p>MAXIRECARGAS</p>
  </div>
  <div class="maxContainer_profile">
    <div class="frmprofile">
      <form>
          <div class="form-group">
            <label for="micro_des" class="select">Micro Descripción:</label>
            <textarea class="input" id="micro_des"   required><?php echo utf8_encode($data[0]['gw_micro_des'])?></textarea>
          </div>
          <div class="form-group">
            <label for="mision" class="select">Misión:</label>
            <textarea class="input" id="mision"   required><?php echo utf8_encode($data[0]['gw_mision'])?></textarea>
          </div>

          <div class="form-group">
            <label for="vision" class="select">Visión:</label>
            <textarea class="input" id="vision"   required><?php echo utf8_encode($data[0]['gw_vision'])?></textarea>
          </div>
          <div class="form-group">
            <label for="pma" class="select">Politica de medio ambiente:</label>
            <textarea class="input" id="pma"   required><?php echo utf8_encode($data[0]['gw_politicas'])?></textarea>
          </div>

        <div class="wrap_two_formgroup">
            <div class="form-group">
            <a href="configuraciones#contacto">Actualizar datos de contacto</a>
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

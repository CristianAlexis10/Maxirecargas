<?php
$data = $this->master->selectAll("gestion_web");
?>
<div class="modules profile">
  <div class="title">
    <p>MAXIRECARGAS</p>
  </div>
  <div class="maxContainer_profile">
    <div class="frmprofile">
      <form id="frmProfileBusi">
          <div class="form-group">
            <label for="micro_des" class="select">Micro Descripción:</label>
            <textarea class="input dataUptadeBusi" id="micro_des"   required><?php echo $data[0]['gw_micro_des']?></textarea>
          </div>
          <div class="form-group">
            <label for="mision" class="select">Misión:</label>
            <textarea class="input dataUptadeBusi" id="mision"   required><?php echo $data[0]['gw_mision']?></textarea>
          </div>

          <div class="form-group">
            <label for="vision" class="select">Visión:</label>
            <textarea class="input dataUptadeBusi" id="vision"   required><?php echo $data[0]['gw_vision']?></textarea>
          </div>
          <div class="form-group">
            <label for="pma" class="select">Politica de medio ambiente:</label>
            <textarea class="input dataUptadeBusi" id="pma"   required><?php echo $data[0]['gw_politicas']?></textarea>
          </div>

        <div class="wrap_two_formgroup">
            <div class="form-group">
            <a href="configuraciones#contacto">Actualizar datos de contacto</a>
            </div>

      </div>
      <div class="form-group">
          <button type="submit" class="btn">hacer cambios</button>
      </div>
    </div>
  </div>
</form>

</div>

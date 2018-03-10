<?php
$data = $this->master->selectAll("gestion_web");
?>
<div class="modules profile">
  <div class="title">
    <p>MAXIRECARGAS</p>
  </div>
  <div class="maxContainer_profile">
    <?php if($_SESSION['CUSTOMER']['ROL']==2){?>
    <div class="frmprofile">
      <form id="frmProfileBusi">
          <div class="form-group">
            <label for="micro_des" class="select label">Micro Descripción:</label>
            <textarea class="input dataUptadeBusi textarea" id="micro_des"   required><?php echo $data[0]['gw_micro_des']?></textarea>
          </div>
          <div class="form-group">
            <label for="mision" class="select label">Misión:</label>
            <textarea class="input dataUptadeBusi textarea" id="mision" required><?php echo $data[0]['gw_mision']?></textarea>
          </div>

          <div class="form-group">
            <label for="vision" class="select label">Visión:</label>
            <textarea class="input dataUptadeBusi textarea" id="vision"   required><?php echo $data[0]['gw_vision']?></textarea>
          </div>
          <div class="form-group">
            <label for="pma" class="select label">Politica de medio ambiente:</label>
            <textarea class="input dataUptadeBusi textarea" id="pma" required><?php echo $data[0]['gw_politicas']?></textarea>
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
  <?php }else{?>
        <h1>Misión</h1>
        <p><?php echo $data[0]['gw_mision']?></p>
        <h1>Visión</h1>
        <p><?php echo $data[0]['gw_vision']?></p>
        <h1>Politica de medio ambiente</h1>
        <p><?php echo $data[0]['gw_politicas']?></p>
  <?php  } ?>
  </div>
</form>

</div>

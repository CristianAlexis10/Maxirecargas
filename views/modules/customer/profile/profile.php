<link rel="stylesheet" href="views/assets/css/profile.css">
<link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"/>
    <?php
    $data = $this->master->innerJoinUsuario($_SESSION['CUSTOMER']['ID']);
    ?>
    <?php require_once "views/include/customer/scope.header.php";?>
    <div class="container--profile">
      <span class="menuprofile"><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
      <div class="content--profile">
        <div class="profile--left">
          <p>editar información personal</p>
          <form class="" action="modificar-mi-perfil" method="post">
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="name" class="label--profile">primer nombre:</label>
              <input type="text" class="input--profile" id="name" name="data[]" value="<?php echo $data['usu_primer_nombre'] ?>" required>
            </div>
            <div class="form-profile">
              <label for="secondname" class="label--profile">segundo nombre:</label>
              <input type="text" class="input--profile" id="secondname" name="data[]" value="<?php echo $data['usu_segundo_nombre'] ?>" >
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="lastname" class="label--profile">primer apellido:</label>
              <input type="text" class="input--profile" id="lastname" name="data[]" value="<?php echo $data['usu_primer_apellido'] ?>" required>
            </div>
            <div class="form-profile">
              <label for="secondlast" class="label--profile">segundo apellido:</label>
              <input type="text" class="input--profile" id="secondlast" name="data[]" value="<?php echo $data['usu_segundo_apellido'] ?>" >
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="email" class="label--profile">correo:</label>
              <input type="email" class="input--profile" id="email" name="data[]" value="<?php echo $data['usu_correo'] ?>" required>
            </div>
            <div class="form-profile">
              <label for="telphone" class="label--profile">teléfono:</label>
              <input type="text" class="input--profile" id="telphone" name="data[]" value="<?php echo $data['usu_telefono'] ?>" required>
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="country" class="label--profile">cuidad:</label>
              <select class="input--profile" name="data[]" id="country">
                <?php
                  foreach ($this->master->selectAll("ciudad") as $row) {
                    if ($row["id_ciudad"]==$data['id_ciudad']) {  ?>
                      <option value="<?php   echo $row['id_ciudad']; ?>" selected><?php  echo $row['ciu_nombre'] ?></option>
                <?php  }else{ ?>
                  <option value="<?php   echo $row['id_ciudad']; ?>"><?php  echo $row['ciu_nombre'] ?></option>
                <?php } } ?>
              </select>
            </div>
            <div class="form-profile">
              <label for="address" class="label--profile">dirección:</label>
              <input type="text" class="input--profile" id="address"  name="data[]"value="<?php echo $data['usu_direccion'] ?>" required>
            </div>
          </div>
          <div class="wrap_two_formgroup">
            <div class="form-profile">
              <label for="celphone" class="label--profile">celular:</label>
              <input type="number" id="celphone" class="input--profile" name="data[]" value="<?php echo $data['usu_celular'] ?>" required>
            </div>
            <div class="form-profile">
              <label for="datana" class="label--profile">fecha de nacimiento:</label>
              <input type="date" class="input--profile" id="datana" name="data[]" value="<?php echo $data['usu_fecha_nacimiento'] ?>" required>
            </div>
          </div>
          <div class="wrap_formgroup">
            <label for="sexo" class="label--profile">Sexo:</label>
            <select class="dataCl input--profile"  id="sexo" name="data[]" required>
              <?php if ($data['usu_sexo']=="masculino") {?>
                <option value="femenino">Femenino</option>
                <option value="masculino" selected>Masculino</option>
              <?php }else{ ?>
                <option value="femenino" selected>Femenino</option>
                <option value="masculino">Masculino</option>
              <?php } ?>
            </select>
          </div>

          <div class="formbtn-profile">
            <button type="submit" name="button" id="btndata">guardar cambios</button>
          </div>
        </form>
        <?php
        if (isset($_SESSION['msn'])) {
            echo "<div class='message-red'>".$_SESSION['msn']."</div>";
            unset($_SESSION['msn']);
        }
        ?>
          <p>cambiar contraseña</p>
          <form id="updatePassword">
            <div class="container--oneinput">
              <div class="form-profile">
                <label for="password" class="label--profile">contraseña Actual:</label>
                <input type="password" id="password" class="input--profile" required>
              </div>
              <div class="form-profile">
                <label for="password" class="label--profile">Nueva contraseña:</label>
                <input type="password" id="new_password" class="input--profile" required>
              </div>
              <div class="form-profile">
                <label for="confirmCon" class="label--profile">confirmar contraseña:</label>
                <input type="password" class="input--profile" id="confirmCon" required>
              </div>
            </div>
            <div class="formbtn-profile">
              <button type="submit" name="button" id="btnpassword">guardar cambios</button>
            </div>
          </form>
          </div>
        <div class="profile--right">
          <p>editar foto</p>
            <div class="imgprofile">
                <div class="form-group Cambiar--img">
                  <div id="wrap-result">
                        <img src="views/assets/image/profile/<?php echo $data['usu_foto']; ?>" >
                  </div>
                  <span class="updateImagen" id="cropp-img">Cambiar foto</span>
                </div>
              </div>
        </div>
        <div id="img-product">
            <div class="newMark--img">
              <span id="closeImg">&times;</span>
              <div id="uploadImage" >
                <div id="wrap-upload" style="width:350px"></div>
                <input type="file" id="upload">
                <button class="btn btn-success upload-result">Recortar Imagen</button>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
    <?php require_once "views/include/customer/scope.footer.php";?>

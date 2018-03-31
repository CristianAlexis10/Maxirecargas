<?php
  $data = $this->master->selectBy("producto",array("pro_referencia",$_GET['data']));
  $data = $this->master->innerJoinProducto($data['pro_codigo']);
    ?>
      <div class="container--detail">
        <span><i class="fa fa-bars menuDetail" aria-hidden="true" id="menu"></i><i class="fa fa-bars menuDetail" aria-hidden="true" id="menu-mobile"></i></span>
        <?php
        if (isset($data[0]['pro_referencia'])) {
            $servicios=  "";
            foreach ($data as $row) {
              $servicios .= $row["tip_ser_nombre"].", ";
            }
            $servicios = substr($servicios, 0, -2);
        ?>
        <div class="content--detail">
          <h1><?php echo $data[0]['pro_referencia'] ?></h1>
          <img src="views/assets/image/products/<?php echo $data[0]['pro_imagen'] ?>" class="imgProduct">
          <div class="wrap--btns">
            <ul class="detail--contbtn">
              <li class="opcins--order"><a href="pedidos-<?php echo $data[0]['pro_referencia'] ?>" ><input type="button"  value="hacer pedido" class="detail--btn"></a></li>
              <li class="opcins--order">
              <a href="cotizacion-<?php echo $data[0]['pro_referencia'] ?>"><input type="button"  value="cotizar producto"  class="detail--btn"></a></li>
            </ul>
          </div>
        </div>

        <?php
      }else{
        echo "<div class='content--detailRight product'><h1>este Producto no existe</h1></div>";
      }
      ?>
      <div class="content--detailRight product">
        <h1>Caracteristicas</h1>
        <div class="detail">
          <p class="item--detail">referencia:</p>
          <p class="data--detail"> <?php echo $data[0]['pro_referencia'] ?></p>
        </div>
        <div class="detail">
          <p class="item--detail">marca:</p>
          <p class="data--detail"> <?php echo $data[0]['mar_nombre'] ?></p>
        </div>
        <div class="detail">
          <p class="item--detail">servicios: </p>
          <p class="data--detail"><?php echo $servicios ?></p>
        </div>
        <div class="detail">
          <p class="item--detail">especificaciones:</p>
          <p class="data--detail"><?php echo $data[0]['pro_descripcion'] ?></p>
        </div>


      </div>
     <div class="detail--figure"></div>
      </div>

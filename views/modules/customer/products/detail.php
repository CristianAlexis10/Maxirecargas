<?php
  $data = $this->master->selectBy("producto",array("pro_referencia",$_GET['data']));
  $data = $this->master->innerJoinProducto($data['pro_codigo']);
    ?>
      <div class="container--product--detail">
        <?php
        if (isset($data[0]['pro_referencia'])) {
            $servicios=  "";
            foreach ($data as $row) {
              $servicios .= $row["tip_ser_nombre"].", ";
            }
            $servicios = substr($servicios, 0, -2);
        ?>
        <span class="menuProduct"><i class="fa fa-bars" aria-hidden="true" id="menu"></i></span>
        <div class="content--product--detail">
          <div class="container--image--detail">
            <h1><?php echo $data[0]['pro_referencia'] ?></h1>
            <img src="views/assets/image/products/<?php echo $data[0]['pro_imagen'] ?>" alt="">
          </div>
          <div class="container--caracteristicas">
            <h2>Caracteristicas</h2>
            <p>referencia: <?php echo $data[0]['pro_referencia'] ?></p>
            <p>marca: <?php echo $data[0]['mar_nombre'] ?></p>
            <p>servicios: <?php echo $servicios ?></p>
            <p>especificaciones:<?php echo $data[0]['pro_descripcion'] ?></p>
            <a href="pedidos-<?php echo $data[0]['pro_referencia'] ?>"><input type="button"  value="hacer pedido"></a>
            <a href="cotizacion-<?php echo $data[0]['pro_referencia'] ?>"><input type="button"  value="cotizar producto"></a>
          </div>
        </div>
        <?php
      }else{
        echo "<div class='container--image--detail'><h1>este Producto no existe</h1></div>";
      }
      ?>
        <div class="figure--product1"></div>
        <div class="figure--product2"></div>
      </div>

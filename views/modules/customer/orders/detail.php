  <?php
   $_SESSION['ped_detail_token'] = $data_order[0]['ped_token'];
   // print_r($data_order);
  ?>
  <div class="container--detail">
    <span><i class="fa fa-bars menuDetail" aria-hidden="true" id="menu"></i><i class="fa fa-bars menuDetail" aria-hidden="true" id="menu-mobile"></i></span>
    <div class="content--detail">
      <h1>Detalles De Pedidos</h1>
         <div class="detail">
           <p class="item--detail">Código del pedido:</p>
           <p class="data--detail"><?php echo $data_order[0]['ped_token'];?> </p>
         </div>
         <div class="detail">
           <p class="item--detail">Cliente:</p>
           <p class="data--detail"><?php echo $data_order[0]['usu_primer_nombre']." ".$data_order[0]['usu_primer_apellido'];?> </p>
         </div>
         <div class="detail">
           <p class="item--detail">Fecha de realización:</p>
           <p class="data--detail"><?php echo $data_order[0]['ped_fecha'];?> </p>
          </div>
         <div class="detail">
           <p class="item--detail">Dirección:</p>
           <p class="data--detail"><?php echo $data_order[0]['ciu_nombre'].", ".$data_order[0]['ped_direccion'];?>  </p>
         </div>
         <div class="detail">
           <p class="item--detail">Fecha  de entrega:</p>
           <p class="data--detail"><?php echo $data_order[0]['ped_fecha_entrega'];?> </p>
         </div>
         <div class="detail">
           <p class="item--detail">Hora Aproximada  de entrega:</p>
           <p class="data--detail"><?php echo $data_order[0]['ped_hora_entrega'];?> </p>
         </div>
         <?php if ($data_order[0]['ped_encargado']!=null) {
           $data_employe = $this->master->selectBy('usuario',array('usu_codigo',$data_order[0]['ped_encargado']))
           ?>
             <div class="detail">
               <p class="item--detail">Encargado:</p>
               <p class="data--detail"><?php echo $data_employe['usu_primer_nombre']." ".$data_employe['usu_primer_apellido'] ?> </p>
             </div>
         <?php } ?>
         <div class="detail">
           <p class="item--detail">Estado:</p>
           <p class="data--detail"><?php echo $data_order[0]['ped_estado'];?> </p>
         </div>
         <div class="wrap--btns">
         <ul class="detail--contbtn">
           <li class="opcins--order"><a href="#" id="viewAllProducts"  class="detail--btn">Ver artículos</a></li>
           <?php
             if ($data_order[0]['ped_encargado']!=null) {?>
            <li class="opcins--order"><a href="#"  class="contact--customer detail--btn" id="<?php echo $data_order[0]['ped_encargado']; ?>">Contactar encargado</a></li>
           <?php } ?>
         </ul>
       </div>
     </div>
     <div class="content--detailRight">
       <img src="views/assets/image/flat/check.png">
       <!-- <h2>Estamos feliz de trabajar para usted</h2> -->
       <h1>¡Estamos feliz de trabajar para usted!</h1>
     </div>
    <div class="detail--figure"></div>
  </div>
  <div class='modal' id="modalProductsCustomer">
    <div class='modal--container detail'>
      <span id="close_modal_producto" class="close--modal">&times;</span>
      <h1 class="title--modalDetail">Detalles Del Productos</h1>
      <div class="container_table">
        <table>
        <tr>
          <th>pProducto</th>
          <th>Referencia</th>
          <th>Servicio</th>
          <th>Cant</th>
          <th class="nodata-Observacion">Observación</th>
        </tr>
      <?php
        foreach ($data_order as $row) {
        echo "<tr>";
         echo "<td>".$row['tip_pro_nombre']."</td>";
         echo "<td>".$row['pro_referencia']."</td>";
         echo "<td>".$row['tip_ser_nombre']."</tb>";
         echo "<td>".$row['pedxpro_cantidad']."</tb>";
         echo "<td class='nodata-Observacion'>".$row['pedxpro_observacion']."</tb>";
         echo "</tr>";
        }
        ?>
      </table>
      </div>
    </div>
  </div>

  <!-- contacto -->
  <div id="contact"></div>

  </article>
    </div>
    </section>
   	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="views/assets/js/orders-admin.js"></script>
     <script src="views/assets/js/menu.js"></script>
  	 <!-- <script type="text/javascript" src="views/assets/js/gmaps.js"></script> -->
  	  <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYIb-jxF2zZivhG13bGeEKI9gJthF4Ovg&libraries=adsense&sensor=false&language=es"></script> -->
      <!-- <script type="text/javascript" src="views/assets/js/map-order.js"></script> -->
      </body>
  </html>

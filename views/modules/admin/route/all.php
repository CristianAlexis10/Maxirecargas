<?php
if ($crud[1]==true) {
$count = $this->master->ContarRutasPorUsuario(base64_decode($_GET['data']),date('Y-m-d'));
$data = $this->master->verDetalleRuta(date('Y-m-d'),base64_decode($_GET['data']));
$_SESSION['mapRouteToday']= $data;
if($data!=array()){
?>
<div class="mudules orders detail" id="detail-reload">
 <div class="wrap--info">
   <div class="detail">
     <p class="item--detail">Nombre Encargado:</p>
     <p class="data--detail"><?php echo $data[0]['usu_primer_nombre']." ".$data[0]['usu_primer_apellido'];?>  </p>
   </div>
   <div class="detail">
     <p class="item--detail">Correo:</p>
     <p class="data--detail"><?php echo $data[0]['usu_correo']?></p>
   </div>
   <div class="detail">
     <p class="item--detail">Numero de Celular:</p>
     <p class="data--detail"><?php echo $data[0]['usu_celular'];?> </p>
   </div>
   <div class="detail">
     <p class="item--detail">Total de visitas:</p>
     <p class="data--detail"><?php echo $count['total'];?> </p>
   </div>
   <div class="detail">
     <p class="item--detail">Total de visitas Terminadas:</p>
     <p class="data--detail"><?php  echo $this->master->contarPedidosTerminadosBy(base64_decode($_GET['data']))['total'];?> </p>
   </div>
   <div class="detail">
     <p class="item--detail">Total de visitas Pendientes:</p>
     <p class="data--detail"><?php  echo $this->master->contarPedidosPendientesBy(base64_decode($_GET['data']),date('Y-m-d'))['total'];?> </p>
   </div>
   <div class="detail">
     <p class="item--detail">Total de visitas Canceladas:</p>
     <p class="data--detail"><?php  echo $this->master->contarPedidosCanceladasBy(base64_decode($_GET['data']))['total'];?> </p>
   </div>
   <div class="detail">
     <a href="#"  class="contact--customer" id="<?php echo $data[0]['usu_codigo']; ?>">Contactar encargado</a>
   </div>

   </ul>
 </div>
 <div class="wrap--btns">
   <h2>Visitas para hoy</h2>
   <ul>
     <?php foreach($data as $row){?>
         <li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>

       <?php } ?>
     </ul>
 </div>
</div>

<div id="contact"></div>
<?php }else{
 $result = $this->master->selectBy('usuario',array('usu_codigo',base64_decode($_GET['data'])));
 echo "<b>".$result['usu_primer_nombre']." ".$result['usu_primer_apellido']."</b> no tiene ninguna visita programada para hoy. <a href='pedidos'>Programar Visita</a>";
}
?>
 <div class="orders-future">
   <?php
   $data_future = $this->master->verDetalleRutaFutura(date('Y-m-d'),base64_decode($_GET['data']));
   if ($data_future!=array()) { ?>
     <h1>Visitas Futuras</h1>
     <?php foreach($data_future as $row){?>
       <li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>
     <?php }
   }else{
     echo "<h1>No hay visitas Futuras</h1>";
   }
     ?>
 </div>
 <div class="orders-pending">
   <?php
   $data_future = $this->master->verDetalleRutaAplazada(date('Y-m-d'),base64_decode($_GET['data']));
   if ($data_future!=array()) { ?>
     <h1>Visitas Pendientes</h1>
     <?php foreach($data_future as $row){?>
       <li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>
     <?php }
   }else{
     echo "<h1>No hay visitas Pendientes</h1>";
   }
     ?>
 </div>
 <div class="orders-cancel">
   <?php
   $data_cancel = $this->master->verDetalleRutaCancelada(base64_decode($_GET['data']));
   if ($data_cancel!=array()) { ?>
     <h1>Visitas Canceladas</h1>
     <?php foreach($data_cancel as $row){?>
       <li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>
     <?php }
   }else{
     echo "<h1>No hay visitas Canceladas</h1>";
   }
     ?>
 </div>
 <div class="orders-end">
   <?php
   $data_end = $this->master->verDetalleRutaFinalizadaBy(base64_decode($_GET['data']));
   if ($data_end!=array()) { ?>
     <h1>Visitas Terminadas</h1>
     <?php foreach($data_end as $row){?>
       <li class="opcins--order"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" target="_blank"><?php echo $row['ped_token']?></a></li>
     <?php }
   }else{
     echo "<h1>No hay visitas Canceladas</h1>";
   }
     ?>
 </div>

 </article>
 </div>
 </section>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="views/assets/js/main.js"></script>
  <script src="views/assets/js/config.js"></script>
  <script src="views/assets/js/orders-admin.js"></script>
  <script>
   //contacto
   $(".contact--customer").click(function(){
     var user = this.id;
     $.ajax({
       url:"index.php?controller=config&a=contact",
       type:"post",
       dataType:"json",
       data:({id : user}),
       success:function(result){
         $("#contact").html(result);
       },
       error:function(result) {
         console.log(result);
       }
     });
   });

   //enviar Correo
   function sendMail(){
     var data = [];
     $(".dataContact").each(function(){
       data.push(this.value);
     });
     $.ajax({
       url:"index.php?controller=contact&a=sendMail",
       type:"post",
       dataType:"json",
       data: ({values:data}),
       beforeSend: function() {
           $("#sendButton").after("<div id='message-load'>Enviando</div>");
       },
       success:function(result){
         console.log(result);
       },
       error:function(result){
         console.log(result);
       },
       complete: function() {
         $("#message-load").remove();
         $("#contact").empty();
      }
     });
   }

   </script>
   </body>
</html>
<?php }else{
 echo "No Tienes permiso patra acceder a este  modulo";
}?>

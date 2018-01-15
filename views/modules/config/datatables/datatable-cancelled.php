<table class="datatable" id="dataCancelled">
  <thead>
          <tr>
              <th>Cliente</th>
              <th>Dirección</th>
              <th>Fecha</th>
              <th>Token</th>
              <th>Motivo</th>
              <th>Acciones</th>
          </tr>
</thead>
  <tbody>
      <?php foreach ($this->master->pedidosCancelados() as $row) {?>
           <tr>
               <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                  <td><?php echo $row['ciu_nombre']." ".$row['ped_direccion'];?></td>
                  <td><?php echo $row['ped_fecha'];?></td>
                  <td><?php echo $row['ped_token'];?></td>
                  <td><?php echo $row['rep_observacion'];?></td>
                 <td>
                  <?php
                      $modulo = 'Pedidos';
                      $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                      $crud = permisos($modulo,$permit);
                      if ($crud[1]==true) {?>
                        <!-- <a href="#" onclick="assign(<?php // echo $row['ped_codigo']; ?>)" ><i class="fa fa-user-times"></i></a> -->
                        <a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>
                          <a href="#" id="changeStatus" onclick="changeStatus(<?php echo $row['ped_codigo']; ?>)"><i class="fa fa-refresh"></i></a>
                 </td>
            </tr>

      <?php }	} ?>
  </tbody>
      </table>
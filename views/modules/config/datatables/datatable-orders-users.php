<table class="datatable" id="dataOrdenUser">
            <thead>
                    <tr>
                        <th class="table-encargado">Encargado</th>
                        <th>Codigo del Pedido</th>
                        <th class="table-estado">Estado</th>
                        <th class="datatable--ocultar">Dirección</th>
                        <th>Fecha Entrega</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->pedidosRealizadosBy($_SESSION['CUSTOMER']['ID']) as $row) {
                  if ($row['ped_estado']!="Cancelado") {
                    $data_employe = $this->master->selectBy('usuario',array('usu_codigo',$row['ped_encargado']));
                ?>
                     <tr>
                         <td class="table-encargado"><?php
                          if ($row['ped_encargado']==null) {
                              echo "Pendiente";
                          }else{
                            echo $data_employe['usu_primer_nombre']." ".$data_employe['usu_primer_apellido'] ;
                          }
                          ?></td>
                          <td><?php echo $row['ped_token'];?></td>
                          <td class="table-estado"><?php echo $row['ped_estado'] ;?></td>
                          <td class="datatable--ocultar"><?php echo $row['ciu_nombre']." ".$row['ped_direccion'];?></td>
                          <td><?php echo $row['ped_fecha_entrega'];?></td>
                           <td>
                             <a href="mi-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>
                             <?php if ($row['ped_estado']=="En Bodega"){ ?>
                               <a href="#" alt="Cancelar Pedido" onclick="viewCancelOrder(<?php echo $row['ped_codigo']; ?>)" ><i class="fa fa-times"></i></a>
                             <?php } ?>
                            </td>
                      </tr>

                <?php	} } ?>
            </tbody>
      </table>

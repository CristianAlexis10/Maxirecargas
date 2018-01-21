<table class="datatable" id="dataAssign">
            <thead>
                    <tr>
                        <th>Encargado</th>
                        <th>Token</th>
                        <th>Estado</th>
                        <th>Dirección</th>
                        <th>Fecha Entrega</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->pedidosRealizadosBy($_SESSION['CUSTOMER']['ID']) as $row) {
                  $data_employe = $this->master->selectBy('usuario',array('usu_codigo',$row['ped_encargado']));
                ?>
                     <tr>
                         <td><?php
                          if ($row['ped_encargado']==null) {
                              echo "Pendiente";
                          }else{
                            echo $data_employe['usu_primer_nombre']." ".$data_employe['usu_primer_apellido'] ;
                          }
                          ?></td>
                          <td><?php echo $row['ped_token'];?></td>
                         <td><?php echo $row['ped_estado'] ;?></td>
                            <td><?php echo $row['ciu_nombre']." ".$row['ped_direccion'];?></td>
                            <td><?php echo $row['ped_fecha_entrega'];?></td>
                           <td>
                             <a href="mi-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>
                             <a href="mi-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" ><i class="fa fa-times"></i></a>
                            </td>
                      </tr>

                <?php	 } ?>
            </tbody>
      </table>

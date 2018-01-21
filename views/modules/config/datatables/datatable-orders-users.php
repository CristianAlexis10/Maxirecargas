<table class="datatable" id="dataAssign">
            <thead>
                    <tr>
                        <th>Encargado</th>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Fecha Entrega</th>
                        <th>Token</th>
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
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                            <td><?php echo $row['ciu_nombre']." ".$row['ped_direccion'];?></td>
                            <td><?php echo $row['ped_fecha_entrega'];?></td>
                            <td><?php echo $row['ped_token'];?></td>
                           <td>
                             <a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>
                             </td>
                      </tr>

                <?php	 } ?>
            </tbody>
      </table>

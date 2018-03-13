<table class="datatable" id="dataFinished">
            <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th class="table-token">Token</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->pedidosFinalizados() as $row) {?>
                     <tr>
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                            <td><?php echo $row['ciu_nombre']." ".$row['ped_direccion'];?></td>
                            <td><?php echo $row['ped_fecha_entrega'];?></td>
                            <td class="table-token"><?php echo $row['ped_token'];?></td>
                           <td>
                            <?php
                                $modulo = 'Pedidos';
                                $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                                $crud = permisos($modulo,$permit);
                                if ($crud[1]==true) {?>
                            <!-- <a href="#" onclick="assign(<?php //echo $row['ped_codigo']; ?>)" ><i class="fa fa-user-plus"></i></a> -->
                            <a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>

                           </td>
                      </tr>

                <?php }	} ?>
            </tbody>
      </table>

<table class="datatable" id="dataAssign">
            <thead>
                    <tr>
                        <th class="table-token">Encargado</th>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th class="dataDelete">Fecha Entrega</th>
                        <th class="table-token">Token</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->pedidosAsignados() as $row) {
                  $data_employe = $this->master->selectBy('usuario',array('usu_codigo',$row['ped_encargado']));
                ?>
                     <tr>
                         <td class="table-token"><?php echo $data_employe['usu_primer_nombre']." ".$data_employe['usu_primer_apellido'] ;?></td>
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                            <td><?php echo $row['ciu_nombre']." ".$row['ped_direccion'];?></td>
                            <td class="dataDelete"><?php echo $row['ped_fecha_entrega'];?></td>
                            <td class="table-token"><?php echo $row['ped_token'];?></td>
                           <td>
                            <?php
                                $modulo = 'Pedidos';
                                $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                                $crud = permisos($modulo,$permit);
                                if ($crud[1]==true) {?>
                            <div class="flex-container"><div class="tooltip--assign"><a href="#" onclick="assign(<?php echo $row['ped_codigo']; ?>)" ><i class="fa fa-user-times"></i>
                              <span class="tooltiptext">Encargado</span></a></div>
                            <div class="tooltip--ver"><a href="ver-pedido-<?php echo rtrim(strtr(base64_encode($row['ped_token']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i>
                              <span class="tooltiptext">Detalle</span></a></div>
                            <div class="tooltip--estados"><a href="#"  onclick="changeStatus(<?php echo $row['ped_codigo']; ?>)"><i class="fa fa-refresh"></i>
                              <span class="tooltiptext">Estado</span></a></div>
                           </div></td>
                      </tr>

                <?php	} } ?>
            </tbody>
      </table>

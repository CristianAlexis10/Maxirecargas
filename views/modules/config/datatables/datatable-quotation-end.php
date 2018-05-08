<table class="datatable" id="dataQuoEnd">
            <thead>
                    <tr>
                        <th>Cliente</th>
                        <th class="dataDelete">Dirección</th>
                        <th>Fecha</th>
                        <th class="table-token">Token</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->cotizacionesTerminadas() as $row) {  ?>
                     <tr>
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                            <td class="dataDelete"><?php echo $row['ciu_nombre'].",".$row['cot_dir'];?></td>
                            <td><?php echo $row['cot_fecha'];?></td>
                            <td class="table-token"><?php echo $row['cot_token'];?></td>
                           <td>
                            <?php
                                $modulo = 'cotizacion';
                                $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                                $crud = permisos($modulo,$permit);
                                if ($crud[1]==true) {?>
                            <div class="flex-container"><div class="tooltip--ver"><a href="ver-cotizacion-<?php echo rtrim(strtr(base64_encode($row['cot_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i>
                              <span class="tooltiptext">Detalle</span></a></div></div>
                            </td>
                      </tr>

                <?php	} } ?>
            </tbody>
      </table>

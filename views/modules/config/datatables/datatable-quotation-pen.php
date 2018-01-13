<table class="datatable" id="dataQuoPen">
            <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Token</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->cotizacionesPendientes() as $row) {  ?>
                     <tr>
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                            <td><?php echo $row['ciu_nombre'].",".$row['cot_dir'];?></td>
                            <td><?php echo $row['cot_fecha'];?></td>
                            <td><?php echo $row['cot_token'];?></td>
                           <td>
                            <?php
                                $modulo = 'cotizacion';
                                $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                                $crud = permisos($modulo,$permit);
                                if ($crud[1]==true) {?>
                            <a href="ver-cotizacion-<?php echo rtrim(strtr(base64_encode($row['cot_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>
                           </td>
                      </tr>

                <?php	} } ?>
            </tbody>
      </table>

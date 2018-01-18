<table class="datatable" id="dataPending">
            <thead>
                    <tr>
                        <th>Encargado</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>N° visitas Totales</th>
                        <th>Ver</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->verRutas() as $row) {
                  $count = $this->master->ContarRutasPorUsuario($row['usu_codigo']);
                  ?>
                     <tr>
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                         <td><?php echo $row['usu_correo'];?></td>
                         <td><?php echo $row['usu_celular'];?></td>
                            <td><?php echo $count['total']; ?></td>
                           <td>
                            <?php
                                $modulo = 'Pedidos';
                                $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                                $crud = permisos($modulo,$permit);
                                if ($crud[1]==true) {?>
                            <a href="ver-toda-ruta-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>

                           </td>
                      </tr>

                <?php }	} ?>
            </tbody>
      </table>

<table class="datatable" id='dataTipSer'>
            <thead>
                    <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->selectAll('tipo_servicio') as $row) {?>
                     <tr>
                         <td><?php echo $row['tip_ser_nombre'];?></td>
                            <td><?php echo $row['tip_ser_descripcion'];?></td>
                           <td>
                             <?php
                             $modulo = 'productos';
                               $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                            $crud = permisos($modulo,$permit);
                            if ($crud[2]==true) {?>
                            <a href="modificar-servicio-<?php echo rtrim(strtr(base64_encode($row['Tip_ser_cod']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
                            <?php }   if ($crud[3]==true) {?>
                            <a href="#" onclick="return confirmDeleteService(
                            <?php
                         echo $row['Tip_ser_cod'];
                            ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           </td>
                           <?php } ?>
                      </tr>

                <?php	} ?>
            </tbody>
      </table>

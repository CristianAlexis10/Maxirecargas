<table class="datatable" id="dataCategories">
            <thead>
                    <tr>
                        <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->selectAll('tipo_producto') as $row) {?>
                     <tr>
                         <td><?php echo $row['tip_pro_nombre'];?></td>
                            <td><?php echo $row['tip_pro_descripcion'];?></td>
                           <td>
                            <?php
                                $modulo = 'productos';
                                $crud = permisos($modulo,$permit);          
                                if ($crud[2]==true) {?>
                            <a href="modificar-categoria-<?php echo rtrim(strtr(base64_encode($row['tip_pro_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
                            <?php }  if ($crud[3]==true) { ?>
                            <a href="#" onclick="return confirmDeleteCategories(
                            <?php
                                echo $row['tip_pro_codigo'];
                            ?>
                            )"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <?php } ?>
                           </td>
                      </tr>

                <?php	} ?>
            </tbody>
      </table>

<table class="datatable" id="dataCategories">
    <thead>
      <tr>
            <th>Nombre</th>
            <th class="dataDelete">Descripción</th>
            <th>Acciones</th>
      </tr>
  </thead>
            <tbody>
                <?php foreach ($this->master->selectAll('tipo_producto') as $row) {?>
                     <tr>
                         <td><?php echo $row['tip_pro_nombre'];?></td>
                            <td class="dataDelete"><?php echo $row['tip_pro_descripcion'];?></td>
                           <td>
                            <?php
                                $modulo = 'productos';
                                $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                                $crud = permisos($modulo,$permit);
                                if ($crud[2]==true) {?>
                            <div class="flex-container"><div class="tooltip--actualizar"><a href="modificar-categoria-<?php echo rtrim(strtr(base64_encode($row['tip_pro_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i>
                              <span class="tooltiptext">Actualizar</span></a></div>
                            <?php }  if ($crud[3]==true) { ?>
                            <div class="tooltip--eliminar"><a href="#" onclick="return confirmDeleteCategories(
                            <?php
                                echo $row['tip_pro_codigo'];
                            ?>
                            )"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="tooltiptext">Eliminar</span></a></div>
                            <?php } ?>
                          </div></td>
                      </tr>

                <?php	} ?>
            </tbody>
      </table>

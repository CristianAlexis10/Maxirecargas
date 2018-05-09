<table class="datatable" id="datamark">
            <thead>
                    <tr>
                            <th>Nombre</th>
                            <th class="dataDelete">Descripción</th>
                            <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->selectAll('marca') as $row) {?>
                     <tr>
                         <td><?php echo $row['mar_nombre'];?></td>
                            <td class="dataDelete"><?php echo $row['mar_descripcion'];?></td>
                           <td>
                            <?php
                             $modulo = 'productos';
                               $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
                            $crud = permisos($modulo,$permit);
                            if ($crud[2]==true) {?>
                            <div class="flex-container"><div class="tooltip--actualizar"><a href="modificar-marca-<?php echo rtrim(strtr(base64_encode($row['mar_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i>
                              <span class="tooltiptext">Actualizar</span></a></div>
                            <?php }  if ($crud[3]==true) {?>
                            <div class="tooltip--eliminar"><a href="#" onclick="return confirmDeleteMark(
                            <?php
                         echo $row['mar_codigo'];
                            ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="tooltiptext">Eliminar</span></a></div>
                          </div></td>

                           <?php } ?>
                      </tr>

                <?php	} ?>
            </tbody>
      </table>

<table class="datatable" id="datamark">
            <thead>
                    <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->selectAll('marca') as $row) {?>
                     <tr>
                         <td><?php echo $row['mar_nombre'];?></td>
                            <td><?php echo $row['mar_descripcion'];?></td>
                           <td>
                            <a href="modificar-marca-<?php echo rtrim(strtr(base64_encode($row['mar_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
                            <a href="#" onclick="return confirmDeleteMark(
                            <?php
                         echo $row['mar_codigo'];
                            ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           </td>
                      </tr>

                <?php	} ?>
            </tbody>
      </table>

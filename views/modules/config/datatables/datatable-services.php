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
                            <a href="modificar-servicio-<?php echo rtrim(strtr(base64_encode($row['Tip_ser_cod']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
                            <a href="#" onclick="return confirmDelete(
                            <?php
                         echo $row['Tip_ser_cod'];
                            ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           </td>
                      </tr>

                <?php	} ?>
            </tbody>
      </table>

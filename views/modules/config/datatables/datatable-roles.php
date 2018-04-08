<table id="datatableRoles" class="datatable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->master->selectAll('tipo_usuario') as $row) {?>
          <tr>
            <td><?php echo $row['tip_usu_rol']?></td>
            <td><?php if($row['tip_usu_codigo']!=1 && $row['tip_usu_codigo']!=2 && $row['tip_usu_codigo']!=3){ ?>
            <div class="flex-container"><div class="tooltip--actualizar"><a href="ver-rol-<?php echo rtrim(strtr(base64_encode($row['tip_usu_codigo']), '+/', '-_'), '=');?>"><i class="fa fa-external-link" aria-hidden="true"></i>
              <span class="tooltiptext">Actualizar</span></a></div>
            <?php  } ?>
            <!-- eliminar  -->
            <?php if($row['tip_usu_codigo']!=1 && $row['tip_usu_codigo']!=2 && $row['tip_usu_codigo']!=3 && $row['tip_usu_codigo']!=5){ ?>
            <div class="tooltip--eliminar"><a href="#" onclick="return confirmDeleteRole(
            <?php
            echo $row['tip_usu_codigo'];
            ?>)"><i class="fa fa-trash" aria-hidden="true"></i><span class="tooltiptext">Eliminar</span></a></div>
          <?php } ?>
        </div></td>
          </tr>
        <?php } ?>
      </tbody>
</table>

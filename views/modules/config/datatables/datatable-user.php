<table id="datatableUser" class="datatable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->master->selectAllBy('usuario',array('tip_usu_codigo',1)) as $row) {?>
          <tr>
            <td><?php echo $row['usu_primer_nombre']?></td>
            <td><?php echo $row['usu_direccion']?></td>
            <td><?php echo $row['usu_telefono']?></td>
            <td><a href="ver-cliente-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <!-- eliminar  -->
            <?php
            $modulo = 'usuarios';
            $crud = permisos($modulo,$permit);
             if($crud[3]==true){?>
            <a href="#" onclick="return confirmDeleteUser(
            <?php
         echo $row['usu_codigo'];
            ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>

            <!-- inactivar -->
            <?php
            } 
            if ($row['id_estado']==1){?>
                <a href="#" onclick="return confirmOffUser(2,
                <?php
                echo $row['usu_codigo'];
                ?>)">inactivar</i></a>
                <!-- activar -->
            <?php }else{?>
                    <a href="#" onclick="return confirmOffUser(1,
                <?php
                echo $row['usu_codigo'];
                ?>)">Activar</i></a>
            <?php } ?>
        </td>
          </tr>
        <?php } ?>
      </tbody>
</table>

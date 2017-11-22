<table id="datatableCliiEmp" class="datatable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->master->selectAllBy('usuario',array('tip_usu_codigo',3)) as $row) {?>
          <tr>
            <td><?php echo $row['usu_primer_nombre']?></td>
            <td><?php echo $row['usu_direccion']?></td>
            <td><?php echo $row['usu_telefono']?></td>
            <td><a href="ver-cliente-empresarial-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>"><i class="fa fa-external-link" aria-hidden="true"></i></a>
            <!-- eliminar  -->
            <a href="#" onclick="return confirmDeleteCliEmp(
            <?php
         echo $row['usu_codigo'];
            ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>

            <!-- inactivar -->
            <?php if ($row['id_estado']==1){?>
                <a href="#" onclick="return confirmOffUserEmp(2,
                <?php
                echo $row['usu_codigo'];
                ?>)">inactivar</i></a>
                <!-- activar -->
            <?php }else{?>
                    <a href="#" onclick="return confirmOffUserEmp(1,
                <?php
                echo $row['usu_codigo'];
                ?>)">Activar</i></a>
            <?php } ?>
        </td>
          </tr>
        <?php } ?>
      </tbody>
</table>

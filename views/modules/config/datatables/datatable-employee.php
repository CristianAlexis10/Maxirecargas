<?php
$modulo = 'usuarios';
$crud = permisos($modulo,$_SESSION['CUSTOMER']['PERMITS']);
?>
<table class="datatable" id="dataEmployee">
    <thead>
      <tr>
        <th>Nombre</th>
        <th class="table-direction">Dirección</th>
        <th class="dataDelete">Teléfono</th>
        <th>Ver más</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->master->todosLosUsuario() as $row) {?>
          <tr>
            <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido']?></td>
            <td class="table-direction"><?php echo $row['usu_direccion']?></td>
            <td class="dataDelete"><?php echo $row['usu_telefono']?></td>
            <td><div class="flex-container"><div class="tooltip--actualizar"><a href="ver-cliente-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>"><i class="fa fa-external-link" aria-hidden="true"></i>
              <span class="tooltiptext">Actualizar</span></a></div>
            <!-- eliminar  -->
            <?php if($crud[3]==true){ ?>
            <div class="tooltip--eliminar"><a href="#" onclick="return confirmDeleteUser(
            <?php
         echo $row['usu_codigo'];
            ?>)"><i class="fa fa-trash" aria-hidden="true"></i><span class="tooltiptext">Eliminar</span></a></div>

            <!-- inactivar -->
          <?php } if ($row['id_estado']==1){?>
                <a href="#" onclick="return confirmOffUserEmpleado(2,
                <?php
                echo $row['usu_codigo'];
                ?>)">Inactivar</i></a>
                <!-- activar -->
            <?php }else{?>
                    <a href="#" onclick="return confirmOffUserEmpleado(1,
                <?php
                echo $row['usu_codigo'];
                ?>)">Activar</i></a>
            <?php } ?>
        </div></td>
          </tr>
        <?php } ?>

      </tbody>
</table>

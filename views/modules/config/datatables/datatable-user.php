<table id="dataGrid">
        <thead>
                <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Ver mas</th>
                </tr>
     </thead>
        <tbody>
            <?php foreach ($this->readAll() as $row) {?>
                 <tr>
                     <td><?php echo $row['usu_primer_nombre']?></td>
                        <td><?php echo $row['usu_direccion']?></td>
                       <td><?php echo $row['usu_telefono']?></td>

                       <td><a href="ver-cliente-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php } ?>
        </tbody>
  </table>

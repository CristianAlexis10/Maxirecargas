<table class="datatable" id="datableProduct">
          <thead>
                  <tr>
                          <th>Referencia</th>
                          <!-- <th>Marca</th> -->
                          <th>Descripción</th>
                          <th>Acciones</th>
                  </tr>
       </thead>
          <tbody>
              <?php foreach ($this->master->selectAll('producto') as $row) {?>
                   <tr>
                       <td><?php echo $row['pro_referencia'];?></td>
                          <!-- <td><?php //echo $row['id_marca'];?></td> -->
                          <td><?php echo $row['pro_descripcion'];?></td>
                         <td>
                          <a href="modificar-producto-<?php echo rtrim(strtr(base64_encode($row['pro_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i></a>
                          <a href="#" onclick="return confirmDeleteProduct(<?php echo $row['pro_codigo']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                         </td>
                    </tr>

              <?php	} ?>
          </tbody>
    </table>
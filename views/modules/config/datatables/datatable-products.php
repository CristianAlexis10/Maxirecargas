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
                          <?php
                          if ($crud[2]==true) {?>
                          <div class="flex-container"><div class="tooltip--actualizar"><a href="modificar-producto-<?php echo rtrim(strtr(base64_encode($row['pro_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-pencil-square-o"></i>
                            <span class="tooltiptext">Actualizar</span></a></div>
                          <?php } if ($crud[3]==true) {?>
                          <div class="tooltip--eliminar"><a href="#" onclick="return confirmDeleteProduct(<?php echo $row['pro_codigo']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                            <span class="tooltiptext">Eliminar</span></a></div>
                          <?php } ?>
                        </div></td>
                    </tr>

              <?php	} ?>
          </tbody>
    </table>

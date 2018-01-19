<table class="datatable" id="dataPending">
            <thead>
                    <tr>
                        <th>Encargado</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>N° visitas del dia</th>
                        <th>Ver</th>
                    </tr>
         </thead>
            <tbody>
                <?php
                if ($_SESSION['CUSTOMER']['ROL']==5) {
                  $query =$this->master->verRutasBy($_SESSION['CUSTOMER']['ID']);
                }else{
                  $query  = $this->master->verRutas();
                }
                 foreach ($query as $row) {
                  $count = $this->master->ContarRutasParaHoyPorUsuario($row['usu_codigo'],date('Y-m-d'));
                  ?>
                     <tr>
                         <td><?php echo $row['usu_primer_nombre']." ".$row['usu_primer_apellido'] ;?></td>
                         <td><?php echo $row['usu_correo'];?></td>
                         <td><?php echo $row['usu_celular'];?></td>
                            <td><?php echo $count['total']; ?></td>
                           <td>
                            <?php
                                if ($crud[1]==true) {?>
                            <a href="ver-ruta-dia-<?php echo rtrim(strtr(base64_encode($row['usu_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>

                           </td>
                      </tr>

                <?php }	} ?>
            </tbody>
      </table>

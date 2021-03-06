<table class="datatable" id="dataQuotrationUser">
            <thead>
                    <tr>
                        <th class="table-token">Token</th>
                        <th class="datatable--ocultar">Dirección</th>
                        <th>Fecha</th>
                        <th class="table-estado">Estado</th>
                        <th>Acciones</th>
                    </tr>
         </thead>
            <tbody>
                <?php foreach ($this->master->cotizacionesRealizadasBy($_SESSION['CUSTOMER']['ID']) as $row) { ?>
                     <tr>
                          <td class="table-token"><?php echo $row['cot_token'];?></td>
                          <td class="datatable--ocultar"><?php echo $row['ciu_nombre']." ".$row['cot_dir'];?></td>
                          <td><?php echo $row['cot_fecha'];?></td>
                         <td class="table-estado"><?php echo $row['cot_estado']; ?></td>
                           <td>
                             <a href="mi-cotizacion-<?php echo rtrim(strtr(base64_encode($row['cot_codigo']), '+/', '-_'), '=');?>" ><i class="fa fa-eye"></i></a>
                            <?php if($row['cot_estado']!="Terminado"){ ?>
                                  <a href="#" alt="Cancelar Cotización" onclick="cancelQuotation(<?php echo $row['cot_codigo']; ?>)" ><i class="fa fa-times"></i></a>
                              <?php } ?>
                          </td>
                      </tr>

                <?php	 } ?>
            </tbody>
      </table>

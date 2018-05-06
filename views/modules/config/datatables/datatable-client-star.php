<table id="dataGrid">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Nro. Pedidos</th>
      <th class="dataDelete">Correo</th>
      <th>Fecha Ult ped.</th>
      <!-- <th>ver mas</th> -->
    </tr>
  </thead>
  <tbody>
    <?php foreach ($this->master->clientesEstrellas() as $row) {?>
      <tr>
        <td><?php echo $row['usu_primer_nombre']?></td>
        <td><?php echo $row['cantidad']?></td>
        <td class="dataDelete"><?php echo $row['usu_correo']?></td>
        <td><?php echo $row['ven_fecha']?></td>
        <!-- <td><i class="fa fa-external-link" aria-hidden="true"></i></td> -->
      </tr>
    <?php } ?>
  </tbody>
</table>

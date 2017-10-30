  <nav class="navigator">
    <ul>
        <li><a href="dashboard" class="item">Inicio</a></li>
        <?php
        if (!isset($_SESSION['ROL'])) {
          $_SESSION['ROL']=1;
        }
            $permit = $this->master->moduleSecurity($_SESSION['ROL']);
            foreach ($permit as $row) {
               if ($row['mod_nombre']=="pedidos") {
                  echo '<li><a href="pedidos" class="item">Pedidos</a></li>';
               }
                if ($row['mod_nombre']=="rutas") {
                  echo '<li><a href="ruta" class="item">Ruta</a></li>';
               }
                if ($row['mod_nombre']=="usuarios") {
                  echo '<li><a href="clientes" class="item">Clientes</a></li>';
               }
                if ($row['mod_nombre']=="cotizacion") {
                  echo '<li><a href="cotizacion" class="item">Cotización</a></li>';
               }
                if ($row['mod_nombre']=="productos") {
                  echo '<li><a href="productos" class="item">Productos</a></li>';
               }
            }
          ?>
    </ul>
  </nav>

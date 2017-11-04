<nav class="navigator">
  <ul>
      <li><a href="dashboard" class="item">Inicio</a></li>
      <?php
      if (!isset($_SESSION['CUSTOMER']['ROL'] )) {
        $_SESSION['CUSTOMER']['ROL'] =1;
      }
          $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
          foreach ($permit as $row) {
              echo '<li><a href="'.$row['enlace'].'" class="item">'.$row['mod_nombre'].'</a></li>';
          }
        ?>
  </ul>
</nav>

<nav class="navigator">
  <ul>
      <li><a href="dashboard" class="item">Inicio</a></li>
      <?php
      if (!isset($_SESSION['ROL'])) {
        $_SESSION['ROL']=1;
      }
          $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
          foreach ($permit as $row) {
              echo '<li><a href="'.$row['href'].'" class="item">'.$row['mod_nombre'].'</a></li>';
          }
        ?>
  </ul>
</nav>

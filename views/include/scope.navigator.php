
<nav class="navigator <?php echo $_SESSION['CUSTOMER']['STYLE']['est_usu_navigator'] ;?> ">
  <ul>
      <li><a href="dashboard" class="item"><i class="fa fa-home" aria-hidden="true"></i>
Inicio</a></li>
      <?php
      if (isset($_SESSION['CUSTOMER']['ROL'] )) {
          $permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
          foreach ($permit as $row) {
              echo '<li><a href="'.$row['enlace'].'" class="item">'.$row['icon'].' '.$row['mod_nombre'].'</a></li>';
          }
          if ($_SESSION['CUSTOMER']['ROL']==2) {
            echo '<li><a href="gestion-rol" class="item"><i class="fa fa-lock"></i> Roles</a></li>';
          }
      }
        ?>
  </ul>
</nav>

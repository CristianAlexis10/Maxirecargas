
<?php
	if (isset($_SESSION['CUSTOMER']['ID'])) {
		$profile = $this->master->selectBy('usuario',array('usu_codigo',$_SESSION['CUSTOMER']['ID']));?>

		<div class="menu--top">
			<div class="profile">
				<p><a href="perfil"><?php echo $profile['usu_primer_nombre']." ".$profile['usu_primer_apellido']?></a></p>
				<img src="views/assets/image/profile<?php echo $profile['foto']?>" alt="">
			</div>
			<div class="items">
				<ul>
				<li><a href="configuraciones"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
				<li><a href="estadisticas"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
				<li><a href="finalizar"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			</ul>
			</div>
		</div>
<?php } ?>


<?php
	if (isset($_SESSION['CUSTOMER']['ID'])) {?>

		<div class="menu--top">
			<div class="profile">
				<p><a href="perfil"><?php echo $_SESSION['CUSTOMER']['NAME']." ".$_SESSION['CUSTOMER']['LAST_NAME']?></a></p>
				<?php
					echo "<img src='views/assets/image/profile/".$_SESSION['CUSTOMER']['PHOTO']."'/>";
				?>
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

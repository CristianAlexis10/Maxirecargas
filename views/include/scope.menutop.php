<?php
	if (isset($_SESSION['CUSTOMER']['ID'])) {?>
		<div class="menu--top <?php echo $_SESSION['CUSTOMER']['STYLE']['est_usu_menu_top'] ?>">
			<div class="container--menumobile">
				<i class="fa fa-bars" aria-hidden="true" id="menu--mobile"></i>
			</div>
			<div class="items">
				<div class="profile">
					<a href="perfil">	<?php
						echo "<img src='views/assets/image/profile/".$_SESSION['CUSTOMER']['PHOTO']."'/>";
						?></a>
					<p><a href="perfil"><?php echo $_SESSION['CUSTOMER']['NAME']." ".$_SESSION['CUSTOMER']['LAST_NAME']?></a></p>
				</div>
				<div>
					<?php
						if ($_SESSION['CUSTOMER']['ROL']==2) {?>
						<div class="menutop-config"><a href="configuraciones"  class="menutop--icon" ><i class="fa fa-cogs" aria-hidden="true"></i></a>
						<span class="tooltiptext">Configuración</span></div>
						<?php }	?>
			</div>
			<div class="menutop-finalizar"><a href="finalizar" class="menutop--icon"><i class="fa fa-power-off" aria-hidden="true"></i></a>
			<span class="tooltiptext">Finalizar</span></div>
			</div>
		</div>
<?php } ?>

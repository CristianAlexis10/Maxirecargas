<?php
	if (isset($_SESSION['CUSTOMER']['ID'])) {?>
		<div class="menu--top <?php echo $_SESSION['CUSTOMER']['STYLE']['est_usu_menu_top'] ?>">
			<div class="container--menumobile">
				<i class="fa fa-bars" aria-hidden="true" id="menu--mobile"></i>
			</div>
			<div class="items">
				<div class="profile">
					<p><a href="perfil"><?php echo $_SESSION['CUSTOMER']['NAME']." ".$_SESSION['CUSTOMER']['LAST_NAME']?></a></p>
					<?php
					//	echo "<img src='views/assets/image/profile/".$_SESSION['CUSTOMER']['PHOTO']."'/>";
					?>
				</div>
				<div>
					<?php
						if ($_SESSION['CUSTOMER']['ROL']==2) {?>
						<div><a href="configuraciones"  class="menutop--icon" ><i class="fa fa-cogs" aria-hidden="true"></i></a></div>
						<?php }	?>
			</div>
			<div><a href="finalizar" class="menutop--icon"><i class="fa fa-power-off" aria-hidden="true"></i></a></div>
			</div>
		</div>
<?php } ?>

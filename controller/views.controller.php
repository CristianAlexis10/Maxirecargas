<?php
	class ViewsController{

	 	function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
					require_once "views/modules/customer/index.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}
	 	function newUser(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
					require_once "views/modules/customer/index.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}

	}
?>

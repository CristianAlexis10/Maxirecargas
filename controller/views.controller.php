<?php
	class ViewsController{

	 	function main(){
			if (isset($_SESSION['CUSTOMER']['CLIENT'])) {
					require_once "views/modules/customer/index.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}
	 	function newUser(){
				require_once "views/modules/user/signin.php";
		}

	}
?>

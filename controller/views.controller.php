<?php
	class ViewsController{

	 	function main(){
			if ($_SESSION['CUSTOMER']['ROL']) {
					require_once "views/modules/customer/index.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}

	}
?>

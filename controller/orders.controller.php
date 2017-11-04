<?php
	class OrdersController{
		private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/orders/index.php";
				require_once "views/include/scope.footer.php";
			}else{
				echo "calma que no lo hemos hecho";
			}
		}
		function viewDetail(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/orders/detail.php";
			require_once "views/include/scope.footer.php";
		}
	}
?>
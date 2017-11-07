<?php
	class OrdersController{
		private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL']) && $_SESSION['CUSTOMER']['ROL']==3) {
				// require_once "views/include/scope.header.php";
				require_once "views/modules/customer/orders/orders.php";
				// require_once "views/include/scope.footer.php";
			}elseif (isset($_SESSION['CUSTOMER']['ROL'])!=3) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/orders/index.php";
				require_once "views/include/scope.footer.php";
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/orders/index.php";
				require_once "views/include/user/scope.footer.php";;
			}
		}
		function viewDetail(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/orders/detail.php";
			require_once "views/include/scope.footer.php";
		}
	}
?>

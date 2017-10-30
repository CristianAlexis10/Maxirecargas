<?php
	class OrdersController{
		private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/orders/index.php";
			require_once "views/include/scope.footer.php";
		}
		function viewDetail(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/orders/detail.php";
			require_once "views/include/scope.footer.php";
		}
	}
?>
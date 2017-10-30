<?php
	class AdminController{
	  	private $master;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 	}
	 	function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/dashboard.php";
			require_once "views/include/scope.footer.php";
		}
		function profile(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/profile/index.php";
			require_once "views/include/scope.footer.php";
		}
		function settings(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/profile/settings.php";
			require_once "views/include/scope.footer.php";
		}
		function statistics(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/profile/statistics.php";
			require_once "views/include/scope.footer.php";
		}
	}
?>
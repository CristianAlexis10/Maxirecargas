<?php

require_once "controller/doizer.controller.php";
	class AdminController{
	  	private $master;
	  	private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
	 	function main(){
	 		if (isset($_SESSION['CUSTOMER']['ROL']) && !isset($_SESSION['CUSTOMER']['CLIENT'])) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/dashboard.php";
				// require_once "views/include/scope.footer.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function profile(){
			if (isset($_SESSION['CUSTOMER']['ROL'])&& !isset($_SESSION['CUSTOMER']['CLIENT'])) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/profile/index.php";
				// require_once "views/include/scope.footer.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function settings(){
			if (isset($_SESSION['CUSTOMER']['ROL'])&& !isset($_SESSION['CUSTOMER']['CLIENT'])) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/profile/settings.php";
				require_once "views/include/scope.footer.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function statistics(){
			if (isset($_SESSION['CUSTOMER']['ROL']) && !isset($_SESSION['CUSTOMER']['CLIENT'])) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/profile/statistics.php";
				require_once "views/include/scope.footer.php";
			}else{
				require_once "views/modules/landing.html";
			}
		}
	}
?>

<?php
	require_once "controller/doizer.controller.php";
	class SettingController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->file = new DoizerController;
	 	}
		function contact(){
			echo json_encode($_POST["num1"]);
		}

	}
?>

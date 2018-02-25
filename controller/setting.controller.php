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
			$result = $this->master->cambiarDatosContacto(array($_POST["num1"],$_POST["num2"],$_POST["wpp"],$_POST["correo"],$_POST["dirc"],$_POST["inicio"],$_POST["fi"]));
			if ($result==true) {
				echo json_encode("Modificado Exitosamente.");
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}

	}
?>

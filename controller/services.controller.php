<?php
require_once "controller/doizer.controller.php";
	class ServicesController{
		private $master;
		private $doizer;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 		$this->tableName="tipo_servicio";
	 		$this->insertException=array('Tip_ser_cod');
	 		$this->updateException = array('Tip_ser_cod','tip_ser_registro');
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				$modulo = 'productos';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				if ($crud[2]==true) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/products/services/new.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function viewUpdate(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				$modulo = 'productos';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				if ($crud[2]==true) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/products/services/update.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}

		}

		function newRegister(){
			$data = $_POST['data'];
			$data[]=date('Y-m-d');
			if ($data[0]!='') {
				$result = $this->master->insert($this->tableName,$data,$this->insertException);
				if ($result==1) {
					echo json_encode(true);
				}else{
					echo json_encode($this->doizer->knowError($result));
				}
			}else{
				echo  json_encode('campos vacios');
			}
		}
		function readAll(){
			$result = $this->master->selectAll($this->tableName);
			return $result;
		}
		function readBy($data){
			$result = $this->master->selectBy($this->tableName,array('Tip_ser_cod',$data));
			return $result;
		}
		function update(){
			$data=$_POST['data'];
			$result = $this->master->update($this->tableName,array('Tip_ser_cod',$_SESSION['service_update']),$data,$this->updateException);
			if ($result==1) {
				echo json_encode(true);
			}else{
				echo json_encode($result);
			}
		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->delete($this->tableName,array('Tip_ser_cod',$data));
			if ($result==1) {
				echo json_encode('Eliminado Exitosamente');
			}else{
				echo json_encode($this->doizer->knowError($result));
			}

		}
	}
?>

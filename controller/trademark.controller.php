<?php
require_once "controller/doizer.controller.php";
	class TrademarkController{
		private $master;
		private $doizer;
		private $tableName;
		private $insertException;
		private $updateException;

	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;

	 		$this->tableName="marca";
	 		$this->insertException=array('mar_codigo');
	 		$this->updateException = array('mar_codigo');
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				$modulo = 'productos';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				if ($crud[2]==true) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/products/trademark/new.php";
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
					require_once "views/modules/admin/products/trademark/update.php";
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
			$result = $this->master->crearMarca($data);
			if ($result==1) {
				echo json_encode(true);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function readAll(){
			$result = $this->master->selectAll($this->tableName);
			return $result;
		}
		function readBy($data){
			$result = $this->master->selectBy($this->tableName,array('mar_codigo',$data));
			return $result;
		}
		function update(){
			$data=$_POST['data'];
			$result = $this->master->update($this->tableName,array('mar_codigo',$_SESSION['trademark_update']),$data,$this->updateException);
			// echo $result;
			if ($result==1) {
				echo json_encode("Actualizado Exitosamente");
			}else{
				echo json_encode($result);
			}
		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->delete($this->tableName,array('mar_codigo',$data));
			if ($result==1) {
				echo json_encode("Eliminado Exitosamente");
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
	}
?>

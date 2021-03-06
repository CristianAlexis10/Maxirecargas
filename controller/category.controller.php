<?php
require_once "controller/doizer.controller.php";
	class CategoryController{
		private $master;
		private $doizer;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 		$this->tableName="tipo_producto";
	 		$this->insertException=array('tip_pro_codigo');
	 		$this->updateException = array('tip_pro_codigo');
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='productos') {
						$access = true;
					}
				}
				if (isset($access)) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/products/category/new.php";
					// require_once "views/include/scope.footer.php";
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
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='productos') {
						$access = true;
					}
				}
				if (isset($access)) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/products/category/update.php";
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
			if ($data[1]=="icn-maxi.png") {
				echo json_encode("Por favor seleccione una imagen");
				return ;
			}
			$result = $this->master->insert($this->tableName,array($data[0],$data[2],$data[1]),$this->insertException);
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
			$result = $this->master->selectBy($this->tableName,array('tip_pro_codigo',$data));
			return $result;
		}
		function update(){
			$data=$_POST['data'];
			$result = $this->master->update($this->tableName,array('tip_pro_codigo',$_SESSION['category_update']),$data,$this->updateException);
			unset($_SESSION['category_update']);
			if ($result==1) {
				$_SESSION['message']="Actualizado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: productos");
		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->delete($this->tableName,array('tip_pro_codigo',$data));
			if ($result==1) {
				echo json_encode("Eliminado Exitosamente");
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
	}
?>

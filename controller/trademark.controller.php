<?php

	class TrademarkController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;

	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;

	 		$this->tableName="marca";
	 		$this->insertException=array('mar_codigo');
	 		$this->updateException = array('mar_codigo');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/trademark/new.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/trademark/update.php";
			require_once "views/include/scope.footer.php";
		}
		function newRegister(){
			$data = $_POST['data'];
			$result = $this->master->insert($this->tableName,$data,$this->insertException);
			if ($result==1) {
				$_SESSION['message']="Registrado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: productos");
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
			unset($_SESSION['trademark_update']);
			if ($result==1) {
				$_SESSION['message']="Actualizado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: productos");
		}
		function delete(){
			$data = base64_decode($_GET['data']);
			$result = $this->master->delete($this->tableName,array('mar_codigo',$data));
			die($result);
			// if ($result==1) {
			// 	$_SESSION['message']="Eliminado Exitosamente";
			// }else{
			// 	$_SESSION['message_error']=$result;
			// }
			// header("Location: productos");
		}
	}
?>

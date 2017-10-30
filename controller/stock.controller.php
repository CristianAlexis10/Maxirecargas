<?php
	require_once "controller/files.controller.php";
	class StockController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
		private $file;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->file = new FilesController;
	 		$this->tableName="stock";
	 		$this->insertException=array('id_stock','cantidad_actual');
	 		$this->updateException = array('id_stock');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/stock/index.php";
			require_once "views/include/scope.footer.php";
		}
		function viewNewRegister(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/stock/new.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/stock/update.php";
			require_once "views/include/scope.footer.php";
		}
		function newRegister(){
			$data = $_POST['data'];
			$id = $this->master->selectBy('producto',array('referencia',$_SESSION['new_stock']));
			$data[]=$id['id_producto'];
			unset($_SESSION['new_stock']);
			 $data[]=date('Y-m-d');
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
			$result = $this->master->selectBy($this->tableName,array('id_producto',$data));
			return $result;
		}
		function update(){
			$data=$_POST['data'];
			$result = $this->master->update($this->tableName,array('id_producto',$_SESSION['category_update']),$data,$this->updateException);
			unset($_SESSION['product_update']);
			if ($result==1) {
				$_SESSION['message']="Actualizado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: productos");
		}
		function delete(){
			$data = base64_decode($_GET['data']);
			$result = $this->master->delete($this->tableName,array('id_producto',$data));
			if ($result==1) {
				$_SESSION['message']="Eliminado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: productos");
		}
	}
?>
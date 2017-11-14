<?php
	class CategoryController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->tableName="tipo_producto";
	 		$this->insertException=array('tip_pro_codigo');
	 		$this->updateException = array('tip_pro_codigo');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/category/new.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/category/update.php";
			require_once "views/include/scope.footer.php";
		}
		function newRegister(){
			$data = $_POST['data'];
			$result = $this->master->insert($this->tableName,$data,$this->insertException);
			if ($result==1) {
				echo json_encode("Registrado Exitosamente");
			}else{
				echo json_encode($result);
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
				echo json_encode($result);
			}
		}
	}
?>

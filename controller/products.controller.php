<?php
	class ProductsController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->tableName="producto";
	 		$this->insertException=array('id_producto');
	 		$this->updateException = array('id_producto');
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])&& !isset($_SESSION['CUSTOMER']['CLIENT'])) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/products/index.php";
				require_once "views/include/scope.footer.php";
			}elseif(isset($_SESSION['CUSTOMER']['ROL'])){
				echo "Calma que no hemos hecho la vista";
				// require_once "views/include/scope.header.php";
				// require_once "views/modules/admin/products/index.php";
				// require_once "views/include/scope.footer.php";
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/products/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
		function newCategory(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/category/new.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/update.php";
			require_once "views/include/scope.footer.php";
		}
		function newRegister(){
			$data = $_POST['data'];

			 $data[]=date('Y-m-d');
			$result = $this->master->insert($this->tableName,$data,$this->insertException);
			if ($result==1) {
				$_SESSION['message']="Registrado Exitosamente";
				$_SESSION['new_stock']=$data[1];
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: crear-inventario");
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

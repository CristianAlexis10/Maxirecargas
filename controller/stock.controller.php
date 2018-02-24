<?php
	require_once "controller/doizer.controller.php";
	class StockController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
		private $file;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->file = new DoizerController;
	 		$this->tableName="stock";
	 		$this->insertException=array('sto_codigo');
	 		$this->updateException = array('sto_codigo');
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
			$opciones = $_POST['opciones_busqueda'];
			$data = $_POST['data'];
			$id = $this->master->selectBy('producto',array('pro_referencia',$_SESSION['new_stock']));
			//opciones de busqueda
			$result = $this->master->opcionesBusqueda(array($id['pro_codigo'],$opciones));
			$data[]=$id['pro_codigo'];
			unset($_SESSION['new_stock']);
			 // $data[]=date('Y-m-d');
			$result = $this->master->insert($this->tableName,array($data[3],$data[0],$data[1],$data[2]),$this->insertException);
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

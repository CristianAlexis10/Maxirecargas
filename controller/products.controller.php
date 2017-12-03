<?php
	require_once "controller/doizer.controller.php";
	class ProductsController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 		$this->tableName="producto";
	 		$this->insertException=array('pro_codigo');
	 		$this->updateException = array('pro_codigo');
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
			$data[]=1;
			if (isset($_POST['services'])) {
				 $ser = $_POST['services'];
				$result = $this->master->insert($this->tableName,$data,$this->insertException);
				$data_pro = $this->master->selectBy('producto',array('pro_referencia',$data[2]));
				foreach ($ser as $key) {
					$result = $this->master->insert('servicioxproducto',array($key,$data_pro['pro_codigo']));
				}
			}else{
				$result ='por favor seleccione un servicio';
			}

			//  $data[]=date('Y-m-d');
			// header("Location: crear-inventario");
			echo json_encode($result);
		}
		function readAll(){
			$result = $this->master->selectAll($this->tableName);
			return $result;
		}
		function readBy($data){
			$result = $this->master->selectBy($this->tableName,array('pro_codigo',$data));
			return $result;
		}
		function update(){
			$data=$_POST['data'];
			$services = $_POST['services'];
			$result = $this->master->selectBy($this->tableName,array('pro_codigo',$_SESSION['product_update']));
			unlink("views/assets/image/products/".$result['pro_imagen']);
			$result = $this->master->update($this->tableName,array('pro_codigo',$_SESSION['product_update']),$data,$this->updateException);

			$result = $this->master->delete('servicioxproducto',array('pro_codigo',$_SESSION['product_update']));
			foreach ($services as $service) {
				$result = $this->master->insert("servicioxproducto",array($service,$_SESSION['product_update']));
			}
			if ($result==true) {
				echo json_encode("Modificado Exitosamente");
			}else{
				echo  json_encode($this->doizer->knowError($result));
			}
		
		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->selectBy($this->tableName,array('pro_codigo',$data));
			unlink("views/assets/image/products/".$result['pro_imagen']);
			$result = $this->master->delete($this->tableName,array('pro_codigo',$data));
			// echo json_encode($result);
			if ($result==1) {
				 echo json_encode('Eliminado Exitosamente');
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
	}
?>

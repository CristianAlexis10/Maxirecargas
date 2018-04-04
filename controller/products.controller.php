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
				if (isset($_SESSION['CUSTOMER']['ROL'])) {
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='productos') {
						$access = true;
					}
				}
				if (isset($access)) {
					//saber persimos crud de este modulo
					$modulo = 'productos';
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$crud = permisos($modulo,$permit);
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/products/index.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}
			}elseif(isset($_SESSION['CUSTOMER']['ROL'])){
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/customer/products/index.php";
				require_once "views/include/user/scope.footer.php";
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/products/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
		function newCategory(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
			//saber si puede acceder a este modulo
			foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
				if ($row['enlace']=='productos') {
					$access = true;
				}
			}
			if (isset($access)) {
				//saber persimos crud de este modulo
				$modulo = 'productos';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/products/category/new.php";
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
			//saber si puede acceder a este modulo
			foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
				if ($row['enlace']=='productos') {
					$access = true;
				}
			}
			if (isset($access)) {
				//saber persimos crud de este modulo
				$modulo = 'productos';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/products/update.php";
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
			if ($data[4]=="icn-maxi.png") {
				 echo json_encode("Selecciona una Imagen");
			}else{
				$data[]=1;
				if (isset($_POST['services']) &&  $_POST['services'][0]!="") {
					$ser = $_POST['services'];
					$result = $this->master->insert($this->tableName,$data,$this->insertException);
					if ($result==1) {
						$data_pro = $this->master->selectBy('producto',array('pro_referencia',$data[2]));
						$i= 0;
						foreach ($ser as $key) {
							foreach ($key as $value) {
								$result = $this->master->insert('servicioxproducto',array($ser[0][$i],$data_pro['pro_codigo']));
								$i++;
							}
						}
					}else{
						$result=$this->doizer->knowError($result);
					}
				}else{
					$result ='por favor seleccione un servicio';
				}
				$_SESSION['new_stock'] =	$data[2];
				echo json_encode($result);
			}
			//  $data[]=date('Y-m-d');
			// header("Location: crear-inventario");
		}
		function readAll(){
			$result = $this->master->selectAll($this->tableName);
			return $result;
		}
		function readBy($data){
			$result = $this->master->selectBy($this->tableName,array('pro_codigo',$data));
			return $result;
		}
		function filter(){
			$result = $this->master->filter($_POST['cat'],$_POST['value'],$_POST['ini'],$_POST['totalElePag']);
			echo json_encode($result);
		}
		function filterCount(){
			$resultCount = $this->master->filterCount($_POST['cat'],$_POST['value'])[0];
			echo json_encode($resultCount);
		}
		function update(){
			$data=$_POST['data'];
			$services = $_POST['services'];
			if ($services!="") {
				$result = $this->master->selectBy($this->tableName,array('pro_codigo',$_SESSION['product_update']));
				if ($data[4]!=$result['pro_imagen']) {
					unlink("views/assets/image/products/".$result['pro_imagen']);
				}
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
			}else{
				echo json_encode("Seleccione minimo un servicio");
			}

		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->selectBy($this->tableName,array('pro_codigo',$data));
			unlink("views/assets/image/products/".$result['pro_imagen']);
			$result = $this->master->delete('servicioxproducto',array('pro_codigo',$data));
			$result = $this->master->delete($this->tableName,array('pro_codigo',$data));
			// echo json_encode($result);
			if ($result==1) {
				 echo json_encode('Eliminado Exitosamente');
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}

		function countBycategory(){
			$result=$this->master->readByCategory(array($_POST['name']));
			echo json_encode($result[0][0]);
		}
		function readBycategoryPagination(){
			$result=$this->master->readBycategoryPagination(array($_POST['name'],$_POST['ini'],$_POST['totalElePag']));
			echo json_encode($result);
		}

		function readRefer(){
			$result = $this->master->readRefer();
			$data = [];
			foreach ($result as $row) {
				$data[]=$row['pro_referencia'];
			}
			echo json_encode($data);
		}
		function readOptionSearch(){
			$data=$_POST['data'];
			$result = $this->master->readOptionSearch($data);
			echo json_encode($result); 
		}
		function viewDetail(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/customer/products/detail.php";
				require_once "views/include/user/scope.footer.php";
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/products/detail.php";
				require_once "views/include/user/scope.footer.php";
			}
		}
	}
?>

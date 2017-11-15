<?php
	class ServicesController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->tableName="tipo_servicio";
	 		$this->insertException=array('Tip_ser_cod');
	 		$this->updateException = array('Tip_ser_cod','tip_ser_registro');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/services/new.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/products/services/update.php";
			require_once "views/include/scope.footer.php";
		}
	
		function newRegister(){
			$data = $_POST['data'];
			$data[]=date('Y-m-d');
			if ($data[0]!='') {
				$result = $this->master->insert($this->tableName,$data,$this->insertException);
				if ($result==1) {
					echo json_encode(true);
				}else{
					echo json_encode($result);
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
				echo json_encode($result);
			}

		}
	}
?>

<?php
	require_once "controller/files.controller.php";
	class TrademarkController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
		private $file;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->file = new FilesController;
	 		$this->tableName="marca";
	 		$this->insertException=array('id_marca');
	 		$this->updateException = array('id_marca','logo');
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
			if (isset($_FILES['file'])) {
			            $image=$this->file->image($_FILES);
			            if ($image[0]==true) {
			                move_uploaded_file($_FILES['file']['tmp_name'],"views/assets/image/trademark/".$image[1]);
			                $data[]=$image[1];
			            }else{
			            	$_SESSION['message_error']="Se ha generado un problema con el logo de la marca, por favor intentalo de nuevo";
			            	header("Location: productos");
			            	return ;
			            }
			 }
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
			$result = $this->master->selectBy($this->tableName,array('id_marca',$data));
			return $result;
		}
		function update(){
			$data=$_POST['data'];
			$result = $this->master->update($this->tableName,array('id_marca',$_SESSION['trademark_update']),$data,$this->updateException);
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
			$result = $this->master->delete($this->tableName,array('id_marca',$data));
			if ($result==1) {
				$_SESSION['message']="Eliminado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: productos");
		}
	}
?>
<?php
	require_once "controller/files.controller.php";
	require_once "controller/doizer.controller.php";
	class CustomersController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
		private $file;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->file = new FilesController;
	 		$this->doizer = new DoizerController;
	 		$this->tableName="usuario";
	 		$this->insertException=array('usu_codigo');
	 		$this->updateException = array('usu_codigo','contra','fecha_registro','ultimo_ingreso','foto');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/customers/index.php";
			require_once "views/include/scope.footer.php";
		}
		function viewDetail(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/customers/detail.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/customers/update.php";
			require_once "views/include/scope.footer.php";
		}
		function newRegister(){
			$data = $_POST['data'];
			if (isset($_FILES['file'])) {
			            $image=$this->file->image($_FILES);
			            if ($image[0]==true) {
			                move_uploaded_file($_FILES['file']['tmp_name'],"views/assets/image/profile/".$image[1]);
			                $data[]=$image[1];
			            }else{
			            	$_SESSION['message_error']="Se ha generado un problema con la imagen de perfil, por favor intentalo de nuevo";
			            	return ;
			            }
			 }
			 //validar contraseñas
			$password =  $this->doizer->validateSecurityPassword($data[14]);
			if (is_array($password)) {
				$validate_password=true;
			}else{
				$validate_password=false;
				$_SESSION['message_error']=$password;
				echo "<script>window.history.back(-1)</script>";
				return;
			}
			if (!$validate_password==true && $data[14]===$data[15]) {
				$_SESSION['message_error']="Las contraseñas son diferentes";
				$validate_password = false;
				echo "<script>window.history.back(-1)</script>";
				return;
			}
			if ($validate_password==true) {
				 //cliente normal
				 if ($data[13]!=2) {
				 	unset($data[14]);
				 	unset($data[15]);
				 	$data[]=1;
				 	$data[]=date('Y-m-d');
				 	$data[]=date('Y-m-d');
					$result = $this->master->insert($this->tableName,$data,$this->insertException);
				 }
				 if ($result==true) {
					$result = $this->master->selectBy($this->tableName,array('usu_num_documento',$data[1]));
					$data_acceso[]=$result['usu_codigo'];
					$data_acceso[]=$password[1];
					$result = $this->master->insert('acceso',$data_acceso,array('token'));
				 }
			  }
			if ($result==1) {
				$_SESSION['message']="Registrado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: clientes");
		}
		function readAll(){
			$result = $this->master->selectAll($this->tableName);
			return $result;
		}
		function readBy($data){
			$result = $this->master->selectBy($this->tableName,array('usu_codigo',$data));
			return $result;
		}
		function readByNumDoc($data = null){
			$data=$_POST['data'];
			$result = $this->master->selectBy($this->tableName,array('usu_num_documento',$data));
			if ($result != array()) {
				echo  json_encode('El numero de documento ya esta registrado en el sistema');
			}
		}
		function update(){
			$data=$_POST['data'];
			$result = $this->master->update($this->tableName,array('usu_codigo',$_SESSION['user_update']),$data,$this->updateException);
			unset($_SESSION['user_update']);
			if ($result==1) {
				$_SESSION['message']="Actualizado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: clientes");
		}
		function delete(){
			$data = base64_decode($_GET['data']);
			$result = $this->master->delete($this->tableName,array('usu_codigo',$data));
			if ($result==1) {
				$_SESSION['message']="Eliminado Exitosamente";
			}else{
				$_SESSION['message_error']=$result;
			}
			header("Location: clientes");
		}
	}
?>

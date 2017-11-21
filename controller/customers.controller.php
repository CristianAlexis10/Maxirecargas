<?php
	require_once "controller/doizer.controller.php";
	class CustomersController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 		$this->tableName="usuario";
	 		$this->insertException=array('usu_codigo','usu_segundo_nombre','usu_segundo_apellido','usu_direccion','usu_celular');
	 		$this->updateException = array('usu_codigo','fecha_registro','ultimo_ingreso');
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='clientes') {
						$access = true;
					}
				}
				if (isset($access)) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/customers/index.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}

		}
		function profile(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
					// require_once "views/modules/landing.html";
					require_once "views/modules/customer/profile/profile.php";
					// require_once "views/modules/landing.html";
				}else{
					require_once "views/modules/landing.html";
				}


		}
		function viewDetail(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
				$crud = permisos('clientes',$_SESSION['CUSTOMER']['PERMITS']);
					if ($row['enlace']=='clientes' && $crud[1]==true) {
						$access = true;
					}
				}
				if (isset($access)) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/customers/detail.php";
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
					if ($row['enlace']=='clientes') {
						$access = true;
					}
				}
				if (isset($access)) {
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/customers/update.php";
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
			$response_re = $_POST['get_captcha'];
			if (isset($response_re) && $response_re) {
				$secret_key = '6Ld_bDkUAAAAAPiAHYM_GX7QxbzLi_WFku7-9_tX';
				$ip_user = $_SERVER['REMOTE_ADDR'];
				$validation = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_re&remoteip=$ip_user");
				$result = json_decode($validation);
				if($result->success!=true){
					$i = 0;
					foreach ($data as $input) {
						if ($i==5) {
							
						}else{
							$result = $this->doizer->specialCharater($data[$i]);
							if ($result==false) {
								echo json_encode('los campos no deben tener caracteres especiales');
								return;
							}
						}
					}
					if ($data[0]!=3) {
						if (isset($_FILES['file']['tmp_name'])) {
							$profile = $this->doizer->ValidateImage($_FILES,"assets/image/profile/");
							if (is_array($profile)) {
								$profile = $profile[1];
							}else{
								echo json_encode($profile);
								return ;
							}
						}else{
							$profile = 'defaul.jpg';
						}
						//validar numero de documento
						if(	$this->doizer->onlyNumbers($data[2])==true){
							// validar contraseñas
							if ($this->doizer->validateEmail($data[5])==true) {
								if ($this->doizer->validateDate($data[8],'past')==false) {
									if ($data[10]===$data[11]) {
										$password =  $this->doizer->validateSecurityPassword($data[10]);
										if (is_array($password)) {
											$validate_password=true;
										}else{
											$validate_password=false;
											echo json_encode($password);
											return;
										}
										if ($validate_password==true) {
											unset($data[10]);
											unset($data[11]);
											$date = date('Y-m-d');
											   $result = $this->master->insert($this->tableName,array($data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[0],1,$profile,$date,$date),$this->insertException);
											   if ($result==1) {
												   $result = $this->master->selectBy($this->tableName,array('usu_num_documento',$data[2]));
												   $data_acceso[]=$result['usu_codigo'];
												   $data_acceso[]=$password[1];
												   $result = $this->master->insert('acceso',$data_acceso,array('token'));
											   }else{
											   	$result = $this->doizer->knowError($result);
											   }
											   	echo  json_encode($result);
										}
									}else{
										echo json_encode('las contraseñas  no coinciden');
									}
								}else{
									echo json_encode('al fecha de nacimiento no es valida');
								}
							}else{
								echo json_encode('formato de correo no valido');
							}
						}else{
							echo json_encode('El numero de identidad no es valido');
						}
					}else{
						//ciente empresarial
					}

				}else{
					echo json_encode('por favor realiza correctamente el recaptcha');
				}
			}else{
				echo json_encode('por favor realiza correctamente el recaptcha');
			}

		}
		function readAll(){
			$result = $this->master->selectAll($this->tableName);
			return $result;
		}
		function readBy($data){
			$result = $this->master->selectBy($this->tableName,array('usu_codigo',$data));
			return $result;
		}
		function readByNumDoc(){
			$data=$_POST['data'];
			$result = $this->master->procedure('consultaExisteUsuario',$data);
			if ($result != array()) {
				echo  json_encode(true);
			}else{
				echo json_encode(false);
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

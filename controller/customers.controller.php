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
		function ViewNewUser(){
			require_once "views/include/user/scope.header.php";
			require_once "views/modules/user/registrate.php";
			// require_once "views/modules/user/quotation/index.php";
			require_once "views/include/user/scope.footer.php";
				// require_once "views/include/user/scope.header.php";
				// require_once "views/include/user/scope.footer.php";

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
				$crud = permisos('usuarios',$_SESSION['CUSTOMER']['PERMITS']);
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
				if($result->success==true){
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
						$i++;
					}
						//foto de perfil
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
					//registrar roles menos cliente empresarial
					if ($data[0]!=3) {
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
											   $result = $this->master->procedure14('crearUsuario',array($data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[0],1,$profile,$date,$date));
											   if ($result==1) {
											   	$result  = $this->master->procedure("consultaExisteUsuario",$data[2]);
												   $data_acceso[]=md5($data[2].$data[5].date('Y-M-D'));
												   $data_acceso[]=$result['usu_codigo'];
												   $data_acceso[]=$password[1];
												   $result = $this->master->procedureAcceso($data_acceso);
												   
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
						//contraseñas iguales
						if ($data[15]==$data[16]) {
								//caracteres especiales
								$i = 0;
								foreach ($data as $input) {
									if ($i==13) {
										//formato de correo
										$result = $this->doizer->validateEmail($data[5]);
										if ($result!=true) {
											echo json_encode('Formato de correo no valido');
											return ;
										}
									}else{
										$result = $this->doizer->specialCharater($data[$i]);
										if ($result==false) {
											echo json_encode('los campos no deben tener caracteres especiales');
											return;
										}
									}
									$i++;
								}
								//contraseñas
								$password =  $this->doizer->validateSecurityPassword($data[15]);
								if (is_array($password)) {
									$validate_password=true;
								}else{
									$validate_password=false;
									echo json_encode($password);
									return;
								}
								//insertar
								$date = date('Y-m-d');
								$result = $this->master->procedure('',$data);
								if ($result==1) {
									echo json_encode('Registedo Exitosamente');
								}else{
									$result = $this->doizer->knowError($result);
									echo json_encode($result);
								}
						}else{
							echo json_encode('Contraseñas diferentes');
						}
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
			//foto de perfil
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
			$i = 0;
			foreach ($data as $input) {
				if ($i==4) {
					$result = $this->doizer->validateEmail($data[4]);
					if ($result!=true) {
						echo json_encode('Formato de correo no valido');
						return ;
					}
				}else{
					$result = $this->doizer->specialCharater($data[$i]);
					if ($result==false) {
						echo json_encode('los campos no deben tener caracteres especiales');
						return;
				}
				}
				$i++;
			}
			$result = $this->master->procedureUpdate(array($_SESSION['user_update'],$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$profile));
			if ($result==true) {
				echo json_encode('Modificado Exitosamente');
			}else{
				$result = $this->doizer->knowError($result);
				echo json_encode($result);
			}
			
		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->procedureNR('eliminarUsuario',$data);
			// die(json_encode($result));
			if ($result==true) {
				echo json_encode('Eliminado correctamente');
			}else {
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function offUser(){
			$data = $_POST['data'];
			$action = $_POST['estado'];
			$result = $this->master->procedureOFUser('inactivar',array($action,$data));
			// die(json_encode($result));
			if ($result==true) {
				if ($action==1) {
					$mesage = 'Activado';
				}else{
					$mesage = 'Desactivado';
				}
				echo json_encode("$mesage correctamente");
			}else {
				echo json_encode($this->doizer->knowError($result));
			}
		}
	}
?>

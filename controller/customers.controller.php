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
	 		$this->insertException=array('');
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
		function viewDetailEmp(){
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
					require_once "views/modules/admin/customers/detail-emp.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function viewEmpData(){
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
					require_once "views/modules/admin/customers/dataEmp.php";
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
			// $response_re = $_POST['get_captcha'];
			// if (isset($response_re) && $response_re) {
				// $secret_key = '6Ld_bDkUAAAAAPiAHYM_GX7QxbzLi_WFku7-9_tX';
				// $ip_user = $_SERVER['REMOTE_ADDR'];
				// $validation = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_re&remoteip=$ip_user");
				// $result = json_decode($validation);
				// if($result->success==true){
					$i = 0;
					foreach ($data as $input) {
						if ($data[$i]=='') {
							echo json_encode('Campos vacios');
							return ;
						}
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
							$profile = 'default.jpg';
						}
					//registrar roles menos cliente empresarial
					if ($data[0]!=3) {
						//validar numero de documento
						if(	$this->doizer->onlyNumbers($data[2])==true){
							// validar contraseñas
							if ($this->doizer->validateEmail($data[5])==true) {
								if ($this->doizer->validateDate($data[8],'past')==true) {
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
											   $result = $this->master->procedure14('crearUsuario',array($data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[0],2,$profile,$date,$date));
											   if ($result==1) {
											   	$result  = $this->master->procedure("consultaExisteUsuario",$data[2]);
												   $data_acceso[]=md5($data[2].$data[5]);
												   $data_acceso[]=$result['usu_codigo'];
												   $data_acceso[]=$password[1];
													 $code=$result['usu_codigo'];
												   $result = $this->master->procedureAcceso($data_acceso);
												   $token  = $this->master->procedure("consultaLogin",$data[2]);
												   $token =  rtrim(strtr(base64_encode($token['token']), '+/', '-_'), '=');
													$título = 'Maxirecargas-Activa tu cuenta';
													$mensaje = '
													<html>
													<head>
													  <title>Maxirecargas-Activa tu cuenta</title>
													</head>
													<body>
													  <p>Bienvenido a Maxirecargas, para poder disfrutar de tus beneficios es neceseario que actives tu cuenta, por favor visita en siguiente enlace</p>
													  <a href="http://localhost/maxirecargas/activar-cuenta-'.$token.'">Activar tu MaxiCuenta</a>

													</body>
													</html>
													';

													$cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
													if(mail($data[5], $título, $mensaje, $cabeceras)){
													    $result = true;
															$this->master->insert('estiloxusuario',array($code,' ', ' ', ' '));
													}else{
													    $result = "error al enviar correo";
													}

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

			// 	}else{
			// 		echo json_encode('por favor realiza correctamente el recaptcha');
			// 	}
			// }else{
			// 	echo json_encode('por favor realiza correctamente el recaptcha');
			// }

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
		function readByEmail(){
			$data=$_POST['data'];
			$result = $this->master->selectBy('usuario',array('usu_correo',$data));
			if ($result != array()) {
				echo  json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
		function update(){
			$data=$_POST['data'];
			//foto de perfil
			$fecha = $this->doizer->validateDate($data[7],"past");
			if (!$fecha==true) {
				echo json_encode("fecha no valida");
				return ;
			}
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
				if ($data[$i]=='') {
					echo json_encode('Campos vacios');
					return ;
				}
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
			$result = $this->master->procedureUpdate(array($_SESSION['user_update'],$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11]));
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
		function viewActivateAccount(){
			$token = $_GET['token'];
			require_once "views/modules/customer/activateAccount.php";
		}
		function activateAccount(){
			$token = base64_decode($_GET['token']);
			$resultData = $this->master->procedureConsultaToken($token);
			$result = $this->master->procedureOFUser('inactivar',array(1,$resultData['usu_codigo']));
			if ($result==1) {
				$result= $this->master->selectBy("usuario",array("usu_codigo",$resultData['usu_codigo']));
				// print_r($result);
				$_SESSION['CUSTOMER']['ROL'] = $result['tip_usu_codigo'];
				$_SESSION['CUSTOMER']['ID']=$result['usu_codigo'];
				$_SESSION['CUSTOMER']['NAME']=$result['usu_primer_nombre'];
				$_SESSION['CUSTOMER']['LAST_NAME']=$result['usu_primer_apellido'];
				$_SESSION['CUSTOMER']['DOCUMENT']=$result['usu_num_documento'];
				$_SESSION['CUSTOMER']['MAIL']=$result['usu_correo'];
				$_SESSION['CUSTOMER']['PHOTO']=$result['usu_foto'];
				$_SESSION['CUSTOMER']['ADDRESS']=$result['usu_direccion'];
				$_SESSION['CUSTOMER']['PERMITS'] = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$_SESSION['CUSTOMER']['STYLE'] = $this->master->selectBy('estiloxusuario',array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
				$fecha = date('Y-m-d');
				// $this->master->updateMin('usuario',array('usu_ult_inicio_sesion'),array('usu_codigo',$result['usu_codigo']),$fecha);
				if ($_SESSION['CUSTOMER']['ROL']==3 OR $_SESSION['CUSTOMER']['ROL']==1 ) {
					$_SESSION['CUSTOMER']['CLIENT'] = true;
					header("Location:maxirecargas");
				}else{
					header("Location:dashboard");
				}
			}else{
				echo "Ocurrio un error";
			}
		}

		function chageStyle(){
			$data = $_POST['data'];
			$result = $this->master->update('estiloxusuario',array('usu_codigo',$_SESSION['CUSTOMER']['ID']),$data,array('usu_codigo'));
			if ($result==true) {
				$_SESSION['CUSTOMER']['STYLE'] = $this->master->selectBy('estiloxusuario',array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
			}else{
				$result = $this->doizer->knowError($result);
			}
			echo json_encode($result);
		}
		function updateAllProfile(){
			$result = $this->master->selectBy("usuario",array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
			$data  = $_POST['data'];
			$fecha = $this->doizer->validateDate($data[9],"past");
			if (!$fecha==true) {
				echo json_encode("fecha no valida");
				return ;
			}
			//imagen
			if (isset($_SESSION['new_cropp_image'])) {
				$data[] = $_SESSION['new_cropp_image'];
				unset($_SESSION['new_cropp_image']);
				if ($result['usu_foto']!="default.jpg") {
					unlink("views/assets/image/profile/".$result['usu_foto']);
				}
			}else{
				$data[] = $result['usu_foto'];
			}
			$result = $this->master->update("usuario",array("usu_codigo",$_SESSION['CUSTOMER']['ID']),$data,array('usu_codigo','id_tipo_documento','usu_num_documento','tip_usu_codigo','id_estado','usu_fechas_registro','usu_ult_inicio_sesion'));
			if ($result==true) {
				$_SESSION['CUSTOMER']['NAME']= $data[0];
				$_SESSION['CUSTOMER']['LAST_NAME']= $data[1];
				echo json_encode($result);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function updatePass(){
			$pas = $_POST['pas'];
			$new = $_POST['new_pas'];
			$new2 = $_POST['new_pas2'];
			$result  = $this->master->selectBy("acceso",array("usu_codigo",$_SESSION['CUSTOMER']['ID']));
			if (password_verify($pas , $result['acc_contra'])) {
				$password =  $this->doizer->validateSecurityPassword($new);
				if (is_array($password)) {
						if ($new==$new2) {
							$result = $this->master->cambiarContrasena(array($_SESSION['CUSTOMER']['ID'],$password[1]));
							echo json_encode($result);
						}else{
							echo json_encode("Las contraseñas no coinciden");
						}
				}else{
					echo json_encode($password);
					return;
				}
			}else{
				echo json_encode("La contraseña actual  es incorrecta");
			}
		}
		function recoverPass(){
			$doc = $_POST['documento'];
			$result = $this->master->selectBy("usuario",array("usu_num_documento",$doc));
			if ($result!=array()) {
				$token = rand(1000,9999)."-".rand(1000,9999);
				$resultInser=$this->master->crearTokenRecuperacion(array($result['usu_codigo'],$token));
				if ($resultInser==true) {
					$mensaje = '
	 			 <html>
	 			 <head>
	 			 <title>Maxirecargas </title>
	 			 </head>
	 			 <body>
	 			 <p>Tu codigo de recuperación es: '.$token.'
	 			 </p>
	 			 </body>
	 			 </html>
	 			 ';

	 			 $cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 			 if(mail($result['usu_correo'], "Recuperar contraseña", $mensaje, $cabeceras)){
	 				 $result = true;
					 echo json_encode($result);
	 			 }else{
					 echo json_encode("No es posible enviar el codigo de recuperación");
	 			 }
				}else{
					echo json_encode($this->doizer->knowError($result));
				}
			}else{
				echo json_encode("Este documento no esta registrado en el sistema.");
			}
		}
		function compareToken(){
			$cod = $_POST['token'];
			$password=$_POST["contra"];
			$password2=$_POST["contra2"];
			$doc=$_POST['documento'];
			$user = $this->master->selectBy("usuario",array("usu_num_documento",$doc));
			$codeReal = $this->master->selectBy("acceso",array("usu_codigo",$user['usu_codigo']))['codigo_recuperacion'];
			if ($cod==$codeReal) {
				$pas =  $this->doizer->validateSecurityPassword($password);
				if (is_array($pas)) {
					if ($password==$password2) {
						$res = $this->master->cambiarContrasena(array($user['usu_codigo'],$pas[1]));
						$_SESSION['CUSTOMER']['ROL'] = $user['tip_usu_codigo'];
						$_SESSION['CUSTOMER']['ID']=$user['usu_codigo'];
						$_SESSION['CUSTOMER']['NAME']=$user['usu_primer_nombre'];
						$_SESSION['CUSTOMER']['LAST_NAME']=$user['usu_primer_apellido'];
						$_SESSION['CUSTOMER']['DOCUMENT']=$user['usu_num_documento'];
						$_SESSION['CUSTOMER']['MAIL']=$user['usu_correo'];
						$_SESSION['CUSTOMER']['PHOTO']=$user['usu_foto'];
						$_SESSION['CUSTOMER']['ADDRESS']=$user['usu_direccion'];
						$_SESSION['CUSTOMER']['PERMITS'] = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
						$_SESSION['CUSTOMER']['STYLE'] = $this->master->selectBy('estiloxusuario',array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
						$fecha = date('Y-m-d');
						// $this->master->updateMin('usuario',array('usu_ult_inicio_sesion'),array('usu_codigo',$user['usu_codigo']),$fecha);
						if ($_SESSION['CUSTOMER']['ROL']==3 OR $_SESSION['CUSTOMER']['ROL']==1 ) {
							$_SESSION['CUSTOMER']['CLIENT'] = true;
							echo json_encode("cliente");
						}else{
							echo json_encode("admin");
						}
					}
				}else{
					echo json_encode($password);
					return;
				}
			}else{
				echo json_encode("Codigo incorrecto");
			}
		}
	}
?>

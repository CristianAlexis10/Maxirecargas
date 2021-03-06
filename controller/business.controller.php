<?php
	require_once "controller/doizer.controller.php";
	class BusinessController{
		private $master;
		private $doizer;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 		$this->tableName="empresa";
	 		$this->insertException=array('');
	 		$this->updateException = array('');
	 	}
		function main(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/business/index.php";
			require_once "views/include/scope.footer.php";
		}
		function profile(){
		if (isset($_SESSION['CUSTOMER']['ROL']) && !isset($_SESSION['CUSTOMER']['CLIENT'])) {
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/profile/business/index.php";
			require_once "views/include/scope.footer.php";
		}else{
			header("Location:maxirecargas");
		}
		}
		function readByNit(){
			$data=$_POST['data'];
			$result = $this->master->procedure('consultaExisteEmpresarial',$data);
			if ($result != array()) {
				echo  json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
		function newBusiness(){
			$data = $_POST['data'];
			//validar el capcha
			// $response_re = $_POST['get_captcha'];
			// if (isset($response_re) && $response_re) {
				// $secret_key = '6Ld_bDkUAAAAAPiAHYM_GX7QxbzLi_WFku7-9_tX';
				// $ip_user = $_SERVER['REMOTE_ADDR'];
				// $validation = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_re&remoteip=$ip_user");
				// $result = json_decode($validation);
				// if($result->success==true){
					//imagen
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
				//validar caracteres especiales y correo
					foreach ($data as $input) {
						if ($data[$i]=='') {
							echo json_encode('Campos vacios');
							return ;
						}
						if ($i==13) {
							if ($this->doizer->validateEmail($data[13])!=true) {
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
					// validar contraseñas
					$password =  $this->doizer->validateSecurityPassword($data[15]);
					if (is_array($password)) {
						$validate_password=true;
					}else{
						$validate_password=false;
						echo json_encode($password);
						return;
					}
					$date = date('Y-m-d');
					// insertar usuario
					$result = $this->master->procedure14('crearUsuario',array($data[7],$data[8],$data[9],$data[10],$data[13],$data[12],$data[11],$data[5],'null',3,2,$profile,$date,$date));
					if ($result==true) {
						//crear acceso
						$result  = $this->master->procedure("consultaExisteUsuario",$data[8]);
						$usu_code = $result['usu_codigo'];
						$data_acceso[]=md5($data[2].$data[5].date('Y-M-D'));
						 $data_acceso[]=$result['usu_codigo'];
						 $data_acceso[]=$password[1];
						 $result = $this->master->procedureAcceso($data_acceso);
						 $token  = $this->master->procedure("consultaLogin",$data[8]);
						 $token =  rtrim(strtr(base64_encode($token['token']), '+/', '-_'), '=');
						 if ($result==true) {
							$result = $this->master->crearEmpresa(array($data[3],$data[1],$data[2]));
							if ($result==true) {
								$result = $this->master->selectBy("empresa",array("emp_nit",$data[1]));
								$result = $this->master->crearSede(array($result[0],$data[4],$data[5],$data[6]));
								if ($result==true) {
									$result = $this->master->consultaSede($data[4]);
									$result = $this->master->clienteEmpresarial(array($usu_code,$result['sed_codigo'],$data[14]));
									if ($result == true) {
										$this->master->insert('estiloxusuario',array($usu_code,' ', ' ', ' '));
										$título = 'Maxirecargas-Activa tu cuenta Empresarial';
			 						  $mensaje = '
			 						  <html>
			 						  <head>
			 							<title>Maxirecargas-Activa tu cuenta </title>
			 						  </head>
			 						  <body>
			 							<p>Bienvenido a Maxirecargas, para poder disfrutar de tus beneficios es neceseario que actives tu cuenta, por favor visita en siguiente enlace</p>
			 							<a href="http://localhost/maxirecargas/activar-cuenta-'.$token.'">Activar tu MaxiCuenta</a>

			 						  </body>
			 						  </html>
			 						  ';

			 						  $cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 						  if(mail($data[13], $título, $mensaje, $cabeceras)){
											$result = true;
			 						  }else{
			 							  $result = "error al enviar correo";
			 						  }
										echo json_encode($result);
									}else{
										$result = $this->doizer->knowError($result);
										echo json_encode($result);
									}
								}else{
									$result = $this->doizer->knowError($result);
									echo json_encode($result);
								}
							}else{
								$result = $this->doizer->knowError($result);
								echo json_encode($result);
							}
						 }else{
						 	$result = $this->doizer->knowError($result);
							echo json_encode($result);
						 }

					}else{
						$result = $this->doizer->knowError($result);
						echo json_encode($result);
					}

			// 	}else{
			// 		echo json_encode('por favor realiza correctamente el recaptcha');
			// 	}
			// }else{
			// 	echo json_encode('por favor realiza correctamente el recaptcha');
			// }
		}
		function delete(){
			$data = $_POST['data'];
			$result = $this->master->EliminarUsuarioyClienteEmpresarial($data);
			// die(json_encode($result));
			if ($result=='true') {
				echo json_encode('Eliminado exitosamente');
			}else{
				echo json_encode($this->doizer->knowError($result));
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
					require_once "views/modules/admin/customers-business/update.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function update(){
			$data = $_POST['data'];
			$i = 0;
			foreach ($data as $input) {
				if ($data[$i]=='') {
					echo json_encode('Campos vacios');
					return ;
				}
				if ($i==13) {
				}else{
					$result = $this->doizer->specialCharater($data[$i]);
					if ($result==false) {
						echo json_encode('los campos no deben tener caracteres especiales');
						return;
					}
				}
				$i++;
			}

			$result = $this->master->modificarEmpresa(array($_SESSION['emp_code'],$data[0],$data[1],$data[2]));
			$result = $this->master->modificarSede(array($_SESSION['sed_code'],$data[3],$data[4],$data[5]));
			$result = $this->master->modificarClienteEmpresarial(array($data[6],$_SESSION['cli_code']));
			if ($result==true) {
				echo json_encode(true);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}

		}
}
?>

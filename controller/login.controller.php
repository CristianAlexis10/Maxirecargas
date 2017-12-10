<?php
	require_once "controller/doizer.controller.php";
	class LoginController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function viewSingIn(){
			require_once "views/modules/index.php";
		}
		function viewSingOut(){
			session_destroy();
			require_once "views/modules/landing.html";
		}
		function validateUser(){
			$data = $_POST['data'];
			if ($data[0]!='' && $data[1] != '') {
				if ($this->doizer->onlyNumbers($data[0])==true) {
					$result  = $this->master->procedure("consultaLogin",$data[0]);
						if ($result != array()) {
							// die(print_r($result));
							if (password_verify($data[1] , $result['acc_contra'])) {
								if ($result['id_estado']==1) {
								$_SESSION['CUSTOMER']['ROL'] = $result['tip_usu_codigo'];
								$_SESSION['CUSTOMER']['ID']=$result['usu_codigo'];
								$_SESSION['CUSTOMER']['NAME']=$result['usu_primer_nombre'];
								$_SESSION['CUSTOMER']['LAST_NAME']=$result['usu_primer_apellido'];
								$_SESSION['CUSTOMER']['DOCUMENT']=$result['usu_num_documento'];
								$_SESSION['CUSTOMER']['MAIL']=$result['usu_correo'];
								$_SESSION['CUSTOMER']['PHOTO']=$result['usu_foto'];
								$_SESSION['CUSTOMER']['PERMITS'] = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
								$_SESSION['CUSTOMER']['STYLE'] = $this->master->selectBy('estiloxusuario',array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
								$fecha = date('Y-m-d');
								// $this->master->updateMin('usuario',array('usu_ult_inicio_sesion'),array('usu_codigo',$result['usu_codigo']),$fecha);
								if ($_SESSION['CUSTOMER']['ROL']==3) {
									$_SESSION['CUSTOMER']['CLIENT'] = true;
									echo json_encode('customer');
								}else{
									echo json_encode(true);
								}
							}else{
								echo json_encode('Usuario Inactivo');
								}
						}else{
							echo json_encode('Numero de Documento Incorrecto');
						}
					}else{
						echo json_encode('contraseña incorrecta');
					}
				}else{
					echo json_encode('caracteres invalidos en el numero de documento');
				}
			}else{
			        echo json_encode('Campos Vacios');
			}
		}
	}
?>

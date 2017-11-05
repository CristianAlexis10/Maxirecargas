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
					if ($this->doizer->onlyNumbers($data[0])) {
						$result  = $this->master->selectCount('usuario','usu_num_documento',$data[0]);
						if ($result[0]!=1) {
							echo json_encode('Numero de Documento Incorrecto');
						}else{
							$result  = $this->master->selectBy('usuario',array('usu_num_documento',$data[0]));
							$_SESSION['CUSTOMER']['ROL'] = $result['tip_usu_codigo'];
							$_SESSION['CUSTOMER']['ID']=$result['usu_codigo'];
							$_SESSION['CUSTOMER']['NAME']=$result['usu_primer_nombre'];
							$_SESSION['CUSTOMER']['LAST_NAME']=$result['usu_primer_apellido'];
							$_SESSION['CUSTOMER']['DOCUMENT']=$result['usu_num_documento'];
							$_SESSION['CUSTOMER']['PERMITS'] = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
							$pass  = $this->master->selectBy('acceso',array('usu_codigo',$result['usu_codigo']));
							if (password_verify($data[1] , $pass['acc_contra'])) {
								$fecha = date('Y-m-d');
								// $this->master->updateMin('usuario',array('usu_ult_inicio_sesion'),array('usu_codigo',$result['usu_codigo']),$fecha);
									if ($_SESSION['CUSTOMER']['ROL']==3) {
										echo json_encode('customer');
									}else{
										echo json_encode(true);
									}
							}else{
								echo json_encode('contraseña incorrecta');
							}
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

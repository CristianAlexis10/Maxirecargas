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
			require_once "views/modules/index.php";
		}
		function validateUser(){
			$data = $_POST['data'];
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
				$pass  = $this->master->selectBy('acceso',array('usu_codigo',$result['usu_codigo']));
					if (password_verify($data[1] , $pass['acc_contra'])) {
						echo json_encode(true);
					}else{
						echo json_encode('contraseña incorrecta');
					}
			}
		}
	}
?>

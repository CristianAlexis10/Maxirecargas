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
		function viewSingInPass(){
			require_once "views/modules/index-pass.php";
		}
		function viewSingOut(){
			require_once "views/modules/index.php";
			unset($_SESSION['CUSTOMER']);
		}
		function validateUser(){
			$data = $_POST['data'];
			$result  = $this->master->selectCount('usuario','usu_num_documento',$data);
			if ($result[0]==1) {
				$_SESSION['CUSTOMER'] = $_POST['data'];
				$jsondata['response'] = true;
			}else{
				$jsondata['response'] = false;
			}
			echo json_encode($jsondata);
		}
		function validateUserPass(){
			$data = $_POST['data'];
			$result  = $this->master->selectBy('usuario',array('usu_num_documento',$_SESSION['CUSTOMER']));
			$_SESSION['ROL'] = $result['tip_usu_codigo'];
			$pass  = $this->master->selectBy('acceso',array('usu_codigo',$result['usu_codigo']));
			if (password_verify($data , $pass['acc_contra'])) {
			    $_SESSION['CUSTOMER']=$pass['usu_codigo'];
			    header("Location: dashboard");
			} else {
			    unset($_SESSION['ROL']);
		     	    $_SESSION['MESSAGE_ERROR']='La contraseña no es válida.';
			    header("Location: iniciar--sesion");
			}
		}
	}
?>

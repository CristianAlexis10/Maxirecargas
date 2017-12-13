<?php
require_once "controller/doizer.controller.php";
	class QuotationController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function main(){
			if (isset($_SESSION['CUSTOMER']['CLIENT'])) {
				// require_once "views/include/user/scope.header.php";
				require_once "views/modules/customer/quotation/index.php";
				// require_once "views/include/user/scope.footer.php";
			}elseif (isset($_SESSION['CUSTOMER']['ROL']) ) {
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/quotation/index.php";
				require_once "views/include/scope.footer.php";
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/quotation/index.php";
				require_once "views/include/user/scope.footer.php";
			}
		}

		function saveSession(){
			if ($_POST['data']=='borrar') {
					$_SESSION['save_quotation'] = ' ';
			}else{
				if (isset($_SESSION['save_quotation'])) {
					$data= $_POST['data'];
					$_SESSION['save_quotation'] .= $data;
				}else{
					$_SESSION['save_quotation'] = '';
				}
			}
			echo json_encode($_SESSION['save_quotation']);
		}
		function newQuotationUser(){
			$data= $_POST['data'];
			if ($data[0] != '' && $data[1] != '' && $data[2]!='' && $data[3]!='' ) {
				if ($this->doizer->validateEmail($data[1])==true) {
							$i = 0;
							foreach ($data as $input) {
								if ($i==1) {
								}else{
									$result = $this->doizer->specialCharater($data[$i]);
									if ($result==false) {
										echo json_encode('los campos no deben tener caracteres especiales');
										return;
									}
								}
								$i++;
							}

							$mensaje = '
						  <html>
						  <head>
							<title>Maxirecargas- Nueva Cotozación </title>
						  </head>
						  <body>
							<p><b>'.$data[0].'</b> ha solicitado una cotización con los siguientes datos : </p>
							<p>'.$_SESSION['save_quotation'].'</p>
							<p><b>Observaciones: </b>'.$data[4].'</p>
							<h1>Datos de contacto</h1>
							<p><b>Nombre:</b>'.$data[0].'</p>
							<p><b>Correo:</b>'.$data[1].'</p>
							<p><b>Telefono:</b>'.$data[2].'</p>
							<p><b>Dirección:</b>'.$data[3].'</p>
							<p><b></b></p>
						  </body>
						  </html>
						  ';

						  $cabeceras= 'Content-type: text/html; charset=utf-8' . "\r\n";
							$destinatarios= $data[1]."";

						  if(mail('yonosoybond@gmail.com' ,"Maxirecargas-Nueva cotizacion", $mensaje, $cabeceras)){
							  $result = true;
						  }else{
							  $result = false;
						  }

						echo json_encode($result);

				}
			}else{
				echo json_encode('Camps vacios');
			}

		}
	}
?>

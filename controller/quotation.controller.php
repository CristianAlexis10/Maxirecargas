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
				require_once "views/include/customer/scope.header.php";
				require_once "views/modules/customer/quotation/index.php";
			}elseif (isset($_SESSION['CUSTOMER']['ROL']) ) {
				if (isset($_SESSION['CUSTOMER']['ROL'])) {
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='cotizacion') {
						$access = true;
					}
				}
				if (isset($access)) {
					//saber persimos crud de este modulo
					$modulo = 'cotizacion';
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$crud = permisos($modulo,$permit);
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/quotation/index.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}
			}else{
				require_once "views/include/user/scope.header.php";
				require_once "views/modules/user/quotation/index.php";
				// require_once "views/include/user/scope.footer.php";
			}
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
							<title>Maxirecargas- Nueva Cotización </title>
						  </head>
						  <body>
							<p><b>'.$data[0].'</b> ha solicitado una cotización con los siguientes datos : </p>
							<p>'.$_POST['all'].'</p>
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
		//cotizacion cliente
		function newQuotationCustomer(){
			$order = $_POST['data'];
			$ciudad = $_POST['ciudad'];
			$dir = $_POST['dir'];
			$token = $this->randAlphanum(5)."-".$this->randAlphanum(5);
			//registrar en cotizacion
			if ($dir=="default") {
				$result = $this->master->selectBy("usuario",array('usu_codigo',$_SESSION['CUSTOMER']['ID']));
				$result = $this->master->insert('cotizacion',array($_SESSION['CUSTOMER']['ID'],$result['id_ciudad'],$result['usu_direccion'],$token,"En Recepcion",date('Y-m-d')),array('cot_codigo','cot_observacion'));
			}else{
				$result = $this->master->insert('cotizacion',array($_SESSION['CUSTOMER']['ID'],$ciudad,$dir,$token,"En Recepcion",date('Y-m-d')),array('cot_codigo','cot_observacion'));
			}
			// //guardar en prodxcot
			if ($result==true) {
				$data_order = $this->master->selectBy('cotizacion',array('cot_token',$token));
				foreach ($order as $row) {
					$data_pro = $this->master->selectBy('producto',array('pro_referencia',$row['producto']));
					$this->master->insert('prodxcot',array($data_order['cot_codigo'],$data_pro['pro_codigo'],$row['cantidad'],$row['servicio'],$row['obs'],0));
				}
			}
			if ($result==true) {
					$_SESSION['user_quotation_new']=$token;
					echo json_encode(true);
			}else{
				echo json_encode('Se ha generado un error: '.$this->doizer->knowError($result));
			}
		}
		function viewQuotation(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
			//saber si puede acceder a este modulo
			foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
				if ($row['enlace']=='cotizacion') {
					$access = true;
				}
			}
			if (isset($access)) {
				//saber persimos crud de este modulo
				$modulo = 'cotizacion';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				$data_quo = $this->master->verCotizacion(base64_decode($_GET['data']));
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/quotation/detail.php";
				require_once "views/include/scope.footer.php";
			}else{
				session_destroy();
				require_once "views/modules/landing.html";
			}
		}else{
			require_once "views/modules/landing.html";
		}
		}
		function viewQuotationBy(){
			if (isset($_SESSION['CUSTOMER']['ID'])) {
				$data_quo = $this->master->verCotizacion(base64_decode($_GET['data']));
				require_once "views/include/customer/scope.header.php";
				require_once "views/modules/customer/quotation/detail.php";
			}else{
				header("Location: maxirecargas");
			}
		}
		function response(){
			$quotation = $_POST['quotation'];
			//validar cantidades
			$i = 0;
			foreach ($quotation as $item) {
				if ($item['valor']<=0) {
					echo json_encode("El producto N° ".($i+1)." no tiene un valor válido");
					return ;
				}
				$i++;
			}
			//insertar
			$result = $this->master->contestarCotizacion($_SESSION['cod_detail_id'],$_POST['obs'],'Terminado');
			if ($result==1) {
				foreach ($quotation as $item) {
					$dataPro=$this->master->selectBy("producto",array("pro_referencia",$item['referencia']));
					$result = $this->master->ModificarCotxPro(array($dataPro['pro_codigo'],$item['cantidad'],$item['servicio'],$_SESSION['cod_detail_id'],$item['valor']));
				}
				echo json_encode($result);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
			// $response = $_POST['res'];
			// $mail = $_POST['email'];
			// $result = $this->master->contestarCotizacion($_SESSION['cod_detail_id'],$response,'Terminado');
			// if ($result==true) {
			// 	if ($mail=='true') {
			// 		$email = $this->master->selectBy('usuario',array('usu_codigo',$_SESSION['usu_cot']));
			// 		$mensaje = '
			// 		<html>
			// 		<head>
			// 		<title>Maxirecargas- Repuesta a tu Cotización </title>
			// 		</head>
			// 		<body>
			// 		<p><b>'.$response.'</b></p>
			// 		</body>
			// 		</html>
			// 		';
			// 		$cabeceras= 'Content-type: text/html; charset=utf-8' . "\r\n";
			// 		if(mail($email['usu_correo'] ,"Maxirecargas-Respuesta a tu cotización", $mensaje, $cabeceras)){
			// 			echo json_encode('Exitoso.');
			// 		}else{
			// 			echo json_encode('se ha generado un error al enviar el correo.');
			// 		}
			// 	}else{
			// 		echo json_encode("Exitoso");
			// 	}
			// }else{
			// 	echo json_encode($this->doizer->knowError($result));
			// }
		}
		function randAlphanum($length){
		  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		  $charactersLength = strlen($characters);
		  $randomAlpha = '';
		  for ($i = 0; $i < $length; $i++) {
		       $randomAlpha .= $characters[rand(0, $charactersLength - 1)];
		  }
		  return $randomAlpha;
		}
		function delete(){
			$result = $this->master->delete('cotizacion',array('cot_codigo',$_POST['data']));
			if ($result==true) {
				 echo json_encode('Cotización Eliminada');
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
	}
?>

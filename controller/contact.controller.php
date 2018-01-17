<?php

require_once "controller/doizer.controller.php";
	class ContactController{
	  	private $master;
	  	private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
	 function sendMail(){
			$data = $_POST['values'];
			$título = "Maxirecargas ".$data[0];
			 $mensaje = '
			 <html>
			 <head>
			 <title>Maxirecargas </title>
			 </head>
			 <body>
			 <p>'.$data[1].'
			 </p>
			 </body>
			 </html>
			 ';

			 $cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 if(mail($_SESSION['sendMail_to'], $título, $mensaje, $cabeceras)){
				 $result = true;
			 }else{
				 $result = false;
			 }
			 echo json_encode($result);
	 }

	 function landing(){
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $título = $_POST['asunto'];
			$mensaje = '
			<html>
			<head>
			<title>Maxirecargas </title>
			</head>
			<body>
			<p>'.$_POST['message'].'</p>
			<p>Nombre:'.$name.'</p>
			<p>Correo:'.$email.'</p>
			</body>
			</html>
			';
			$cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			if(mail('yonosoybond@gmail.com', $título, $mensaje, $cabeceras)){
				$result = "Envio Exitoso";
			}else{
				$result = 'Ocurrio un error';
			}
			echo json_encode($result);
	 }
	 function knowData(){
		 $result = $this->master->selectAll('gestion_web');
		 echo json_encode($result);
	 }
	}
?>

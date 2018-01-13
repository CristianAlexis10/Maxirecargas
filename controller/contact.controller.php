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
	}
?>

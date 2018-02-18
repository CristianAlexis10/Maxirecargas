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
		 $mensaje = '<!DOCTYPE html>
		 <html>
		   <head>
		     <meta charset="utf-8">
		     <title>contactanos</title>

		   </head>
		   <body style="margin: 0; padding: 0">
		     <div class="container" style="background: #ddd;width: 100%;height: 100vh;">
		       <div class="content" style="width: 80%;position: absolute;top: 0; left: 0; right: 0; bottom: 0;margin: auto;background: white;box-shadow: 0 0 60px 10px rgba(0, 0, 0, 0.2);text-align: center;font-family: lato, sans-serif;">
		         <img src="https://maxirecargas.com.co/views/assets/image/logo.png">
		         <h1 style="font-size: 40px;color: #35a4dd;text-transform: uppercase;">¡urgente!</h1>
		         <p style="font-size: 22px;letter-spacing: 5px;color:#717171;">Un usuario desea ponerse en contacto con nosotros.</p>
		         <ul style="list-style: none;text-align: left;padding: 15px 120px;text-transform: capitalize;color: #717171;">
		           <li>nombre:'.$name.'</li>
		           <li>correo:'.$email.'</li>
		           <li>mensaje:'.$_POST['message'].'</li>
		         </ul>

		       </div>
		     </div>
		   </body>
		 </html>';
			// $mensaje = '
			// <html>
			// <head>
			// <title>Maxirecargas </title>
			// </head>
			// <body>
			// <p>'.$_POST['message'].'</p>
			// <p>Nombre:'.$name.'</p>
			// <p>Correo:'.$email.'</p>
			// </body>
			// </html>
			// ';
			$cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			if(mail('yonosoybond@gmail.com', $título, $mensaje, $cabeceras)){
				$result = "Envio Exitoso";
			}else{
				$result = 'Ocurrio un error';
			}
			echo json_encode($result);
	 }
	 function knowData(){
		 $result = $this->master->selectAll("gestion_web");
		 $result[0]['gw_vision']=utf8_encode($result[0]['gw_vision']);
		 $result[0]['gw_micro_des']=utf8_encode($result[0]['gw_micro_des']);
		 $result[0]['gw_mision']=utf8_encode($result[0]['gw_mision']);
		 $result[0]['gw_politicas']=utf8_encode($result[0]['gw_politicas']);
		 $data=array(array("desc"=>$result[0]['gw_micro_des'],"mision"=>$result[0]['gw_mision'],"vision"=>$result[0]['gw_vision'],"politicas"=>$result[0]['gw_politicas'],"gw_ct_telefono"=>$result[0]['gw_ct_telefono'],"gw_ct_telefono_2"=>$result[0]['gw_ct_telefono_2'],"gw_ct_whatsapp"=>$result[0]['gw_ct_whatsapp'],"gw_ct_correo"=>$result[0]['gw_ct_correo'],"gw_ct_direccion"=>$result[0]['gw_ct_direccion']));
			echo json_encode($data);
	 }
	}
?>

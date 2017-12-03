<?php

require_once "controller/doizer.controller.php";
	class RoleController{
	  	private $master;
	  	private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
	 	function newRegister(){
	 		$data = $_POST['data'];
	 		$rol_name = $data["rol_name"];
	 		$rol_maxi = $data["rol_maxi"];
	 		$result = $this->master->insert("tipo_usuario",array($rol_name,$rol_maxi),array('tip_usu_codigo'));
	 		if ($result==1) {
	 			$rol=$this->master->selectBy("tipo_usuario",array("tip_usu_rol",$rol_name));
	 			//modulo usuario
		 		if (isset($data['mod_user'])) {
		 			$result = $this->master->insert("permiso",array(1,$rol['tip_usu_codigo'],$data['mod_user']['crear'],$data['mod_user']['modificar'],$data['mod_user']['eliminar'],$data['mod_user']['ver']),array('id_permiso'));
		 		}
		 		//modulo productos
		 		if (isset($data['mod_products'])) {
		 			$result = $this->master->insert("permiso",array(1,$rol['tip_usu_codigo'],$data['mod_products']['crear'],$data['mod_products']['modificar'],$data['mod_products']['eliminar'],$data['mod_products']['ver']),array('id_permiso'));
		 		}
		 		//modulo pedidos
		 		if (isset($data['mod_orders'])) {
		 			$result = $this->master->insert("permiso",array(1,$rol['tip_usu_codigo'],$data['mod_orders']['crear'],$data['mod_orders']['modificar'],$data['mod_orders']['eliminar'],$data['mod_orders']['ver']),array('id_permiso'));
		 		}
		 		//modulo cotizaciones
		 		if (isset($data['mod_quoation'])) {
		 			$result = $this->master->insert("permiso",array(1,$rol['tip_usu_codigo'],$data['mod_quoation']['crear'],$data['mod_quoation']['modificar'],$data['mod_quoation']['eliminar'],$data['mod_quoation']['ver']),array('id_permiso'));
		 		}
		 		//modulo rutas
		 		if (isset($data['mod_routes'])) {
		 			$result = $this->master->insert("permiso",array(1,$rol['tip_usu_codigo'],$data['mod_routes']['crear'],$data['mod_routes']['modificar'],$data['mod_routes']['eliminar'],$data['mod_routes']['ver']),array('id_permiso'));
		 		}
		 		if ($result==1) {
		 			echo json_encode(true);
		 		}else{
		 			echo json_encode($this->doizer->knowError($result));
		 		}
	 		}else{
	 			echo json_encode($this->doizer->knowError($result));	
	 		}
	 		return ;
	 		
	 		
		}

	}
?>
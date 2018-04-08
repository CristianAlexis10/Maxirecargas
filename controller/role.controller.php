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
		 			$result = $this->master->insert("permiso",array(2,$rol['tip_usu_codigo'],$data['mod_products']['crear'],$data['mod_products']['modificar'],$data['mod_products']['eliminar'],$data['mod_products']['ver']),array('id_permiso'));
		 		}
		 		//modulo pedidos
		 		if (isset($data['mod_orders'])) {
		 			$result = $this->master->insert("permiso",array(3,$rol['tip_usu_codigo'],$data['mod_orders']['crear'],$data['mod_orders']['modificar'],$data['mod_orders']['eliminar'],$data['mod_orders']['ver']),array('id_permiso'));
		 		}
		 		//modulo cotizaciones
		 		if (isset($data['mod_quoation'])) {
		 			$result = $this->master->insert("permiso",array(4,$rol['tip_usu_codigo'],$data['mod_quoation']['crear'],$data['mod_quoation']['modificar'],$data['mod_quoation']['eliminar'],$data['mod_quoation']['ver']),array('id_permiso'));
		 		}
		 		//modulo rutas
		 		if (isset($data['mod_routes'])) {
		 			$result = $this->master->insert("permiso",array(5,$rol['tip_usu_codigo'],$data['mod_routes']['crear'],$data['mod_routes']['modificar'],$data['mod_routes']['eliminar'],$data['mod_routes']['ver']),array('id_permiso'));
		 		}
		 		if (isset($data['mod_assis'])) {
		 			$result = $this->master->insert("permiso",array(6,$rol['tip_usu_codigo'],$data['mod_assis']['crear'],$data['mod_assis']['modificar'],$data['mod_assis']['eliminar'],$data['mod_assis']['ver']),array('id_permiso'));
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

		function allRoles(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/role/index.php";
			require_once "views/include/scope.footer.php";
		}
		function viewUpdate(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/role/update.php";
			require_once "views/include/scope.footer.php";
		}

		function update(){
	 		$data = $_POST['data'];
	 		$rol_name = $data["rol_name"];
	 		$rol_maxi = $data["rol_maxi"];
			//nombre
			$name =$this->master->modificarNombreRol(array($_SESSION['update_rol'],$rol_name,$rol_maxi));
			// usuarios
		if (isset($data['mod_user'])) {
			$users = $this->master->buscarPermiso(array($_SESSION['update_rol'],1));
			if ($users!=array()) {
					//modificar
					$result = $this->master->modificarPermiso(array($data['mod_user']['crear'],$data['mod_user']['modificar'],$data['mod_user']['eliminar'],$data['mod_user']['ver'],$_SESSION['update_rol'],1));
			}else{
				//insertar
				 	$result = $this->master->insert("permiso",array(1,$_SESSION['update_rol'],$data['mod_user']['crear'],$data['mod_user']['modificar'],$data['mod_user']['eliminar'],$data['mod_user']['ver']),array('id_permiso'));
			}
		}else{
			$result = $this->master->eliminarPermiso(array($_SESSION['update_rol'],1));
		}
		//productos
		if (isset($data['mod_products'])) {
			$users = $this->master->buscarPermiso(array($_SESSION['update_rol'],2));
			if ($users!=array()) {
					//modificar
					$result = $this->master->modificarPermiso(array($data['mod_products']['crear'],$data['mod_products']['modificar'],$data['mod_products']['eliminar'],$data['mod_products']['ver'],$_SESSION['update_rol'],2));
			}else{
				//insertar
				 	$result = $this->master->insert("permiso",array(2,$_SESSION['update_rol'],$data['mod_products']['crear'],$data['mod_products']['modificar'],$data['mod_products']['eliminar'],$data['mod_products']['ver']),array('id_permiso'));
			}
		}else{
			$result = $this->master->eliminarPermiso(array($_SESSION['update_rol'],2));
		}
		//pedidos
		if (isset($data['mod_orders'])) {
			$users = $this->master->buscarPermiso(array($_SESSION['update_rol'],3));
			if ($users!=array()) {
					//modificar
					$result = $this->master->modificarPermiso(array($data['mod_orders']['crear'],$data['mod_orders']['modificar'],$data['mod_orders']['eliminar'],$data['mod_orders']['ver'],$_SESSION['update_rol'],3));
			}else{
				//insertar
				 	$result = $this->master->insert("permiso",array(3,$_SESSION['update_rol'],$data['mod_orders']['crear'],$data['mod_orders']['modificar'],$data['mod_orders']['eliminar'],$data['mod_orders']['ver']),array('id_permiso'));
			}
		}else{
			$result = $this->master->eliminarPermiso(array($_SESSION['update_rol'],3));
		}
		//Cotizaciones
		if (isset($data['mod_quoation'])) {
			$users = $this->master->buscarPermiso(array($_SESSION['update_rol'],4));
			if ($users!=array()) {
					//modificar
					$result = $this->master->modificarPermiso(array($data['mod_quoation']['crear'],$data['mod_quoation']['modificar'],$data['mod_quoation']['eliminar'],$data['mod_quoation']['ver'],$_SESSION['update_rol'],4));
			}else{
				//insertar
				 	$result = $this->master->insert("permiso",array(4,$_SESSION['update_rol'],$data['mod_quoation']['crear'],$data['mod_quoation']['modificar'],$data['mod_quoation']['eliminar'],$data['mod_quoation']['ver']),array('id_permiso'));
			}
		}else{
			$result = $this->master->eliminarPermiso(array($_SESSION['update_rol'],4));
		}
		//Rutas
		if (isset($data['mod_routes'])) {
			$users = $this->master->buscarPermiso(array($_SESSION['update_rol'],5));
			if ($users!=array()) {
					//modificar
					$result = $this->master->modificarPermiso(array($data['mod_routes']['crear'],$data['mod_routes']['modificar'],$data['mod_routes']['eliminar'],$data['mod_routes']['ver'],$_SESSION['update_rol'],5));
			}else{
				//insertar
				 	$result = $this->master->insert("permiso",array(5,$_SESSION['update_rol'],$data['mod_routes']['crear'],$data['mod_routes']['modificar'],$data['mod_routes']['eliminar'],$data['mod_routes']['ver']),array('id_permiso'));
			}
		}else{
			$result = $this->master->eliminarPermiso(array($_SESSION['update_rol'],5));
		}
		//Asistencia virtual
		if (isset($data['mod_assis'])) {
			$users = $this->master->buscarPermiso(array($_SESSION['update_rol'],6));
			if ($users!=array()) {
					//modificar
					$result = $this->master->modificarPermiso(array($data['mod_assis']['crear'],$data['mod_assis']['modificar'],$data['mod_assis']['eliminar'],$data['mod_assis']['ver'],$_SESSION['update_rol'],6));
			}else{
				//insertar
				 	$result = $this->master->insert("permiso",array(6,$_SESSION['update_rol'],$data['mod_assis']['crear'],$data['mod_assis']['modificar'],$data['mod_assis']['eliminar'],$data['mod_assis']['ver']),array('id_permiso'));
			}
		}else{
			$result = $this->master->eliminarPermiso(array($_SESSION['update_rol'],6));
		}
		 if ($result==1) {
		 			echo json_encode(true);
			}else{
		 			echo json_encode($this->doizer->knowError($result));
		 	}

		}

		function delete(){
			$cantidad = $this->master->selectCount("usuario","tip_usu_codigo",$_POST['rol'])[0];
			if ($cantidad==0) {
				$result = $this->master->delete("permiso",array("tip_usu_codigo",$_POST['rol']));
				$result = $this->master->delete("tipo_usuario",array("tip_usu_codigo",$_POST['rol']));
				if ($result==1) {
					echo json_encode(true);
				}else{
					echo json_encode($this->doizer->knowError($result));
				}
			}else{
				echo json_encode("No es posible eliminar debido a que existen usuarios relacionados con este rol");
			}
		}
	}
?>

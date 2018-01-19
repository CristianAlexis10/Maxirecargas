<?php
	class RoutesController{
		private $master;
		private $tableName;
		private $insertException;
		private $updateException;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->tableName="rutas";
	 		$this->insertException=array('');
	 		$this->updateException = array('');
	 	}
		function main(){
				if (isset($_SESSION['CUSTOMER']['ROL'])) {
				//saber si puede acceder a este modulo
				foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
					if ($row['enlace']=='rutas') {
						$access = true;
					}
				}
				if (isset($access)) {
					//saber persimos crud de este modulo
					$modulo = 'Rutas';
					$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
					$crud = permisos($modulo,$permit);
					require_once "views/include/scope.header.php";
					require_once "views/modules/admin/route/index.php";
					require_once "views/include/scope.footer.php";
				}else{
					session_destroy();
					require_once "views/modules/landing.html";
				}
			}else{
				require_once "views/modules/landing.html";
			}
		}
		function routeToday(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
			//saber si puede acceder a este modulo
			foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
				if ($row['enlace']=='rutas') {
					$access = true;
				}
			}
			if (isset($access)) {
				//saber persimos crud de este modulo
				$modulo = 'Rutas';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/route/today.php";
				require_once "views/include/scope.footer.php";
			}else{
				session_destroy();
				require_once "views/modules/landing.html";
			}
		}else{
			require_once "views/modules/landing.html";
		}
		}
		function routeAll(){
			if (isset($_SESSION['CUSTOMER']['ROL'])) {
			//saber si puede acceder a este modulo
			foreach ($_SESSION['CUSTOMER']['PERMITS'] as $row) {
				if ($row['enlace']=='rutas') {
					$access = true;
				}
			}
			if (isset($access)) {
				//saber persimos crud de este modulo
				$modulo = 'Rutas';
				$permit = $this->master->moduleSecurity($_SESSION['CUSTOMER']['ROL']);
				$crud = permisos($modulo,$permit);
				require_once "views/include/scope.header.php";
				require_once "views/modules/admin/route/all.php";
				require_once "views/include/scope.footer.php";
			}else{
				session_destroy();
				require_once "views/modules/landing.html";
			}
		}else{
			require_once "views/modules/landing.html";
		}
		}

	}
?>

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
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/route/index.php";
			require_once "views/include/scope.footer.php";
		}
		function routeToday(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/route/today.php";
			require_once "views/include/scope.footer.php";
		}
		function routeAll(){
			require_once "views/include/scope.header.php";
			require_once "views/modules/admin/route/all.php";
			require_once "views/include/scope.footer.php";
		}

	}
?>
